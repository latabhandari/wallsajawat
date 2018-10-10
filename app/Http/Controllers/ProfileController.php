<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class ProfileController extends Controller
{
    //
    private $_userid;

     public function __construct()
	    {
	        $this->middleware('auth');
	        $this->_userid = Auth::user()->id;
	    }

     public function mywishlist()
       {
        	$users = DB::table('wishlists')
		            			->join('products', 'wishlists.pid', '=', 'products.id')
		            			->select('products.*')
		           		 		->where('wishlists.user_id', $this->_userid)
		           				->get();
		    print_r($users);

           return view('pages.wishlist.wishlist');
       }
}
