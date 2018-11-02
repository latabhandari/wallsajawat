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
	        $users = User::all();
	        return view('admin.pages.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
	    }
   
     public function create($userid = null)
	   {
	   	    $roles = Roles::where('status', 1)->get();
			return view('admin.pages.users.create', compact('roles'));
	   }

     public function edit($id)
	    {
	        //
	        $user  = User::findOrFail($id);
	        $roles = where('status', 1)->get();
	        return view('admin.pages.users.edit',compact('user', 'roles'));
	    }


	  public function store(Request $request)
	   {
	  	     request()->validate(['name' => 'required|string|max:255|regex:/(^[A-Za-z ]+$)+/', 'email' => 'required|string|max:255', 'password' => 'required', 'role' => 'required', 'mobile' => 'required|numeric|digits:10']);

	         $params            				=    $request->all();
	         $query                             =    User::where(['email' => $params['email'], 'verified' => 1]);
		     if ($query->count() > 0)
			     {
			         return redirect()->route('user.create')->withInput($request->input())->with('error','Email belongs to an existing account!');
			     } 
		     else
		      {
		         $fields['name']                    =    $params['name'];
		         $fields['email']                   =    $params['email'];
		         $fields['password']                =    bcrypt($params['password']);
		         $fields['mobile']                  =    $params['mobile'];
		         $fields['role_id']                 =    $params['role'];
		         $fields['verified']                =    1;
		         $fields['added_by_admin']          =    1;
		         $fields['unix_timestamp']          =    time();

		         $user = User::create($fields);

		         Profile::create(['user_id' => $user->id]);

		         return redirect()->route('user.index')->with('success','User added successfully');
		      }
	   }


    public function update(Request $request, $id)
     {
        //
         request()->validate(['name' => 'required|string|max:255|regex:/(^[A-Za-z ]+$)+/', 'email' => 'required', 'role' => 'required', 'mobile' => 'required|numeric|digits:10']);

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
