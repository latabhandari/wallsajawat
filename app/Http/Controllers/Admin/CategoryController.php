<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories as Categories;
use App\Helpers\MyHelper as MyHelper;
use Auth;
use Route;
use App\Helpers\Slim as Slim;


class CategoryController extends Controller
{
    protected  $user;

    protected function checkPermissions($method)
        {
            $getAction                 = Route::getCurrentRoute()->getActionName();
            list($controller, $method) = explode('@', $getAction);
            switch ($method)
            {
                case 'index':
                               $permission = MyHelper::getPermission('index_categories');
                               break;
                default:
                               $permission = MyHelper::getPermission($method.'_category');
                               break;
            }
        }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->checkPermissions(__METHOD__);

        $categories = Categories::get();
        return view('admin.pages.category.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->checkPermissions(__METHOD__);
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         request()->validate(['name' => 'required|string|regex:/(^[A-Za-z ]+$)+/', 'slug' => 'required', 'status' => 'required']);

         $params                            =    $request->all();

         $fields['name']                    =    $params['name'];
         $fields['slug']                    =    strtolower($params['slug']) . '-' . mt_rand();
         //$fields['parent_id']               =    $params['parent'];
         $fields['status']                  =    $params['status'];

         //$fields['wallpaper_pos']           =    $params['wallpaper_pos'];

         /*if ($request->hasFile('wallpaper_image')) 
          {
             $file                          =    $request->file('wallpaper_image');
             $destinationPath               =    public_path('catalog/category');
             $filename                      =    $file->getClientOriginalName();
             $wimage                        =    uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', $filename);
             $file->move($destinationPath, $wimage);
             $fields['wallpaper_image']     =    $wimage;
          }
          */

         /* file upload here using slim */

         $images                            =    Slim::getImages("wallpaper_image");
         $image                             =    $images[0];

         // let's create some shortcuts
         $name                              =    uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', strtolower($image['output']['name']));
         $data                              =    $image['output']['data'];

         $destinationPath                   =    public_path('catalog/category');

         $file                              =    Slim::saveFile($data, $name, $destinationPath);

         $fields['wallpaper_image']         =    $file['name'];

         /* close */

                 
         $fields['created_at_timestamp']    =    time();

         $fields['page_title']              =    $params['page_title'];
         $fields['meta_description']        =    $params['meta_description'];
         $fields['meta_keywords']           =    $params['meta_keywords'];

         //Categoryies::where('wallpaper_pos', $params['wallpaper_pos'])->update(['wallpaper_pos' => 0]);

         Categories::create($fields);

         return redirect()->route('categories.index')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->checkPermissions(__METHOD__);
        $category  = Categories::findOrFail($id);
        return view('admin.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        request()->validate(['name' => 'required|string|regex:/(^[A-Za-z ]+$)+/', 'slug' => 'required']);

        $params                             =    $request->all();
        //$fields['parent_id']                =    $params['parent'];
        $fields['name']                     =    $params['name'];
        $fields['slug']                     =    strtolower($params['slug']);

        if ($id > 5)
        $fields['status']                   =    $params['status'];

        //$fields['wallpaper_pos']            =    $params['wallpaper_pos'];

        /*
        if ($request->hasFile('wallpaper_image')) 
          {
             $file                       =    $request->file('wallpaper_image');
             $destinationPath            =    public_path('catalog/category');

             $filename                   =    $file->getClientOriginalName();
             $wimage                     =    uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', $filename);

             $file->move($destinationPath, $wimage);
             $fields['wallpaper_image']  =    $wimage;

          }
        */


        /* file upload here using slim */

         $images                                =    Slim::getImages("wallpaper_image");
         if ( ! empty($images))
             $image                             =    $images[0];

             // let's create some shortcuts
             $name                              =    uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', strtolower($image['output']['name']));
             $data                              =    $image['output']['data'];

             $destinationPath                   =    public_path('catalog/category');

             $file                              =    Slim::saveFile($data, $name, $destinationPath);

             $fields['wallpaper_image']         =    $file['name'];
        endif

         /* close */



        $fields['updated_at_timestamp']     =    time();

        $fields['page_title']               =    $params['page_title'];
        $fields['meta_description']         =    $params['meta_description'];
        $fields['meta_keywords']            =    $params['meta_keywords'];


        //Categories::where('wallpaper_pos', $params['wallpaper_pos'])->update(['wallpaper_pos' => 0]);

        Categories::find($id)->update($fields);

        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
         $this->checkPermissions(__METHOD__);
         $id = Categories::find( $id );
         $id->delete();
         return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }

    /**
     * Change the status.
     *
     */

     public function status($id, $status)
        {
             //
             $status = ! $status;
             Categories::where('id', $id)->update(['status' => $status]);
             return redirect()->route('categories.index')->with('success','Category status changed successfully!');
        }

}
