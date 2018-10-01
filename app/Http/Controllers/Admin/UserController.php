<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Ads as Ads;
use App\FavoriteAds as FavoriteAds;
use App\Profile as Profile;


class UserController extends Controller
{
    //
     public function index()
	    {
	        $users = User::where('is_admin', 0)->get();
	        return view('admin.pages.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
	    }
   
     public function create($userid = null)
	   {
			return view('admin.pages.users.create');
	   }

	  public function store($userid = null)
	   {
	  	    $request     =  User::findOrFail($userid);
	  	    $profile     =  Profile::where('user_id', $userid)->firstOrFail();
			return view('admin.pages.users.info', compact('request', 'profile', 'total_ads', 'fav_ads'))->with('i', (request()->input('page', 1) - 1) * 10);
	   }

	 public function info($userid = null)
	   {
	  	    $request     =  User::findOrFail($userid);
	  	    $profile     =  Profile::where('user_id', $userid)->firstOrFail();
			return view('admin.pages.users.info', compact('request', 'profile', 'total_ads', 'fav_ads'))->with('i', (request()->input('page', 1) - 1) * 10);
	   }
}
