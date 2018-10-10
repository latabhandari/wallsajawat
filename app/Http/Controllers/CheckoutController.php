<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as User;
use App\Profile as Profile;
use Auth;

use App\Cities as Cities;
use App\States as States;

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
               $pfields['city']                 =    $params['city_id'];
               $pfields['state']                =    $params['state_id'];
               $pfields['pin']             =    $params['postal_code'];
               
               Profile::where('user_id', Auth::user()->id)->update($pfields);
           }

        public function coupon(Reauest $request)
          {
              $params = $request->all();
              $coupon = $params['coupon'];
              echo $coupon;
          } 

}
