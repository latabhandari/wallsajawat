<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $userinfo  =  Auth::user();
        switch ($guard):
                case 'admin':
                                    if (! empty($userinfo)):
                                        $admin_id  =  $userinfo->id;
                                        $role_id  =  $userinfo->role_id;

                                        if (! empty($admin_id) && ! empty($role_id))
                                        return $next($request);
                                    endif;
                                        return redirect()->route('admin.get.login');
                                    break;

                case 'login':
                                    if ( ! empty($userinfo)):
                                        $role_id = $userinfo->role_id;
                                        if (! empty($role_id))
                                        return redirect()->route('admin.dashboard');
                                    endif;
                                         return $next($request);
                                    break;
        endswitch;
    }
}
