<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories as Categories;
use App\Helpers\MyHelper as MyHelper;
use Auth;
use Route;

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

         request()->validate(['name' => 'required', 'slug' => 'required']);

         $params                            =    $request->all();

         $fields['name']                    =    $params['name'];
         $fields['slug']                    =    $params['slug'];
         $fields['parent_id']               =    $params['parent'];
         $fields['status']                  =    $params['status'];

         $fields['wallpaper_pos']           =    $params['wallpaper_pos'];

         if ($request->hasFile('wallpaper_image')) 
          {
             $file                          =    $request->file('wallpaper_image');
             $destinationPath               =    public_path('catalog/category');
             $filename                      =    $file->getClientOriginalName();
             $wimage                        =    uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', $filename);
             $file->move($destinationPath, $wimage);
             $fields['wallpaper_image']     =    $wimage;
          }
                 
         $fields['created_at_timestamp']    =    time();

         $fields['page_title']              =    $params['page_title'];
         $fields['meta_description']        =    $params['meta_description'];
         $fields['meta_keywords']           =    $params['meta_keywords'];


         Categoryies::where('wallpaper_pos', $params['wallpaper_pos'])->update(['wallpaper_pos' => 0]);

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
        request()->validate(['name' => 'required', 'slug' => 'required', 'status' => 'required']);

        $params                             =    $request->all();
        $fields['parent_id']                =    $params['parent'];
        $fields['name']                     =    $params['name'];
        $fields['slug']                     =    $params['slug'];
        $fields['status']                   =    $params['status'];

        $fields['wallpaper_pos']            =    $params['wallpaper_pos'];

        if ($request->hasFile('wallpaper_image')) 
          {
             $file                       =    $request->file('wallpaper_image');
             $destinationPath            =    public_path('catalog/category');

             $filename                   =    $file->getClientOriginalName();
             $wimage                     =    uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', $filename);

             $file->move($destinationPath, $wimage);
             $fields['wallpaper_image']  =    $wimage;

          }

        $fields['updated_at_timestamp']     =    time();

        $fields['page_title']               =    $params['page_title'];
        $fields['meta_description']         =    $params['meta_description'];
        $fields['meta_keywords']            =    $params['meta_keywords'];


        Categoryies::where('wallpaper_pos', $params['wallpaper_pos'])->update(['wallpaper_pos' => 0]);

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
}
