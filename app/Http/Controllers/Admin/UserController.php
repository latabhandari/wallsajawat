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
	        $users = User::where('role_id', 0)->get();
	        return view('admin.pages.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
	    }
   
     public function create($userid = null)
	   {
	   	    $roles = Roles::get();
			return view('admin.pages.users.create', compact('roles'));
	   }


     public function edit($id)
	    {
	        //
	        $user  = User::findOrFail($id);
	        $roles = Roles::get();
	        return view('admin.pages.users.edit',compact('user', 'roles'));
	    }


	  public function store(Request $request)
	   {
	  	     request()->validate(['name' => 'required', 'email' => 'required', 'password' => 'required', 'role' => 'required', 'status' => 'required', 'mobile' => 'required']);

	         $params            				=    $request->all();

	         $fields['name']                    =    $params['name'];
	         $fields['email']                   =    $params['email'];
	         $fields['password']                =    bcrypt($params['password']);
	         $fields['mobile']                  =    $params['mobile'];
	         $fields['role_id']                 =    $params['role'];
	         $fields['unix_timestamp']          =    time();
	
	         User::create($fields);

	         return redirect()->route('user.index')->with('success','User added successfully');
	   }


    public function update(Request $request, $id)
     {
        //
         request()->validate(['name' => 'required', 'email' => 'required', 'role' => 'required', 'mobile' => 'required']);

         $params            				=    $request->all();

         $fields['name']                    =    $params['name'];
         $fields['email']                   =    $params['email'];
         if ($params['password'])
         $fields['password']                =    bcrypt($params['password']);
         $fields['mobile']                  =    $params['mobile'];
         $fields['role_id']                 =    $params['role'];

         User::find($id)->update($fields);

         return redirect()->route('user.index')->with('success','User updated successfully');
     }

     public function destroy($id)
	    {
	        //
	         $id = User::find($id);
	         $id->delete();
	         return redirect()->route('user.index')->with('success','User deleted successfully');
	    }


	 public function info($userid = null)
	   {
	  	    $request     =  User::findOrFail($userid);
	  	    $profile     =  Profile::where('user_id', $userid)->firstOrFail();
			return view('admin.pages.users.info', compact('request', 'profile', 'total_ads', 'fav_ads'))->with('i', (request()->input('page', 1) - 1) * 10);
	   }
}
