            <div class="container">
                <div class="row btn-bar">
                    <div class="col-sm-2 logo"><a href="{{ route('home.index') }}"><img src="{{ asset('build/assets/images/logo.jpg') }}" alt="Interior Xpression"/></a>
                    </div>

                    <div class="col-sm-7 main_menu">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mynavbar">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{ route('range') }}">OUR RANGE</a></li>
                                        <li><a href="{{ route('about') }}">ABOUT US</a></li>
                                        <li><a href="{{ route('wallpaper_installer') }}">WALLPAPER INSTALLER</a></li>
                                        <li><a href="{{ route('how_to_measure') }}">HOW TO MEASURE</a></li>
                                        <li><a href="{{ route('offers') }}">OFFERS</a></li>
                                        <li><a href="{{ route('contact') }}">CONTACT US</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-sm-3 menu_icons">
                        <ul class="nav menu-icons pull-right">
                            <li><input type="text" placeholder="Search..." class="search" /></li>
                            <li><a class="cartIcon" href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i><span>{{ Cart::count() }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
