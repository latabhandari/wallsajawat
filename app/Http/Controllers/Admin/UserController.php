<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as User;
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

	  public function store()
	   {
	   	     die('sfasfd');
	  	     request()->validate(['name' => 'required', 'email' => 'required', 'password', 'role_id']);

	         $params            				=    $request->all();

	         $fields['name']                    =    $params['name'];
	         $fields['slug']                    =    $params['slug'];
	         $fields['parent_id']               =    $params['parent'];
	         $fields['status']                  =    $params['status'];
	         $fields['icon']                    =    $icon;

	         User::create($fields);

	         return redirect()->route('users.index')->with('success','User added successfully');
	   }


	 public function info($userid = null)
	   {
	  	    $request     =  User::findOrFail($userid);
	  	    $profile     =  Profile::where('user_id', $userid)->firstOrFail();
			return view('admin.pages.users.info', compact('request', 'profile', 'total_ads', 'fav_ads'))->with('i', (request()->input('page', 1) - 1) * 10);
	   }
}
