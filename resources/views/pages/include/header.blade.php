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
                  <div class="col-sm-2 logo"><a href="{{ route('home.index') }}"><h2>Logo</h2></a></div>
                  <div class="col-sm-8 main_menu">
                    <nav class="navbar navbar-default">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <div class="collapse navbar-collapse" id="mynavbar">
                          <ul class="nav navbar-nav">
                            <li class="{{ isset($our_range_active) ? 'active' : '' }}"><a href="{{ route('range') }}">OUR RANGE</a></li>
                            <li class="{{ isset($about_active) ? 'active' : '' }}"><a href="{{ route('about') }}">ABOUT US</a></li>
                            <li class="{{ isset($wallpaper_installer_active) ? 'active' : '' }}"><a href="{{ route('wallpaper_installer') }}">WALLPAPER INSTALLER</a></li>
                            <li class="{{ isset($how_measure_active) ? 'active' : '' }}"><a href="{{ route('how_to_measure') }}">HOW TO MEASURE</a></li>
                            <li class="{{ isset($offers_active) ? 'active' : '' }}"><a href="{{ route('offers') }}">OFFERS</a></li>
                            <li class="{{ isset($contact_active) ? 'active' : '' }}"><a href="{{ route('contact') }}">CONTACT US</a></li>

                          </ul>
                        </div>
                      </div>
                    </nav>
                  </div>
                  <div class="col-sm-2 menu_icons">
                    <ul class="nav menu-icons pull-right">
                      <li><i class="fa fa-search"></i></li>
                      <li>
                                      @guest
                                           <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                      @else
                                      <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle user-option" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu sub-dropdown">
                                            <li><a href="#">My Wishlist</a></li>
                                            <li><a href="#">My Orders</a></li>
                                            <li><a href="{{ route('cart') }}">My Cart</a></li>
                                        </ul>
                                       </div>
                                      @endguest
                            </li>
                      <li>
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle user-option" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="caret"></span></button>
                          <ul class="dropdown-menu sub-dropdown">

                            @guest
                                 <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                 <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                <li><a href="#">Retailer login</a></li>
                            @else   
                                 <li><a class="" href="#">{{ __('Profile') }}</a></li>
                                 <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                 </form>
                                 </li>
                            @endguest

                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

