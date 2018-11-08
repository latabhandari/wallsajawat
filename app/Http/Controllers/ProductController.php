<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product as Product;
use App\Measurement as Measurement;
use Cart;
use App\ProductImages as ProductImages;
use App\ProductCategory as ProductCategory;
use App\Cities as Cities;
use App\States as States;
use DB;
use App\Helpers\MyHelper;

use App\User as User;
use App\Profile as Profile;
use App\Wishlist as Wishlist;
use App\Rating as Rating;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ProductController extends Controller
{
    //    
     
    public function detail($slug, $enc_order_product_id = null)
      {
      	  $detail         =  Product::where('slug', $slug)->firstOrFail();
          $product_images =  ProductImages::where('product_id', $detail->id)->get();
      	  $measurements   =  Measurement::select('id', 'name', 'square_feet_value')->where('status', 1)->get();

          /* featured products */
          $product_category_id = ProductCategory::select('category_id')->where('product_id', $detail->id)->first()->category_id;
          $featured_products   = DB::table('products')
                                      ->select('products.id', 'products.name', 'products.slug', 'products.price')
                                      ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
                                      ->where('product_categories.category_id', $product_category_id)
                                      ->where('product_categories.product_id', '<>', $detail->id)
                                      ->get();
          /* close */
          $rating = 0;
          if ( ! empty($enc_order_product_id))
             {
                try  {
                          $order_product_id = Crypt::decryptString($enc_order_product_id);
                          list($order_no, $product_id) = explode('-', $order_product_id);
                          $record  = Rating::where(['order_number' => $order_no, 'product_id' => $product_id])->count();
                          $rating  = empty($record) ? 1 : 0;

                      } catch (DecryptException $e) {
                          //
                      }
             }

          $user_ratings = Rating::select('rating', 'review', 'user_id', 'timestamp')->where('product_id', $detail->id)->get();

      	  return view('pages.product.detail', compact('detail', 'measurements', 'product_images', 'featured_products', 'rating', 'user_ratings'));
      }



    public function option(Request $request)
      {
          $params  =  $request->all();
          $width   =  $params['width'];
          $height  =  $params['height'];
          $mid     =  $params['mid'];
          $pid     =  $params['pid'];

          $tdim    =  MyHelper::getProductRollDimension($pid);

          $mres    =  Measurement::select('name', 'square_feet_value')->where('id', $mid)->firstOrFail();

          $square_feet_value =  $mres->square_feet_value; // get value in square feet for ex; 1 feet, 144 inch, 629 cm

          $width_height      =  ($width * $height) / $square_feet_value;

          $roll              =  ceil($width_height / $tdim);

          echo json_encode(['status' => true, 'roll' => $roll, 'type' => ucfirst($mres->name)]);
      }


    public function optionoldnew(Request $request)
      {
          $params  =  $request->all();
          $width   =  $params['width'];
          $height  =  $params['height'];
          $mid     =  $params['mid'];
          $pid     =  $params['pid'];

          $price   =  MyHelper::getProductSquareFeetPrice($pid);

          $mres    =  Measurement::select('name', 'square_feet_value')->where('id', $mid)->firstOrFail();

          $square_feet_value = $mres->square_feet_value;

          $width_height    =  $width * $height;
          $per_square_feet =  $width_height / $square_feet_value;
          $uprice          =  $price * $per_square_feet;

          echo json_encode(['status' => true, 'price' => round($uprice), 'type' => ucfirst($mres->name)]);
      }


    public function option1(Request $request)
      {
      	  $params  = 	$request->all();
      	  $width   = 	$params['width'];
      	  $height  = 	$params['height'];
      	  $mid     = 	$params['mid'];
          $price   =  $params['price'];

          $mres    =  Measurement::select('name', 'square_feet_value')->where('id', $mid)->firstOrFail();

          $square_feet_value = $mres->square_feet_value;

          $width_height    =  $width * $height;
          $per_square_feet =  $width_height / $square_feet_value;
          $uprice          =  $price * $per_square_feet;

	        echo json_encode(['status' => true, 'price' => round($uprice), 'type' => ucfirst($mres->name)]);
      }

    public function cart(Request $request)
     {
     	$params		        =  $request->all();
     	$width        		=  $params['width'];
     	$height       		=  $params['height'];
     	$material_type_id =  $params['material_type'];
     	$id           		=  $params['id'];
      $qty              =  $params['qty'];
     	$product      		=  Product::findOrFail($id);

     	$productname  		=  $product->name; 
     	$type         		=  $product->type;
     	/*$price         		=  MyHelper::getProductSquareFeetPrice($product->id);

      $mres             =  Measurement::select('square_feet_value')->where('id', $material_type_id)->firstOrFail();

      $square_feet_value = $mres->square_feet_value;

      $width_height      =  $width * $height;
      $per_square_feet   =  $width_height / $square_feet_value;
      $uprice            =  $price * $per_square_feet;
      */
      $uprice            =  $product->price;

     	Cart::add(['id' => $id, 'name' => $productname, 'qty' => $qty, 'price' => $uprice, 'options' => ['type' => $material_type_id, 'width' => $width, 'height' => $height]]);

    	return redirect()->route('cart');
      
     }


     public function wishlist_cart($id = '')
        {
            $qty              =  1;
            $product          =  Product::findOrFail($id);

            $productname      =  $product->name; 
            $type             =  $product->type;

            $uprice           =  $product->price;

            Cart::add(['id' => $id, 'name' => $productname, 'qty' => $qty, 'price' => $uprice, 'options' => ['type' => '', 'width' => '', 'height' => '']]);

            return redirect()->route('cart');
      
        }

     public function viewCart(Request $request)
     {
      /* here delete the coupon discount */
        $request->session()->forget('discount');
      /* close delete the coupon discount */

     	return view('pages.cart.cart');
     }

     public function deleteItem($rowId)
      {
      	  Cart::remove($rowId);
		      return redirect()->route('cart');
      }

     public function updateItem(Request $request)
      {
      		$params = $request->all();
      		foreach ($params['update'] as $rowId => $quantity)
            Cart::update($rowId, $quantity); // Will update the quantity
        	return redirect()->route('cart');
      }

      public function getCities($state_id = '')
        {
            $cities = Cities::select('id AS i', 'name AS n')->where('state_id', $state_id)->get();
            echo json_encode(['status' => true, 'cities' => $cities]);
        }

      public function wishlist(Request $request)
       {
         if(\Auth::check())
           {
                 $params  = $request->all();
                 $pid     = $params['pid'];
                 $userid  = \Auth::user()->id;
                 $query   = Wishlist::where(['user_id' => $userid, 'pid' => $pid])->get();
                 if (count($query))
                   {
                         $arr = ['status' => false, "msg" => "Already in your wishlist"];
                   }
                 else
                   {
                         $wishlist = new Wishlist;
                         $wishlist->user_id        = $userid;
                         $wishlist->pid            = $pid;
                         $wishlist->unix_timestamp = time();
                         $wishlist->ip_address     = request()->ip();
                         $wishlist->random_string  = str_random(24);
                         $wishlist->save();
                         $arr = ['status' => true, "msg" => "Successfully added in your wishlist"];
                   }
           }
          else
            {
                 $arr = ['status' => false, "msg" => "You need to signin or signup to add a wishlist"];
            }
                 echo json_encode($arr );
       }




}

