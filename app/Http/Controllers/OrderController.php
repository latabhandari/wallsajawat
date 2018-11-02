<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\OrderProducts as OrderProducts;
use App\Order as Order;
use App\Helpers\MyHelper as MyHelper;
use Cart;
use Session;
use App\Product as Product;
use Illuminate\Support\Facades\Crypt;
use App\Cities as City;
use App\States as State;
use Mail;

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

			    $discount 					         = 	session('discount');
			    $order_number                =  rand(111111111, 999999999);
        	$order['order_number']       =  $order_number;
        	$order['user_id']            =  Auth::user()->id;
        	$order['coupon']             =  session('coupon');
        	$order['discount']           =  session('discount');

          $cart_total 				         =  MyHelper::removeComma(Cart::total());
          $order['total_amount']       =  $cart_total;

          $payable_amount  			       =  $cart_total - $discount;

          $order['payable_amount']     =  $payable_amount;
          $order['shipping_address']   =  session('shipping_address');
          $order['ip_address']         =  $request->ip();
          $order['user_agent']         =  $request->header('User-Agent');
          $order['unix_timestamp']     =  time();

        	$order_id                    =  Order::create($order)->id;

        	foreach(Cart::content() as $row) 
        	   {
        	   	    $mdata                       =  [];
        	   	    $mid                         =  $row->options->type; 
        	   	    $mdata['mid']     			     =  $mid;
                  $measurement_info  			     =  MyHelper::getMeasurement($mid);
                  $mdata['name']               =  $measurement_info->name;
                  $mdata['width']  		         =  (string) $row->options->width;
                  $mdata['height']             =  (string) $row->options->height;

                  $data['order_id']            =  $order_id;
                  $data['product_id']          =  $row->id;
                  $data['price']               =  round($row->price);
                  $data['qty']                 =  $row->qty;
                  $data['dimension']           =  json_encode($mdata);

				          OrderProducts::insert($data);

                  $stock_item_obj              =  Product::select('stock_item')->where('id', $row->id)->first();

                  $stock_item                  =  $stock_item_obj->stock_item - $row->qty;

                  Product::where('id', $row->id)->update(['stock_item' => $stock_item]);

                  /* create array for email */


                  $prod_image_info              =     MyHelper::getProductImage($row->id);
                  $product_info                 =     MyHelper::getProductInfo($row->id, ['name', 'short_desc', 'price']);

                  $order_products               =     array();

                   die('sdfasdsdfsdf');

                  $dimension                    =     MyHelper::getRollDimenstionById($mid);

                  $order_products['image']      =     $prod_image_info->image;
                  $order_products['name']       =     $product_info[0]['name'];
                  $order_products['short_desc'] =     $product_info[0]['short_desc'];
                  $order_products['price']      =     $product_info[0]['price'];
                  $order_products['qty']        =     $row->qty;
                  $order_products['width']      =     $dimension->width;
                  $order_products['height']     =     $dimension->height;
                  $order_summ_products[]        =     $order_products; 
  		       }

              $order_array['cart_contents']      =    $order_summ_products;

              $ship_info                         =    json_decode(session('shipping_address'));
              $cityobj                           =    City::select('name')->where('id', $ship_info->city)->first();
              $stateobj                          =    State::select('name')->where('id', $ship_info->state)->first();
              $shipping_address                  =    $ship_info->name . '<br />' . $ship_info->address  . '<br />' .  $cityobj->name  . '<br />' .  $stateobj->name  . '<br />' .  $ship_info->pin;

              $order_array['shipping_address']   =    $shipping_address;

              $order_array['order_number']       =    $order_number;
              $order_array['coupon']             =    session('coupon');
              $order_array['discount']           =    session('discount');

              $order_array['total_amount']       =    $cart_total;

              $order_array['payable_amount']     =    $payable_amount;

              /* send order email */
              Mail::send('emails.order', $order_array, function ($message)
                {
                    $message->from(env('MAIL_FROM_ADDRESS', ''), env('MAIL_FROM_NAME', ''));
                    $message->to(Auth::user()->email);

                    //Add a subject
                    $message->subject("WallSajawat - Order");
                });

              /* close */

  		        /* remove session for coupon and destroy cart */
                  Session::forget('coupon');
                  Session::forget('discount');
                  Session::forget('shipping_address');
                  Cart::destroy();
	  		    /* close */

	  		           return redirect()->route('orders');
  		 }

  	public function order()
  	  {
  	  		$orders = Order::where("user_id", Auth::user()->id)->orderBy('unix_timestamp', 'desc')->get();
			    return view('pages.order.order_detail', compact('orders'));
  	  }

}
