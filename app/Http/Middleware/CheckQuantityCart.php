<?php

namespace App\Http\Middleware;

use Closure;

use App\Product as Product;

class CheckQuantityCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          return $next($request);
    }
}
