<?php

namespace App\Http\Controllers\API;

use DB;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User as User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Validator;

use Mail;
use App\Mail\EmailVerification;
use Illuminate\Auth\Events\Registered;
use App\Profile as Profile;
use App\Countries as Countries;
use App\States as States;
use App\Cities as Cities;
use App\Categories as Categories;
use App\Product as Products;
use App\ProductImages as ProductImages;

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
            //$success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => [['token' => $user->createToken('MyApp')-> accessToken, 'name'=>$user->name]], 'udata' => 1]); 
        } 
        else{ 
            //return response()->json(['error'=>'Unauthorised'], 401); 
			 return response()->json(['error' => [['token' => 'Unauthorised']], 'udata' => 0]); 
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
            'name' => 'required|max:255', 
            'email' => 'required|email|max:255|unique:users|email', 
            'password' => 'required|min:6|max:255', 
            'c_password' => 'required|same:password', 
			'mobile' => 'required|digits:10|numeric'			
        ]);
		
		if ($validator->fails()) 
		{ 
            //return response()->json(['error'=>$validator->errors()], 401); 
			return response()->json(['error'=>'validation error', 'udata' => 0]);            
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
		//return response()->json(['success'=>$success], $this-> successStatus); 
		return response()->json(['udata' => 1]);
    }
	
	
    public function social_register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|max:255', 
            'email' => 'required|email|max:255|email', 
			'provider' => 'required|max:255', 
			'provider_id' => 'required|max:255', 
        ]);
		function getToken($length){
			$token = "";
			$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
			$codeAlphabet.= "0123456789";
			$max = strlen($codeAlphabet); // edited
	   
		   for ($i=0; $i < $length; $i++) {
			   $token .= $codeAlphabet[random_int(0, $max-1)];
		   }
	   
		   return $token;
	   }
		if ($validator->fails()) 
		{ 
            //return response()->json(['error'=>$validator->errors()], 401); 
			return response()->json(['error'=>'validation error', 'udata' => 0]);            
        }
		$input = $request->all(); 
		$get = User::select('id' , 'email')->where([['email', '=' ,$input['email']]])->first();	
		if($get['id']){
			Auth::attempt(['email' => $get->email, 'password' => 'socialloginwastu', 'verified' => 1]) ;
			$user = Auth::user(); 
			$user_id = $user->id;
			Profile::where('user_id', $user_id)->update(['device_token' => $input['device_token']]);
			return response()->json(['success' => [['token' => $user->createToken('MyApp')->accessToken, 'name'=>$user->name]], 'udata' => 1]); 
			

		}	
		else{

			$input['password'] = bcrypt('socialloginwastu'); 
			$input['email_token'] = bin2hex(openssl_random_pseudo_bytes(30));
			$input['unix_timestamp'] = time();
			$input['verified']    = 1;
     		$user = User::create($input); 
			$profile = Profile::create(['user_id' => $user->id]);
			Auth::attempt(['email' => $user->email, 'password' => 'socialloginwastu', 'verified' => 1]) ;
			$user2 = Auth::user(); 
			$user_id = $user2->id;
			Profile::where('user_id', $user2->id)->update(['device_token' => $input['device_token']]);
			return response()->json(['success' => [['token' => $user2->createToken('MyApp')->accessToken, 'name'=>$user2->name]], 'udata' => 1]);
		}
		
    }
	

	public function change_password(Request $request) 
    { 
		$user = Auth::user();
		if($user->id != '')
		{
			$validator = Validator::make($request->all(), [ 
			'old_password' => 'required|min:6|max:255', 
            'password' => 'required|min:6|max:255', 
            'c_password' => 'required|same:password'		
        	]);
			if ($validator->fails()) 
			{ 
				return response()->json(['error'=>'validation error', 'udata' => 0]);           
			}
			else
			{
				$get = User::select('password')->where([['id',$user->id]])->first();				
				if(Hash::check(request('old_password'), $get->password))
				{
					User::where('id', $user->id)->update(['password' => bcrypt(request('password'))]);				
					return response()->json(['udata' => 1]);
				}
				else
				{
					return response()->json(['error'=>'old password doesn`t match', 'udata' => 0]);
				}
			}
		}
		else
		{
			return response()->json(['udata' => 0]); 
		}
    }
	
	public function edit_profile(Request $request) 
    { 
		$user = Auth::user();
		if($user->id != '')
		{
			$validator = Validator::make($request->all(), [ 
            'name' => 'required|max:255',
            'address' => '', 
            'country' => '', 
			'state' => '', 
			'city' => '', 
            'pin' => 'size:6', 
			'profile' => ''	,
			'mobile' => 'required|digits:10|numeric'		
        	]);
			if ($validator->fails()) 
			{ 
				return response()->json(['error'=>$validator->errors(), 'udata' => 0]);           
			}
			else
			{
				Profile::where('user_id', $user->id)->update(['address' => request('address'), 'country' => request('country'), 'state' => request('state'), 'city' => request('city'), 'pin' => request('pin'), 'profile' => request('profile')]);				
				User::where('id', $user->id)->update(['name' => request('name'), 'mobile' => request('mobile')]);
				return response()->json(['udata' => 1]);
			}
		}
		else
		{
			return response()->json(['udata' => 0]); 
		}
    }

    public function details() 
    { 
		$user = Auth::user();
		if($user->id != '')
		{	
			$d = $user->id;	
			$data = DB::table('users')->join('profile', 
			function($join) use($d){$join->on('users.id', '=', 'profile.user_id')
			->where('users.id', '=', $d);})
			->get();	
			return response()->json(['success' => $data, 'udata' => 1]);    
		}
		else
		{
			return response()->json(['udata' => 0]); 
		}	
    } 
	public function products() 
    { 
		$products = Products::where('status', 1)->select('*')->get();
		//$products2 = ProductImages::where('product_id', $products->id)->select('*')->get();
		return response()->json(['success' => $products, 'udata' => 1]);    
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
		$categories = Categories::where([['status','=',1],['parent_id','=', 0]])->select('name', 'id', 'icon')->get();
		return response()->json(['success' => $categories, 'udata' => 1]);     
	}	
	public function subcategories() 
    {
		$parent_id = request('parent_id');
		$categories = Categories::where([['status','=',1],['parent_id','=', $parent_id]])->select('name', 'id', 'icon')->get();
		return response()->json(['success' => $categories, 'udata' => 1]);       
	}

	public function search()
	  {
	  	   $search = request('search');
	  	   echo $search;
	  }
}