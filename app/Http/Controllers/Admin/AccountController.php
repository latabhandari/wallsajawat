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
 
	     	 # $userdata  = array('email' => $request->input('email'), 'password'  => $request->input('password'));
			  $user      = User::where([['email', '=', $request->input('email')], ['password', '=', $request->input('password')], ['role_id', '>', 0]])->first();

	     	  if ($user) {

	     	  	Auth::loginUsingId($user->id);

	     	    return redirect()->route('admin.dashboard');
	     	    
		      } else {
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
