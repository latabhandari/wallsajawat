<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User as User;

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
    protected $redirectTo = '/home';

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
    public function handleProviderCallback($provider)
     {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
        // $user->token;
     }

    public function findOrCreateUser($user, $provider)
     {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser)
        return $authUser;

        return User::create(['name' => $user->name, 'email' => $user->email, 'provider' => $provider, 'provider_id' => $user->id, 'unix_timestamp' => time(), 'verified' => 1]);
     }

    protected function authenticated(Request $request, $user)
      {
            return redirect()->route('home.index');
      }

    public function logout(Request $request)
      {
            Auth::logout();
            return redirect()->route('home.index');
      }
}
