<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product as Product;
use App\Measurement as Measurement;
use Cart;
use App\ProductImages as ProductImages;

class ProductController extends Controller
{
    //    
    public function detail($slug)
      {
      	  $detail         =  Product::where('slug', $slug)->firstOrFail();
          $product_images =  ProductImages::where('product_id', $detail->id)->get();
      	  $measurements   =  Measurement::select('id', 'name', 'square_feet_value')->where('status', 1)->get();
      	  return view('pages.product.detail', compact('detail', 'measurements', 'product_images'));
      }

    public function option(Request $request)
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
     	$price         		=  $product->price;

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

     public function viewCart()
     {
     	//print_r(Cart::content());
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


}

