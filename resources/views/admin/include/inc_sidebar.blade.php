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
                     <i class=""></i><span>State</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                       <ul class="treeview-menu">
                         <li><a href="{{ route('state.index') }}">View States</a></li>
                         <li><a class="" href="{{ route('state.create') }}">Add State</a>a></li>
                        </ul>
                  </li>
                  <li class="treeview {{ isset($loan_categories_active) ? $loan_categories_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>City</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                       <ul class="treeview-menu">
                         <li><a href="{{ route('city.index') }}">View Cities</a></li>
                         <li><a class="" href="{{ route('city.create') }}">Add City</a>a></li>
                       </ul>
                  </li>


                  <li class="treeview {{ isset($loan_categories_active) ? $loan_categories_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Attribute</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                       <ul class="treeview-menu">
                         <li><a href="{{ route('attribute.index') }}">View Attributes</a></li>
                         <li><a class="" href="{{ route('attribute.create') }}">Add Attribute</a>a></li>
                       </ul>
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

                  <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('admin.ads') }}"><span>Ads</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($dashboard_active) ? 'activelink' : '' }}" href="{{ route('admin.users') }}"><span>Users</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('admin.subscribes') }}"><span>Subscribe Users</span></a>
                  </li>
				  
				   <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('admin.contactus') }}"><span>Contact Us</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('admin.settings') }}"><span>Settings</span></a>
                  </li>
				          <li class="">
                     <a href="{{ route('admin.logout') }}">Logout</a>
                  </li>
                  
               </ul>
            </section>