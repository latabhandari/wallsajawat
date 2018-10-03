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

          case 'users':
                             $users_active      =   'active';//'menu-open';
                             break;
          case 'settings':
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

                  <li class="treeview {{ isset($roles_active) ? $roles_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Role</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                     <ul class="treeview-menu">

                        @php
                          $index_roles = MyHelper::getPermission('index_roles');
                          if ( ! empty($index_roles)) {
                        @endphp 
                         <li><a href="{{ route('roles.index') }}">View Roles</a></li>
                        @php
                         }
                        @endphp

                        @php
                          $add_role = MyHelper::getPermission('add_role');
                          if ( ! empty($add_role)) {
                        @endphp 
                         <li><a class="" href="{{ route('roles.create') }}">Add Role</a></li>
                        @php
                         }
                        @endphp

                     </ul>
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
