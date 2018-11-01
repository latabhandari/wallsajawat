<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product as Product;

use App\ProductCategory as ProductCategory;
use App\ProductImages as ProductImages;
use App\Dimension as Dimension;
use App\Categories as Categories;
use DB;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $category_id = $request->input('id');
        if ( ! empty($category_id))
             {
                $products   = DB::table('products')
                                      ->select('products.id', 'products.name', 'products.slug', 'products.price', 'product_categories.category_id', 'products.page_title', 'products.status','products.sku', 'products.stock_item')
                                      ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
                                      ->where('product_categories.category_id', $category_id)
                                      ->get();
             }
        else
             {
                $products = Product::get();
             }
        
        $categories = Categories::get();
        return view('admin.pages.product.index', compact('products', 'categories', 'category_id'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rolls    = Dimension::get();
        return view('admin.pages.product.create', compact('rolls'));
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

        request()->validate(['categories'  => 'required|array|min:1', 'name' => 'required', 'sku' => 'required', 'stock_item' => 'required', 'price' => 'required', 'roll_id' => 'required', 'images' => 'required', 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg']);

        $params                            =    $request->all();

        $fields['name']                    =    $params['name'];
        $fields['slug']                    =    str_slug($params['name']). '-'.mt_rand(1111,9999);
        $fields['sku']                     =    $params['sku'];
        $fields['stock_item']              =    $params['stock_item'];
        $fields['short_desc']              =    $params['short_desc'];
        $fields['description']             =    $params['description'];
        $fields['price']                   =    $params['price'];
        $fields['status']                  =    $params['status'];
        $fields['roll_id']                 =    $params['roll_id'];
        $fields['created_timestamp']       =    time();

        $fields['page_title']              =    $params['page_title'];
        $fields['meta_description']        =    $params['meta_description'];
        $fields['meta_keywords']           =    $params['meta_keywords'];

        $categories                        =    $params['categories'];

        $product = Product::create($fields);

        foreach ($categories as $category_id)
        ProductCategory::create(['category_id' => $category_id, 'product_id' => $product->id]);

        if ($files = $request->file('images'))
            {
                $path = public_path('catalog/product');
                foreach ($files as $file)
                 {
                     $name      = $file->getClientOriginalName();
                     $imagename = uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', $name);
                     $file->move($path, $imagename);
                     ProductImages::create(['product_id' => $product->id, 'image' => $imagename]);
                 }
            }

        return redirect()->route('product.index')->with('success','Product created successfully');
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
        $product = Product::findOrFail($id);
        return view('admin.pages.product.show',compact('product'));
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
        $product  = Product::findOrFail($id);
        $images   = ProductImages::select('id', 'image')->where('product_id', $id)->get();
        $rolls    = Dimension::get();
        return view('admin.pages.product.edit',compact('product', 'images', 'rolls'));
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
        request()->validate(['categories'  => 'required|array|min:1', 'name' => 'required', 'sku' => 'required', 'stock_item' => 'required', 'price' => 'required', 'roll_id' => 'required', 'images' => 'required', 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg']);

        $params                             =    $request->all();
        $fields['name']                     =    $params['name'];
        $fields['sku']                      =    $params['sku'];
        $fields['stock_item']               =    $params['stock_item'];
        $fields['short_desc']               =    $params['short_desc'];
        $fields['description']              =    $params['description'];
        $fields['price']                    =    $params['price'];
        $fields['status']                   =    $params['status'];
        $fields['roll_id']                 =    $params['roll_id'];

        $fields['updated_timestamp']        =    time();

        $fields['page_title']               =    $params['page_title'];
        $fields['meta_description']         =    $params['meta_description'];
        $fields['meta_keywords']            =    $params['meta_keywords'];

        Product::find($id)->update($fields);

        $categories                         =    $params['categories'];

        ProductCategory::where('product_id', $id)->delete();

        foreach ($categories as $category_id)
        ProductCategory::create(['category_id' => $category_id, 'product_id' => $id]);

        if ($files = $request->file('images'))
            {
                $path = public_path('catalog/product');
                foreach ($files as $file)
                 {
                     $name      = $file->getClientOriginalName();
                     $imagename = uniqid( ) . preg_replace("/[^a-z0-9\_\-\.]/i", '', $name);
                     $file->move($path, $imagename);
                     ProductImages::create(['product_id' => $id, 'image' => $imagename]);
                 }
            }

        return redirect()->route('product.index')->with('success','Product updated successfully');
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
         $id = Product::find($id);
         $id->delete();

         return redirect()->route('product.index')->with('success','Product deleted successfully');
    }


    /**
     * Remove the image.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroyimg($id)
        {
             //
             ProductImages::find($id)->delete();
             return redirect()->back()->with('suc','Image deleted successfully');
        }

    /**
     * Change the status.
     *
     */

     public function status($id, $status)
        {
             //
             $status = ! $status;
             Product::where('id', $id)->update(['status' => $status]);
             return redirect()->route('product.index')->with('success','Product status changed successfully!');
        }


}
