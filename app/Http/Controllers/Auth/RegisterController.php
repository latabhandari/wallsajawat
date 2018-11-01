<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Auth\Events\Registered;

use App\Profile as Profile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
                      'unique' => 'The :attribute you entered already belongs to an existing account',
                      'regex' => 'Password field contains 1 uppercase letter, 1 lowercase letter and 1 special character'
                    ];

        return Validator::make($data, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()+]+.*)[0-9a-zA-Z\w!@#$%^&*()+]{6,}$/|confirmed',
          'g-recaptcha-response' => 'required|captcha'
        ],  $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'email_token' => bin2hex(openssl_random_pseudo_bytes(30)),
            'unix_timestamp' => time(),
            'verified' => 1 //ucomment
        ]);

        Profile::create(['user_id' => $user->id]);
        return $user;

    }

    protected function redirectTo()
        {
            return route('home.index');
        }
	
	/*public function register(Request $request)
        {
            $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($request->all())));
            $email = new EmailVerification($user);
            Mail::to($user->email)->send($email);
            return view('auth.emails.verification');
        }
    */
	
	public function verify($token)
        {
            if (empty($token))
            return  redirect('login')->with('flash-error','Email Verification Token not provided!');

            $user = User::where('email_token',$token)->first();
            if (empty($user))
            return  redirect('login')->with('flash-error','Invalid Email Verification Token!');


            $user->verified   = 1;
            $user->email_token = '';

            if ($user->save()) 
             {

                $profile = Profile::create(['user_id' => $user->id]);
                            //return view('auth.emails.emailconfirm',['user'=>$user]);
                return redirect('/beta');
             }

        /*

<<<<<<< HEAD
            $user->verified    = 1;
    		$user->email_token = '';
=======
        $user->verified = 1;
		$user->email_token = '';

        if ($user->save()) {

            $profile = Profile::create([
            'user_id' => $user->id,
        	]);		
			//return view('auth.emails.emailconfirm',['user'=>$user]);
			return redirect('/beta');
>>>>>>> 210e4750a968e235fdc5c4ee8e9e9ad4c57fca6e

            if ($user->save()) 
                {
                    $profile = Profile::create(['user_id' => $user->id]);		
        			//return view('auth.emails.emailconfirm',['user'=>$user]);
        			return redirect('/');
                }

                */
                
        }

}
