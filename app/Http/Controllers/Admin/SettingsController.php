<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User as User;
use Validator;
class SettingsController extends Controller
{
    //
    public function index()
     {
     	 $result = Auth::user();
     	 return view('admin.pages.settings.index', compact('result'));
     }

    public function store(Request $request)
       {
        	$params    = $request->all();

        	if (empty($params['password']) && empty($params['password_confirmation']))
	           $rules  = array('name' => 'required', 'email' => 'required|email');
	        else
			   $rules  = array('name' => 'required', 'email' => 'required|email', 'password' => 'confirmed|min:6');

	        $validator = Validator::make($params, $rules);
	        $email     = $params['email'];

	        $id        = Auth::user()->id;
	        if (filter_var($email, FILTER_VALIDATE_EMAIL)):
		         $validator->after(function($validator) use($email, $id) {
		           $query = User::where([['email', '=', $email], ['id', '!=', $id]]);
		           if ($query->count() > 0)
		           $validator->errors()->add('email', 'The Email belongs to an existing account.');

		         });
	        endif;

	        if ($validator->fails()) {
	            return redirect()->back()->withErrors($validator)->withInput();
	        }

            $fields           =  $request->all();
            $arr['name']      =  $params['name'];
            $arr['email']     =  $params['email'];

            if ( ! empty($params['password']))
            $arr['password']  =  bcrypt($params['password']);

            User::where('id', Auth::user()->id)->update($arr);
            return redirect()->route('admin.settings')->with('success', 'success');
    }
}
