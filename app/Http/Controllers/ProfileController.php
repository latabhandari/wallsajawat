<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class ProfileController extends Controller
{
    //
    private $_userid;

     public function __construct()
	    {
	        $this->middleware('auth');
	    }

     public function mywishlist()
       {
        	$wishlists = DB::table('wishlists')
		            			->join('products', 'wishlists.pid', '=', 'products.id')
		            			->select('products.name', 'products.sku', 'products.id', 'products.price', 'products.slug', 'wishlists.random_string')
		           		 		->where('wishlists.user_id', Auth::user()->id)
		           				->get();
           return view('pages.wishlist.wishlist', compact('wishlists'));
       }
}
