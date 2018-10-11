<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Cities as Cities;
use App\States as States;

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


      public function profile()
       {
           $user = DB::table('users')
                      ->join('profile', 'users.id', '=', 'profile.user_id')
                      ->select('users.name', 'users.email', 'users.mobile', 'profile.address', 'profile.city', 'profile.state', 'profile.pin', 'profile.country', 'profile.profile')
                      ->where('users.id', Auth::user()->id)
                      ->first();

            $states = States::where('country_id', 101)->get();
            $cities = Cities::where('state_id', 13)->get();

            return view('pages.profile.profile', compact('user', 'states', 'cities'));
       }

      public function updateProfile()
       {

       }


}
