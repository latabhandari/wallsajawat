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
                                        $is_admin  =  $userinfo->is_admin;

                                        if (! empty($admin_id) && ! empty($is_admin))
                                        return $next($request);
                                    endif;
                                        return redirect()->route('admin.get.login');
                                    break;

                case 'login':
                                    if ( ! empty($userinfo)):
                                        $is_admin = $userinfo->is_admin;
                                        if (! empty($is_admin))
                                        return redirect()->route('admin.dashboard');
                                    endif;
                                         return $next($request);
                                    break;
        endswitch;
    }
}
