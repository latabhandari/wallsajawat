<?php
$segment = Request::segment(2);
switch ($segment)
   {
          case 'our-range':
                                          $our_range_active              =  'active';
                                          break;

          case 'about':
                                          $about_active                  =   'active';
                                          break;
          case  'wallpaper-installer':
                                          $wallpaper_installer_active    =  'active';
                                          break;

          case  'how-to-measure':
                                          $how_measure_active            =  'active';
                                          break;

          case  'offers':
                                          $offers_active                 =  'active';
                                          break;

          case 'contact':
                                          $contact_active                 =   'active';
                                          break;
   }
?>

            <div class="header">
              <div class="container">
                <div class="row btn-bar">
                  <div class="col-md-2 logo"><h3><a href="{{ route('home.index') }}">Logo</a></h3></div>
                  <div class="col-md-8  main_menu">
                    <nav class="navbar navbar-default">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <div class="collapse navbar-collapse" id="mynavbar">
                          <ul class="nav navbar-nav">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle user-option" data-toggle="dropdown" >OUR RANGE <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @php
                                        $category_list = App\Helpers\MyHelper::getCategories();
                                    @endphp
                                    @if(count($category_list))
                                       @foreach ($category_list as $category)
                                        <li><a href="{{ route('category.product', $category->slug) }}">{{ $category->name }}</a></li>
                                       @endforeach
                                       <li><a href="{{ route('categories') }}">{{ __('See More') }}</a></li>
                                    @endif
                                </ul>
                            </li>

                            <li class="{{ isset($about_active) ? 'active' : '' }}"><a href="{{ route('about') }}">ABOUT US</a></li>
                            <li class="{{ isset($wallpaper_installer_active) ? 'active' : '' }}"><a href="{{ route('wallpaper_installer') }}">WALLPAPER INSTALLER</a></li>
                            <li class="{{ isset($how_measure_active) ? 'active' : '' }}"><a href="{{ route('how_to_measure') }}">HOW TO MEASURE</a></li>
                            <li class="{{ isset($offers_active) ? 'active' : '' }}"><a href="{{ route('offers') }}">OFFERS</a></li>

                          </ul>
                        </div>
                      </div>
                    </nav>
                  </div>
                  <div class="col-md-2 col-sm-12 menu_icons">
                    <ul class="nav menu-icons pull-right">
                      <li class="mrgntpnone"><input class="searchtxt" type="text" name="search" id="search" placeholder="search..." autocomplete="off" /></li>
                      <li><a class="crt" href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i><span>{{ Cart::count() }}</span></a></li>
                          @guest
                            <span class="cart_user" style="display:none">Cart={{ Cart::count() }},User=0</span>
                          @else  
                            <span class="cart_user" style="display:none">Cart={{ Cart::count() }},User=1</span>
                            <li>
                              <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle user-option" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="caret"></span></button>
                              <ul class="dropdown-menu sub-dropdown">
                                 <li><a class="" href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
                                 <li><a class="" href="{{ route('orders') }}">{{ __('My Orders') }}</a></li>
                                 <li><a class="" href="{{ route('profile.wishlist') }}">{{ __('My Wishlist') }}</a></li>
                                 <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                 </form>
                                 </li>
                               </ul>
                             </div>
                            </li>
                           @endguest
                    </ul>
                  </div>
                </div>
              </div>
            </div>
           

