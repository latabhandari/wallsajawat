<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories as Categories;

class CategoryController extends Controller
{
    //
    public function product($slug)
      {
      	echo $slug;
      	  $category_info  = Categories::where('slug', $slug)->firstOrFail();
dd($category_info); die;


      	  $products = DB::table('products')
						->join('product_catetgories', 'products.id', '=', 'product_catetgories.product_id')
			            ->where('category_id', $category_info->id)
			            ->get();

		  dd($products);
          
      }
}
