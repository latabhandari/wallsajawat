<?php
use App\Helpers\MyHelper as MyHelper;

echo $segment3 = Request::segment(3);

switch ($segment3)
   {
          case 'dashboard':
                             $dashboard_active  =  'active';
                             break;

          case 'categories':
                             $category_active   =   'active';//'menu-open';
                             break;
          case  'product':
                             $product_active    =  'active';
                             break;

          case  'offers':
                             $offers_active     =  'active';
                             break;

          case  'roles':
                             $roles_active      =  'active';
                             break;

          case 'users':
                             $users_active      =   'active';//'menu-open';
                             break;
          case 'settings':
                             $settings_active   =   'active';//'menu-open';
                             break;
          case 'contact-us-users':
                             $contact_active   =   'active';//'menu-open';
                             break;
          case 'dimension':
                             $dimension_active  =   'active';//'menu-open';
                             break;
          case 'orders':
                             $order_active      =   'active';//'menu-open';
                             break;
   }
?>
<style>
 .activelink{background:#39454a !important}
</style>

            <section class="sidebar">
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu" data-widget="tree">

                  <li class="">
                     <a class="{{ isset($dashboard_active) ? 'activelink' : '' }}" href="{{ route('admin.dashboard') }}"><span>Dashboard</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($category_active) ? 'activelink' : '' }}" href="{{ route('categories.index') }}"><span>Categories</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($product_active) ? 'activelink' : '' }}" href="{{ route('product.index') }}"><span>Products</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($offers_active) ? 'activelink' : '' }}" href="{{ route('offers.index') }}"><span>Offers</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($dimension_active) ? 'activelink' : '' }}" href="{{ route('dimension.index') }}"><span>Dimensions</span></a>
                  </li>


                  <li class="">
                     <a class="{{ isset($roles_active) ? 'activelink' : '' }}" href="{{ route('roles.index') }}"><span>Roles</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($users) ? 'activelink' : '' }}" href="{{ route('user.index') }}"><span>Users</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($order_active) ? 'activelink' : '' }}" href="{{ route('admin.orders') }}"><span>Orders</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($contact_active) ? 'activelink' : '' }}" href="{{ route('admin.contactus') }}"><span>Contact Us</span></a>
                  </li>
                
                  <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('admin.settings') }}"><span>Settings</span></a>
                  </li>

				          <li class="">
                     <a href="{{ route('admin.logout') }}">Logout</a>
                  </li>
                  
               </ul>
               
            </section>
