<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\OrderProducts as OrderProducts;
use App\Order as Order;
use App\Helpers\MyHelper as MyHelper;
use Cart;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {

			$discount 					 = 	session('discount');
        	$order['order_number']       =  rand(1111111111, 9999999999); 
        	$order['user_id']            =  Auth::user()->id;
        	$order['coupon']             =  session('coupon');
        	$order['discount']           =  session('discount');
        	$order['total_amount']       =  Cart::total();

        	
		    $cart_total 				 = MyHelper::removeComma(Cart::total());
		    $payable_amount  			 = $cart_total - $discount;

        	$order['payable_amount']     = $payable_amount;
        	$order['ip_address']         = $request->ip();
        	$order['user_agent']         = $request->header('User-Agent');
        	$order['unix_timestamp']     = time();

        	$order_id                    = Order::create($order)->id;

        	foreach(Cart::content() as $row) 
        	   {
        	   	    $mdata                       =  [];
        	   	    $mid                         =  $row->options->type; 
        	   	    $mdata['measurement_id']     =  $mid;
				    $measurement_info  			 =  App\Helpers\MyHelper::getMeasurement($mid);
				    $mdata['measurement_name']   =  $measurement_info->name;
				    $mdata['width']  		     =  $measurement_info->width;
				    $mdata['height']             =  $measurement_info->height;

				    $data['order_id']            =  $order_id;
				    $data['product_id']          =  $row->id;
				    $data['price']               =  round($row->price);
				    $data['dimension']           =  json_encode($mdata);

				    OrderProducts::insert($data);

  		       }
  		    Session::forget('coupon');
  		    Session::forget('discount');
  		    Cart::destroy();

  		    echo "success";
  		 }

}
