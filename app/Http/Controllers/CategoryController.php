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
          $category_info  =  Categories::where('slug', $slug)->firstOrFail();
          $products = DB::table('products')
            ->select('products.id', 'products.name', 'products.slug')
						->join('product_categories', 'products.id', '=', 'product_categories.product_id')
			            ->where('category_id', $category_info['id'])
			            ->get();
          return view('pages.category.product', compact('products', 'category_info'));
      }
}
