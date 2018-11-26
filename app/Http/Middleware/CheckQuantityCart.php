<?php

namespace App\Http\Middleware;

use Closure;

use App\Product as Product;

use Cart;

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
          $params        =  $request->all();
          $cart_contents =  Cart::content();
          foreach ($params['update'] as $rowId => $quantity):
            $product_id  =  $cart_contents[$rowId]->id;

            $product          =    Product::select('stock_item')->where('id', $product_id)->firstOrFail();
            $stock_item       =    (int) $product->stock_item;
            if ($quantity > $stock_item)
            return redirect()->back()->with('error_msg', 'Sorry. only '.$quantity.' Quantity are left');

          endforeach;

            return $next($request);
    }
}
