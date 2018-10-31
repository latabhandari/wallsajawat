<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Auth;
use DB;
use App\Cities as Cities;
use App\States as States;
use App\User as User;
use App\Profile as Profile;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ProfileController extends Controller
{
    //
    private $_userid;

     public function __construct()
	    {
	        $this->middleware('auth');
	    }

     public function mywishlist()
       {
        	$wishlists = DB::table('wishlists')
		            			->join('products', 'wishlists.pid', '=', 'products.id')
		            			->select('products.name', 'products.sku', 'products.id', 'products.price', 'products.slug', 'wishlists.random_string')
		           		 		->where('wishlists.user_id', Auth::user()->id)
		           				->get();
           return view('pages.wishlist.wishlist', compact('wishlists'));
       }


      public function profile()
       {
           $user = DB::table('users')
                      ->join('profile', 'users.id', '=', 'profile.user_id')
                      ->select('users.name', 'users.email', 'users.mobile', 'profile.address', 'profile.city', 'profile.state', 'profile.pin', 'profile.country', 'profile.profile')
                      ->where('users.id', Auth::user()->id)
                      ->first();

            $states = States::where('country_id', 101)->get();
            $cities = Cities::where('state_id', 13)->get();

            return view('pages.profile.profile', compact('user', 'states', 'cities'));
       }

      public function updateProfile(Request $request)
       {

         $params                            =    $request->all();

         if ( ! empty($params['password']) OR ! empty($params['password_confirmation']))
           {
              request()->validate(['name' => 'required', 'address' => 'required', 'city' => 'required', 'state' => 'required', 'pin' => 'required', 'mobile' => 'required|min:10|numeric', 'password' => 'required|min:6|confirmed', 'password_confirmation' => 'required|min:6']);

              $fields['password']           =    Hash::make($params['password']);
           }
        else
           {
              request()->validate(['name' => 'required', 'address' => 'required', 'city' => 'required', 'state' => 'required', 'pin' => ' required', 'mobile' => 'required|min:10|numeric']);
           }         

         $fields['name']                    =    $params['name'];
         $fields['mobile']                  =    $params['mobile'];

         $userid                            =    Auth::user()->id;

         User::where('id', $userid)->update($fields);

         $pfields['address']                 =    $params['address'];
         $pfields['city']                    =    $params['city'];
         $pfields['state']                   =    $params['state'];
         $pfields['pin']                     =    $params['pin'];

         Profile::where('user_id', $userid)->update($pfields);

         return redirect()->route('profile')->with('success','created successfully');

       }

      public function rating(Request $request)
        {
           $params               = $request->all();
           $rating               = (int) $params['rating'];
           $review               = $params['review'];
           $enc_order_product_id = $params['encrypt_id'];

           if ( ! empty($enc_order_product_id))
               {
                  try  {
                            $order_product_id = Crypt::decryptString($enc_order_product_id);
                            list($order_no, $product_id) = explode('-', $order_product_id);
                            $record  = Rating::where(['order_number' => $order_no, 'product_id' => $product_id])->count();
                            if (empty($record) && ($rating >= 1 && $rating <= 5))
                               {
                                     $pfields['order_number']            =    $order_no;
                                     $pfields['product_id']              =    $product_id;
                                     $pfields['user_id']                 =    Auth::user()->id;
                                     $pfields['rating']                  =    $rating;
                                     $pfields['review']                  =    $review;
                                     $pfields['ip']                      =    $request->ip();
                                     $pfields['user_agent']              =    $request->header('User-Agent');
                                     $pfields['timestamp']               =    time();

                                     $ratingobj = Rating::insert($pfields);
                                     $id        = $ratingobj->id;
                                     if ($id)
                                      $arr = ['status' => 'success']; 
                                    else
                                      $arr = ['status' => 'failure'];
                               }
                            else
                                      $arr = ['status' => 'failure']; 

                        } catch (DecryptException $e) {
                             $arr = ['status' => 'failure']; 
                        }
               }
           else
              {
                  $arr = ['status' => 'failure']; 
              }
                  echo json_encode($arr);
        }


}
