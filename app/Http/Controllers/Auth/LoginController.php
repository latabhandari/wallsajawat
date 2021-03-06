<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User as User;
use App\Profile as Profile;

use Redirect;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToProvider($provider)
     {
        return Socialite::driver($provider)->redirect();
     }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
     {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        if ($request->has('redirect_url'))
        return Redirect::to($request->input('redirect_url'));
           else
        return redirect()->route('home.index');
        //return redirect($this->redirectTo);
     }

    public function findOrCreateUser($user, $provider)
     {
        //$authUser  = User::where('provider_id', $user->id)->first();

        $authUser    = User::where([['email', '=', $user->email], ['verified', '=', 1]])->first();
        if ($authUser)
        return $authUser;

        $uprovider = (strtolower($provider) == 'google') ? "1" : "2";

        $user = User::create(['name' => $user->name, 'email' => $user->email, 'provider' => $uprovider, 'provider_id' => $user->id, 'unix_timestamp' => time(), 'verified' => 1]);

        Profile::create(['user_id' => $user->id]);
        return $user;

     }

    protected function authenticated(Request $request, $user)
      {
            if ($request->has('redirect_url'))
            return Redirect::to($request->input('redirect_url'));

            return redirect()->route('home.index');
      }

    public function logout(Request $request)
      {
            Auth::logout();
            return redirect()->route('home.index');
      }
}
