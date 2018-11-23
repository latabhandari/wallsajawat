<?php

namespace App\Http\Middleware;

use Closure;

use App\Product as Product;

class CheckProductInStock
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
          $params           =  $request->all();
          $id               =  $params['id'];
          $product          =  Product::select('stock_item')->where('id', $id)->firstOrFail();
          $stock_item       =  (int) $product->stock_item;
          if (empty($stock_item))
          return redirect()->back()->with('out_of_stock', 'Sorry. Out of stock');
           else
          return $next($request);
    }
}