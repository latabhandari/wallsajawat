<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories as Categories;
use DB;

class CategoryController extends Controller
{
    //
    public function product($slug)
      {          
      	echo $slug;
          $category_info  =  Categories::where('slug', $slug)->firstOrFail();

DB::enableQueryLog();
          dd(DB::getQueryLog());


	     // print_r($category_info); die;
          $products = DB::table('products')
						->join('product_categories', 'products.id', '=', 'product_categories.product_id')
			            ->where('category_id', 1)
			            ->get();

          return view('pages.category.product', compact('products'));
      }
}
