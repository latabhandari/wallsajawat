<?php

namespace App\Helpers;
use DB;
use App\Categories as Categories;
use Session;

class MyHelper 
   {
		  public static function getSessionValue($key = null)
		   {
		  	  	return Session::get($key);
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
