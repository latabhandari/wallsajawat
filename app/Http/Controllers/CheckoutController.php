<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as User;
use App\Profile as Profile;
use Auth;

use App\Cities as Cities;
use App\States as States;
use App\Offers as Offers;

class CheckoutController extends Controller
{
    //

   public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
       {
          if(\Auth::check())
           {
                 $user   = \Auth::user();
                 $states = States::where('country_id', 101)->get();
                 $cities = Cities::where('state_id', 13)->get();
                 return view('pages.cart.checkout', compact('user', 'cities', 'states'));  
           }
          else
            {
                return redirect(route('login').'?redirect_url='.route('cart.checkout'));
            }
       }

      public function checkoutStore(Request $request)
           {
               request()->validate(['name' => 'required', 'address' => 'required', 'city_id' => 'required', 'state_id' => 'required', 'country_id' => 'required', 'postal_code' => 'required|digits:6|numeric', 'mobile' => 'required']);

               $params                             =    $request->all();

               $fields['name']                     =    $params['name'];
               $fields['mobile']                   =    $params['mobile'];
               User::find(Auth::user()->id)->update($fields);

               $pfields['address']                 =    $params['address'];
               $pfields['city']                    =    $params['city_id'];
               $pfields['state']                   =    $params['state_id'];
               $pfields['pin']                     =    $params['postal_code'];
               
               Profile::where('user_id', Auth::user()->id)->update($pfields);
           }

        public function coupon(Request $request)
          {
          	echo "1";
              $params = $request->all();
              $coupon = $params['coupon'];
              if ($coupon)
              	 {	
              	 	echo "2";
              	 	$current_day   = date('d'); 
              	 	$current_month = date('m'); 
              	 	$current_day   = date('y'); 
              	    //$start_date    = mktime(0, 0, 0, $current_month, $current_day, $current_day, );	
              	 	//$end_date      = mktime(23, 59, 59, $current_month, $current_day, $current_day);
              	 	$current_time    = time();

              	 	$record        = Offers::where('start_date', '<=', $current_time)->where('end_date', '>=', $current_time)->where('coupon', $coupon)->where('status', 1)->limt(1)->first();
					if ($record === null) 
						{
						   $cart_total = Cart::total();
						   $type = (int) $record->type;
						   switch ($type)
							    {
							    	case 1:
							    				echo "3";
							    				$discount     = $record->discount;
							    				$cal_discount = $cart_total * $discount / 100;
							    				$total        = $cart_total - $cal_discount; 

							    				break;
							    	case 2:
							    				echo "4";
							    				$discount     = $record->discount;
							    				$total        = $cart_total - $discount; 

							    				break;
							    }
							    	session(['discount' => $discount]);
							    	$arr = ["status" => true, "msg" => "applied"];
						}
					else
						{
							$arr = ["status" => false, "msg" => "coupon code does not exist!"];
						}
              	 }
              else
              	 {
              	 	        $arr = ["status" => false, "msg" => "please enter coupon code!"];
              	 }
              			    echo json_encode($arr);
          } 

}
