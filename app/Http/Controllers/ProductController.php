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
use Auth;


class ProductController extends Controller
{
    //    
     
    public function detail($slug)
      {
      	  $detail         =  Product::where('slug', $slug)->firstOrFail();
          $product_images =  ProductImages::where('product_id', $detail->id)->get();
      	  $measurements   =  Measurement::select('id', 'name', 'square_feet_value')->where('status', 1)->get();

          /* featured products */
          $product_category_id = ProductCategory::select('category_id')->where('product_id', $detail->id)->first()->category_id;
          $featured_products   = DB::table('products')
                                      ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
                                      ->where('product_categories.category_id', $product_category_id)
                                      ->where('product_categories.product_id', '<>', $detail->id)
                                      ->get();
          /* close */

      	  return view('pages.product.detail', compact('detail', 'measurements', 'product_images', 'featured_products'));
      }


    public function option(Request $request)
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
     	$product      		=  Product::find($id);

     	$productname  		=  $product->name; 
     	$type         		=  $product->type;
     	$price         		=  MyHelper::getProductSquareFeetPrice($product->id);

      $mres             =  Measurement::select('square_feet_value')->where('id', $material_type_id)->firstOrFail();

      $square_feet_value = $mres->square_feet_value;

      $width_height      =  $width * $height;
      $per_square_feet   =  $width_height / $square_feet_value;
      $uprice            =  $price * $per_square_feet;

     	/*switch($material_type)
	      	   {
	      	   		case 'feet':
			      	   	                 $width_height    =  $width * $height;
			      	   	                 $uprice		      =  $price * $width_height;
			      	   	                 break;

	      	   	    case 'inch':
			      	   	                 $width_height    =  $width * $height;
			      	   	                 $per_square_feet =  $width_height / 144;
			      	   	                 $uprice		      =  $price * $per_square_feet;
			      	   	                 break;
	      	   	    case 'centimeter':
			      	   	                 $width_height    =  $width * $height;
			      	   	                 $per_square_feet =  $width_height / 929;
			      	   	                 $uprice		      =  $price * $per_square_feet;
			      	   	                 break;
	      	   }
      */

     	Cart::add(['id' => $id, 'name' => $productname, 'qty' => $qty, 'price' => $uprice, 'options' => ['type' => $material_type_id, 'width' => $width, 'height' => $height]]);

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

}

