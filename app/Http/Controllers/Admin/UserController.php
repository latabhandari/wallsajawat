<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Profile as Profile;
use App\Roles as Roles;


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
	   	    $roles = Roles::get();
			return view('admin.pages.users.create', compact('roles'));
	   }

	  public function store()
	   {
	  	     request()->validate(['name' => 'required', 'email' => ['required', User::exists('email')->where(function ($query) {
            		$query->where('status', 1); }),], 'password' => 'required', 'role' => 'required', 'status' => 'required']);

	         $params            				=    $request->all();

	         $fields['name']                    =    $params['name'];
	         $fields['email']                   =    $params['email'];
	         $fields['password']                =    Hash::make($params['password']);
	         $fields['status']                  =    $params['status'];
	         $fields['role_id']                 =    $params['role'];
	         $fields['unix_timestamp']          =    time();
	
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
