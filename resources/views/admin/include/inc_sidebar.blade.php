<?php

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

          case 'users':
                             $users_active      =   'active';//'menu-open';
                             break;
          case 'setting':
                             $settings_active   =   'active';//'menu-open';
                             break;
   }
?>
<style>
 .activelink{background:#39454a !important}
</style>

            <section class="sidebar">
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu" data-widget="tree">

                  <li class="header">MAIN NAVIGATION</li>

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
                     <a class="{{ isset($users) ? 'activelink' : '' }}" href="{{ route('admin.users') }}"><span>Users</span></a>
                  </li>
                
                  <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('admin.settings') }}"><span>Settings</span></a>
                  </li>

				          <li class="">
                     <a href="{{ route('admin.logout') }}">Logout</a>
                  </li>
                  
               </ul>
            </section>
