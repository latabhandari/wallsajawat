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
          $params           =    $request->all();
          $id               =    $params['id'];
          $product          =    Product::select('stock_item')->where('id', $id)->firstOrFail();
          $stock_item       =    (int) $product->stock_item;
          if (empty($stock_item))
          return redirect()->back()->with('error_msg', 'Sorry. Out of stock');

          if ($params['qty'] > $stock_item)
          return redirect()->back()->with('error_msg', 'Sorry. Only '.$stock_item.' Quantity(s) are left');
      
          return $next($request);
    }

}
