<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories as Categories;

class CategoryController extends Controller
{
    //
    public function product($slug)
      {
      	  $category_info  = Categories::where('slug', $slug)->firstOrFail();

      	  $users = DB::table('products')
						->join('product_catetgories', 'products.id', '=', 'product_catetgories.product_id')
			            ->where('category_id', $category_info->id)
			            ->get();

		  dd($products);


          
      }
}
