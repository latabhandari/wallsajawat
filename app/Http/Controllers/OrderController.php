<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\OrderProducts as OrderProducts;
use App\Order as Order;
use App\Helpers\MyHelper as MyHelper;
use Cart;
use Session;

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
        	$order['order_number']       =  rand(11111111, 99999999); 
        	$order['user_id']            =  Auth::user()->id;
        	$order['coupon']             =  session('coupon');
        	$order['discount']           =  session('discount');

        	$cart_total 				 =  MyHelper::removeComma(Cart::total());
        	$order['total_amount']       =  $cart_total;

		    $payable_amount  			 =  $cart_total - $discount;

        	$order['payable_amount']     =  $payable_amount;
        	$order['ip_address']         =  $request->ip();
        	$order['user_agent']         =  $request->header('User-Agent');
        	$order['unix_timestamp']     =  time();

        	$order_id                    =  Order::create($order)->id;

        	foreach(Cart::content() as $row) 
        	   {
        	   	    $mdata                       =  [];
        	   	    $mid                         =  $row->options->type; 
        	   	    $mdata['mid']     			 =  $mid;
				    $measurement_info  			 =  MyHelper::getMeasurement($mid);
				    $mdata['name']               =  $measurement_info->name;
				    $mdata['width']  		     =  $row->options->width;
				    $mdata['height']             =  $row->options->height;

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
