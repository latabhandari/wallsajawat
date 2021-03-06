<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Validator;
use App\User as User;
use Mail;

class AccountController extends Controller
{
    //
         public function index()
	     {
	     	 return view('admin.pages.authentication.index');
	     }

     public function login(Request $request)
     {
     	request()->validate(['email' => 'required|email', 'password' => 'required']);

     	$userdata  = array('email' => $request->input('email'), 'password'  => $request->input('password'));

     	if (Auth::attempt($userdata)) 
     	   {
     		   $role_id = Auth::user()->role_id;
               if (! empty($role_id) && $role_id !== 2) //$role_id = 2 for retailer user //
               	 {
               	 	return redirect()->route('admin.dashboard');
               	 }
                else
                	{
                	   Auth::logout();
                	   return redirect()->route('admin.get.login')->with('failure','You don\'t have permission to access the administrator.');
                	}
	       } 
	    else 
	        {
	           return redirect()->route('admin.get.login')->with('failure','The email or password you entered is incorrect.');
	        }
     }

	 public function forgot()
	     {
	     	 return view('admin.pages.authentication.forgot');
	     }

	 public function forgotpassword(Request $request)
	     {
	     	//request()->validate(['email' => 'required|email']);

	     	$params    = $request->all();
	        $rules     = array('email' => 'required|email');
	        $validator = Validator::make($params, $rules);
	        $email     = $params['email'];

	        if (filter_var($email, FILTER_VALIDATE_EMAIL)):
		         $validator->after(function($validator) use($email) {
		           $query = User::where('email', $email);
		           if ($query->count() == 0)
		           $validator->errors()->add('email', 'The email you entered does not belong to admin account.');
		         });
	        endif;

	        if ($validator->fails()) {
	            return redirect()->back()->withErrors($validator)->withInput();
	        }

	    	$new_password = mt_rand();
	    	User::where('email', $email)->update(['password' => bcrypt($new_password)]);
	        Mail::send('emails.admin_password', ['email' => $email, 'password' => $new_password], function ($message) use ($email)
	          {
	              $message->to($email);
	              $message->subject("Admin Forgot Password");
	          });
		      return redirect()->route('admin.get.forgot')->with('success','Success');
	     }
}
