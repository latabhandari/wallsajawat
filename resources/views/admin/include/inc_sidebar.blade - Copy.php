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
          case 'loancategories':
                             $loan_categories_active   =   ''; //'menu-open';
                             break;
          case 'roles':
                             $roles_active      =   ''; //'menu-open';
                             break;

          case 'users':
                             $users_active      =   '';//'menu-open';
                             break;
          case 'borrowers':
                             $borrower_active   =   'active';//'menu-open';
                             break;
          case 'lenders':
                             $lender_active     =   'active';//'menu-open';
                             break;
          case 'setting':
                             $settings_active   =   'active';//'menu-open';
                             break;
   }

?>
<style>
 .activelink{color:#FFF !important;}
</style>

            <section class="sidebar">
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu" data-widget="tree">
                  <li class="header">MAIN NAVIGATION</li>
                  <li class="">
                     <a class="{{ isset($dashboard_active) ? 'activelink' : '' }}" href="{{ route('admindashboard') }}"><span>Dashboard</span></a>
                  </li>

                  {{-- 

                  <li class="treeview {{ isset($category_active) ? $category_active : '' }}">

                     <a href="#">                     
                     <i class=""></i><span>Category</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>

                     <ul class="treeview-menu">
                      @php
                        $view_category_permission = MyHelper::getPermission('view_category');
                        if ( ! empty($view_category_permission)) {
                      @endphp 
                        <li><a href="{{ route('categories.index') }}">View Categories</a></li>
                      @php
                       }
                      @endphp

                      @php
                        $add_category_permission = MyHelper::getPermission('add_category');
                        if ( ! empty($add_category_permission)) {
                      @endphp 
                        <li><a class="" href="{{ route('categories.create') }}">Add Category</a></li>
                      @php
                       }
                      @endphp 

                     </ul>
                  </li>

                   --}}

                  <li class="treeview {{ isset($loan_categories_active) ? $loan_categories_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Loan Category</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                     <ul class="treeview-menu">

                      @php
                        $view_loan_category = MyHelper::getPermission('view_loan_category');
                        if ( ! empty($view_loan_category)) {
                      @endphp 
                       <li><a href="{{ route('loancategories.index') }}">View Categories</a></li>
                      @php
                       }
                      @endphp

                      @php
                        $add_loan_category = MyHelper::getPermission('add_loan_category');
                        if ( ! empty($add_loan_category)) {
                      @endphp 
                       <li><a class="" href="{{ route('loancategories.create') }}">Add Category</a>a></li>
                      @php
                       }
                      @endphp

                     </ul>
                  </li>


                  <li class="treeview {{ isset($roles_active) ? $roles_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Role</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                     <ul class="treeview-menu">

                        @php
                          $view_roles = MyHelper::getPermission('view_roles');
                          if ( ! empty($view_roles)) {
                        @endphp 
                         <li><a href="{{ route('roles.index') }}">View Roles</a></li>
                        @php
                         }
                        @endphp

                        @php
                          $add_roles = MyHelper::getPermission('add_roles');
                          if ( ! empty($add_roles)) {
                        @endphp 
                         <li><a class="" href="{{ route('roles.create') }}">Add Role</a></li>
                        @php
                         }
                        @endphp

                     </ul>
                  </li>

                  <li class="treeview {{ isset($users_active) ? $users_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Users</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                     <ul class="treeview-menu">

                        @php
                          $view_users = MyHelper::getPermission('view_users');
                          if ( ! empty($view_users)) {
                        @endphp 
                         <li><a href="{{ route('users.index') }}">View Users</a></li>
                        @php
                         }
                        @endphp

                        @php
                          $add_users = MyHelper::getPermission('add_users');
                          if ( ! empty($add_users)) {
                        @endphp 
                         <li><a class="" href="{{ route('users.create') }}">Add User</a></li>
                        @php
                         }
                        @endphp

                     </ul>
                  </li>

                  <li class="">
                     <a class="{{ isset($loan_request_active) ? 'activelink' : '' }}" href="{{ route('loan_request') }}"><span>Loan Requests</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($borrower_active) ? 'activelink' : '' }}" href="{{ route('borrower_list') }}"><span>Borrowers</span></a>
                  </li>

                  <li class="">
                     <a class="{{ isset($lender_active) ? 'activelink' : '' }}" href="{{ route('lender_list') }}"><span>lenders</span></a>
                  </li>			  

                  <li class="">
                     <a class="{{ isset($settings_active) ? 'activelink' : '' }}" href="{{ route('setting') }}"><span>Settings</span></a>
                  </li>

                
                  <li class="treeview {{ isset($loan_categories_active) ? $loan_categories_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Upload Documents</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                     <ul class="treeview-menu">

                       <li><a href="{{ route('documents.index') }}">View Documents</a></li>
                    
                       <li><a class="" href="{{ route('documents.create') }}">Add Document Label</a>a></li>

                     </ul>
                  </li>
				  
				  
				   <li class="treeview {{ isset($loan_categories_active) ? $loan_categories_active : '' }}">
                     <a href="#">
                     <i class=""></i><span>Lender Interest</span>
                       <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                     </a>
                     <ul class="treeview-menu">

                       <li><a href="{{ route('interest.index') }}">View Lender Interest</a></li>
                    
                       <li><a class="" href="{{ route('interest.create') }}">Add Lender Interest</a>a></li>

                     </ul>
                  </li>
				  
				  


                  <li class="">
                     <a href="{{ route('adminlogout') }}">Logout</a>
                  </li>

               </ul>
            </section>