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

	 public function ads($userid = null)
	    {
	    	$ads = Ads::with(['city:id,name', 'user:id,name'])->where('user_id', $userid)->get(); 
	        return view('admin.pages.users.ads', compact('ads'))->with('i', (request()->input('page', 1) - 1) * 10);
	    }

	public function adsdestroy($id = null)
		 {
		 		$rec = Ads::find($id);
        		$rec->delete();
		 		return redirect()->back()->with('delete', 'Deleted successfully!');
		 }      

	public function favoriteads($userid = null)
	  {
			$ads = FavoriteAds::with(['user:id,name', 'ads:id,title,description,unix_timestamp'])->where('user_id', $userid)->get(); 
	        return view('admin.pages.users.favads', compact('ads'))->with('i', (request()->input('page', 1) - 1) * 10);
	  }

	public function info($userid = null)
	  {
	  	    $request     =  User::findOrFail($userid);
	  	    $profile     =  Profile::with(['city:id,name', 'state:id,name'])->where('user_id', $userid)->first();
	  	    $total_ads   =  Ads::where('user_id', $userid)->count();
            $fav_ads     =  FavoriteAds::where('user_id', $userid)->count();

			return view('admin.pages.users.info', compact('request', 'profile', 'total_ads', 'fav_ads'))->with('i', (request()->input('page', 1) - 1) * 10);
	  }
}
