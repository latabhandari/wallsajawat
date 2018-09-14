<?php

$segment1 = Request::segment(1);
$segment2 = Request::segment(2);

switch ($segment2)
   {
          case 'dashboard':
                             $dashboard_active  =  'active';
                             break;

          case 'categories':
                             $category_active   =   '';//'menu-open';
                             break;
          case  'product':
                             $product_active    =  '';
                             break;

          case 'users':
                             $users_active      =   '';//'menu-open';
                             break;
          case 'setting':
                             $settings_active   =   'active';//'menu-open';
                             break;
   }
?>
<style>
 .activelink{color:#FFF !important}
</style>

            <section class="sidebar">
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu" data-widget="tree">
                  <li class="header">MAIN NAVIGATION</li>

                  <li class="">
                     <a class="{{ isset($dashboard_active) ? 'activelink' : '' }}" href="{{ route('admin.dashboard') }}"><span>Dashboard</span></a>
                  </li>
                
                  <li class="treeview {{ isset($loan_categories_active) ? $loan_categories_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Category</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                       <ul class="treeview-menu">
                         <li><a href="{{ route('categories.index') }}">View Categories</a></li>
                         <li><a class="" href="{{ route('categories.create') }}">Add Category</a>a></li>
                        </ul>
                  </li>

                  <li class="treeview {{ isset($product_active) ? $product_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Product</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                       <ul class="treeview-menu">
                         <li><a href="{{ route('product.index') }}">View Products</a></li>
                         <li><a class="" href="{{ route('product.create') }}">Add Product</a>a></li>
                        </ul>
                  </li>


                   <li class="treeview {{ isset($product_active) ? $product_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Measurement</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                        <ul class="treeview-menu">
                          <li><a href="{{ route('measurement.index') }}">View Measurements</a></li>
                          <li><a class="" href="{{ route('measurement.create') }}">Add Measurement</a>a></li>
                        </ul>
                  </li>

                  <li class="treeview {{ isset($loan_categories_active) ? $loan_categories_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Offers</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                       <ul class="treeview-menu">
                         <li><a href="{{ route('offers.index') }}">View Offers</a></li>
                         <li><a class="" href="{{ route('offers.create') }}">Add Offer</a>a></li>
                        </ul>
                  </li>




                  <li class="">
                     <a class="{{ isset($dashboard_active) ? 'activelink' : '' }}" href="{{ route('admin.users') }}"><span>Users</span></a>
                  </li>

                  

                  <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('admin.settings') }}"><span>Settings</span></a>
                  </li>
				          <li class="">
                     <a href="{{ route('admin.logout') }}">Logout</a>
                  </li>
                  
               </ul>
            </section>
