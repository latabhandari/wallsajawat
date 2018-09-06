<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

use Mail;
use App\Mail\EmailVerification;
use Illuminate\Auth\Events\Registered;
use App\Profile as Profile;
use App\Countries as Countries;
use App\States as States;
use App\Cities as Cities;



class UserController extends Controller 
{

public $successStatus = 200;

/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password'), 'verified' => 1])){ 
			
            $user = Auth::user(); 
			$user_id = $user->id;
			Profile::where('user_id', $user_id)->update(['device_token' => request('device_token')]);
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|max:255|unique:users', 
            'password' => 'required|min:6', 
            'c_password' => 'required|same:password|min:6', 
			'mobile' => 'required'
			
			
        ]);
		if ($validator->fails()) 
		{ 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
		$input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
		$input['email_token'] = bin2hex(openssl_random_pseudo_bytes(30));
		$input['unix_timestamp'] = time();
        $user = User::create($input); 
		
		//$user->profile()->save(new Profile);
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
		$email = new EmailVerification($user);
        Mail::to($user->email)->send($email);
		return response()->json(['success'=>$success], $this-> successStatus); 
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
	
	public function countries() 
    {
        $country = Countries::select('name', 'id')->get();
        return response()->json(['success' => $country], $this-> successStatus); 
    }
	public function states() 
    {	
		if(request('country_id'))
		{ 

		$state = States::where('country_id', request('country_id'))->select('id', 'name')->get();
        return response()->json(['success' => $state], $this-> successStatus); 
		} 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
	public function cities() 
    {	
		if(request('state_id'))
		{ 
			$city = Cities::where('state_id', request('state_id'))->select('id', 'name')->get();
			return response()->json(['success' => $city], $this-> successStatus); 
		} 
        else
		{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        }	 
    } 
	public function categories() 
    {
		$categories = Categories::where('status', 1)->select('name', 'id', 'slug', 'icon', 'parent_id')->get();
		return response()->json(['success' => $categories], $this-> successStatus);        
	}
}