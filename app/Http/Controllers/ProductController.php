<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product as Product;
use App\Measurement as Measurement;
use Cart;

class ProductController extends Controller
{
    //
    public function detail($slug)
      {
      	  $detail        =  Product::where('slug', $slug)->firstOrFail();
      	  $measurements  =  Measurement::select('id', 'name')->where('status', 1)->get();
      	  return view('pages.product.detail', compact('detail', 'measurements'));
      }

    public function option(Request $request)
      {
      	  $params  = 	$request->all();
      	  $width   = 	$params['width'];
      	  $height  = 	$params['height'];
      	  $format  = 	$params['format'];
      	  $price   = 	$params['price'];
      	  switch($format)
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

	        echo json_encode(['status' => true, 'price' => round($uprice)]);
      }

    public function cart(Request $request)
     {
     	$params		        =  $request->all();
     	$width        		=  $params['width'];
     	$height       		=  $params['height'];
     	$material_type      =  $params['material_type'];
     	$id           		=  $params['id'];
     	$product      		=  Product::find($id);

     	$productname  		=  $product->name; 
     	$type         		=  $product->type;
     	$price         		=  $product->price;

     	switch($material_type)
	      	   {
	      	   		case 'feet':
			      	   	                 $width_height    =  $width * $height;
			      	   	                 $uprice		  =  $price * $width_height;
			      	   	                 break;

	      	   	    case 'inch':
			      	   	                 $width_height    =  $width * $height;
			      	   	                 $per_square_feet =  $width_height / 144;
			      	   	                 $uprice		  =  $price * $per_square_feet;
			      	   	                 break;
	      	   	    case 'centimeter':
			      	   	                 $width_height    =  $width * $height;
			      	   	                 $per_square_feet =  $width_height / 929;
			      	   	                 $uprice		  =  $price * $per_square_feet;
			      	   	                 break;
	      	   }

     	Cart::add(['id' => $id, 'name' => $productname, 'qty' => 1, 'price' => $uprice, 'options' => ['type' => $material_type, 'width' => $width, 'height' => $height]]);

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

