            <div class="container">
                <div class="row btn-bar">
                    <div class="col-sm-2 logo"><a href="{{ route('home.index') }}"><img src="{{ asset('build/assets/images/logo.jpg') }}" alt="Interior Xpression"/></a>
                    </div>

                    <div class="col-sm-8 main_menu">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mynavbar">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{ route('range') }}">OUR RANGE</li>
                                        <li><a href="{{ route('about') }}">ABOUT US</li>
                                        <li><a href="{{ route('wallpaper_installer') }}">WALLPAPER INSTALLER</li>
                                        <li><a href="{{ route('how_to_measure') }}">HOW TO MEASURE</li>
                                        <li><a href="{{ route('offers') }}">OFFERS</li>
                                        <li><a href="{{ route('contact') }}">CONTACT US</li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-sm-2 menu_icons">
                        <ul class="nav menu-icons pull-right">
                            <li><i class="fa fa-heart"></i></li>
                            <li><i class="fa fa-search"></i></li>
                            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i>{{ Cart::count() }}</a></li>
                            <li><div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle user-option" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-user"></i>
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu sub-dropdown">
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Logout</a></li></ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
