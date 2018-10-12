<?php

namespace App\Helpers;
use DB;
use App\Categories as Categories;
use Session;

use Auth;
use App\ProductImages as ProductImages;
use App\Measurement as Measurement;
use App\Dimension as Dimension;
use App\Product as Product;
use App\Categories as Category;
use App\OrderProducts as OrderProducts;
class MyHelper 
   {

   	  	 public static function getProductInfo($id = '', $fields = array())
   	       {
			  $fields_comma_separated  = "'".implode("', '", $fields)."'";
			  echo $fields_comma_separated;

   	       	  return Product::select($fields_comma_separated)->where('id', $id)->first();
   	       }

   	      public static function getCategories()
   	       {
   	       	  return Category::select('id', 'name', 'slug')->where('status', 1)->get();
   	       }

   	      public static function getCustomerShippingAddress($order_id = '')
   	       {
   	       	  return 'Delhi';
   	       } 

   	      public static function getOrderProducts($orderid = '')
   	       {
   	       		return OrderProducts::where('order_id', $orderid)->get();
   	       }

   	      public static function removeComma($string = '')
   	       {
   	       	  return floor(str_replace(',','', $string));
   	       }

   		  public static function getProductSquareFeetPrice($id)
   	       {
   	       	 $product_info    = Product::where("id", $id)->first();
   	       	 $product_roll_id = $product_info->roll_id;

   	       	 $roll_info       = Dimension::where("id", $product_roll_id)->first();
   	       	 $total_dimension = $roll_info->width * $roll_info->height;

   	       	 return $product_info->price / $total_dimension;
				
   	       }

   	      public static function getMeasurement($id)
   	       {
				 return Measurement::where('id', $id)->first();
   	       }
   	      public static function getProductImage($id)
   	       {
   	       		return ProductImages::where('id', $id)->first();
   	       }
		  public static function getSessionValue($key = null)
		   {
		  	  	return Session::get($key);
		   }

		  public static function getPermission($index = '') 
			 {
			 	  $userid    =  Auth::user()->id;
			 	  //$userid    =  12;
			  	  $role_id   =  DB::table('users')->select('role_id')->where('id', $userid)->first()->role_id;

			  	  if ($role_id == 1)
			  	    return TRUE;
			  	  else
			  	    {
		 				$permission = DB::table('roles')->select('permission')->where('id', $role_id)->first()->permission;
		 				$permission_obj = json_decode($permission);
		 				return $permission_obj->permission->$index;
			  	    }
			 }

		  public static function tep_get_category_tree($flag = '', $parent_id = '0', $spacing = '', $exclude = '', $category_tree_array = '', $include_itself = false) 
		    {
				if ( ! is_array($category_tree_array)) $category_tree_array = array();
				
				if ($flag === 1)
				  {
				     if ( (sizeof($category_tree_array) < 1) && ($exclude != '0') ) 
					 $category_tree_array[] = array('id' => '0', 'text' => '--- Parent ---');
				  }

				if ($flag === 2)
				  {
				     if ( (sizeof($category_tree_array) < 1) && ($exclude != '0') ) 
					 $category_tree_array[] = array('id' => '0', 'text' => '--- Select ---');
				  }

				if ($include_itself) 
				  {
						$category = DB::table('categories')->where('parent_id', $parent_id)->first();
						$category_tree_array[] = array('id' => $parent_id, 'text' => $category->name);
				  }
						$categories_query = DB::table('categories')->where('parent_id', $parent_id)->orderBy('name', 'asc')->get()->toArray();
						foreach ($categories_query as $categories)
						  {
						  	 $categories = (array) $categories;
							 if ($exclude != $categories['id']) $category_tree_array[] = array('id' => $categories['id'], 'text' => $spacing .  ucwords($categories['name']));
							 $category_tree_array = self::tep_get_category_tree($flag, $categories['id'], $spacing . '&nbsp;&nbsp;&nbsp;', $exclude,  $category_tree_array, '', $flag);
						  }
						     return $category_tree_array;
		    }

		public static function tep_draw_pull_down_menu($name = '', $values = '', $parent_id = '', $category_id = '', $flag = 0) 
			{
				$field  = '<select  id="" class="form-control" name="' . $name . '"';
				$field .= '>';
				for ($i = 0, $n = sizeof($values); $i < $n; $i++) 
				    {
						$selected = ($parent_id ==  $values[$i]['id']) ? "selected = 'selected'" : '';
						
						$disabled = '';
						
						if (empty($flag))
						$disabled = ($category_id ==  $values[$i]['id']) ? "disabled = 'disabled'" : '';
					
						$field   .= '<option '.$disabled.' value="' . $values[$i]['id'].'" '.$selected.'';
						$field   .= '>' . ucwords($values[$i]['text']) . '</option>';
					}
						$field   .= '</select>';
						return $field;
			}

		public static function tep_draw_pull_down_category($name = '', $values = '', $product_id = '', $flag = 0) 
			{
				$field  = '<select multiple id="" class="form-control" name="' . $name . '"';
				$field .= '>';

				$category_ids = [];
				if ( ! empty($product_id))
					{
						$res = DB::table('product_categories')->where('product_id', $product_id)->get();
						foreach ($res as $result)
						$category_ids[] = $result->category_id;	
					}
				else
					    $field .= '<option disabled selected value="">-- Select Categories --</option>';
				
				
				
				for ($i = 0, $n = sizeof($values); $i < $n; $i++) 
				    {
						$selected = (in_array($values[$i]['id'], $category_ids) ? "selected = 'selected'" : '');
													
						$field   .= '<option value="' . $values[$i]['id'].'" '.$selected.'';
						$field   .= '>' . ucwords($values[$i]['text']) . '</option>';
					}
						$field   .= '</select>';
						return $field;
			}
			
		public static function generateRandomString($length = 10, $flag = 0) 
			{

				if (empty($flag))
				$characters       = '0123456789abcdefghijklmnopqrstuvwxyz';
					else
				$characters       = '0123456789';

				$charactersLength = strlen($characters);
				$randomString     = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
					return $randomString;
			}

	    public static function showCategories($id = '', $category_array = array()) 
			  {
			  		$category_query   = DB::table('categories')->where('id', $id)->first();
			  		$category_array[] = $category_query->name;
			  		if (! empty($category_query->parent_id))
				  		{
				  			return self::showCategories($category_query->parent_id, $category_array);
				  		}
				    return implode(' &raquo; ', array_reverse($category_array));
			  }
}
