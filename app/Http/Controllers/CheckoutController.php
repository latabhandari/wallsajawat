<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as User;
use App\Profile as Profile;
use Auth;

use App\Cities as Cities;
use App\States as States;
use App\Offer as Offer;
use Cart;
use App\Helpers\MyHelper as MyHelper;
use App\Wishlist as Wishlist;

class CheckoutController extends Controller
{
    //
		
   public function __construct()
    {
        $this->middleware('auth', ['except' => 'checkout']);
    }

    public function checkout()
       {
          if (Cart::count()) {
                if(\Auth::check())
                 {
                       $user   = \Auth::user();
                       $states = States::where('country_id', env('DEFAULT_COUNTRY', 101))->get();
                       $cities = Cities::where('state_id', env('DEFAULT_STATE', 13))->get();
                       return view('pages.cart.checkout', compact('user', 'cities', 'states'));  
                 }
                else
                  {
                      return redirect(route('login').'?redirect_url='.route('cart.checkout'));
                  }
          }
          else
                      return redirect()->route('home.index');
       }

      public function checkoutStore(Request $request)
           {
               request()->validate(['name' => 'required|string|max:255', 'address' => 'required', 'city_id' => 'required|string|max:255', 'state_id' => 'required|string|max:255', 'postal_code' => 'required|numeric|digits:6', 'mobile' => 'required|numeric|digits:10']);

               $params                             =    $request->all();

               $fields['name']                     =    $params['name'];
               $fields['mobile']                   =    $params['mobile'];
               //User::find(Auth::user()->id)->update($fields);

               $pfields['name']                    =    $params['name'];
               $pfields['address']                 =    $params['address'];
               $pfields['city']                    =    $params['city_id'];
               $pfields['state']                   =    $params['state_id'];
               $pfields['pin']                     =    $params['postal_code'];
               $pfields['mobile']                  =    $params['mobile'];

               session(['shipping_address' => json_encode($pfields)]);

               //Profile::where('user_id', Auth::user()->id)->update($pfields);

               return redirect()->route('order.store');
           }


        public function coupon(Request $request)
          {
              $params = $request->all();
              $coupon = $params['coupon'];
              if (session('discount'))
	              {
        						$arr = ["status" => false, "msg" => "You've already applied coupon code!"];
        						echo json_encode($arr);
        						return;
	              }

              if ($coupon)
              	 {	
              	 	$current_day   = date('d'); 
              	 	$current_month = date('m'); 
              	 	$current_day   = date('y'); 
              	    //$start_date    = mktime(0, 0, 0, $current_month, $current_day, $current_day, );	
              	 	//$end_date      = mktime(23, 59, 59, $current_month, $current_day, $current_day);
              	 	$current_time    = time();

              	 	$record        = Offer::where('start_date', '<=', $current_time)->where('end_date', '>=', $current_time)->where('coupon', $coupon)->where('status', 1)->limit(1)->first();
					if ( ! ($record == null)) 
						{
						   $cart_total = MyHelper::removeComma(Cart::total());
						   $type       = (int) $record->type;
						   switch ($type)
							    {
							    	case 1:
    							    				$discnt       = $record->discount;
    							    				$discount     = $cart_total * $discnt / 100;
    							    				$total        = $cart_total - $discount; 

    							    				break;
							    	case 2:
    							    				$discount     = $record->discount;
    							    				$total        = $cart_total - $discount; 

    							    				break;
							    }
							    	session(['discount' => $discount, 'coupon' => $coupon]);
							    	$request->session()->flash('discount_status', 'Successfully applied!');
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


    public function wishlistRemove($random_id = '')
       {
          Wishlist::where(['random_string' => $random_id])->delete();
          return redirect()->back();
       }


}
