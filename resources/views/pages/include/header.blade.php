        <header>
            <div class="center-container">
                <div class="logo"><a href="{{ route('home.index') }}"><img src="{{ asset('build/assets/images/logo.jpg') }}" alt="Interior Xpression"/></a></div>
                <div class="main-menu">
                    <ul>
                        <a href="{{ route('range') }}">
                            <li>
                                <h4>OUR RANGE</h4>
                            </li>
                        </a>
                        <a href="{{ route('about') }}">
                            <li>
                                <h4>ABOUT US</h4>
                            </li>
                        </a>
                        <a href="{{ route('wallpaper_installer') }}">
                            <li>
                                <h4>WALLPAPER INSTALLER</h4>
                            </li>
                        </a>
                        <a href="{{ route('how_to_measure') }}">
                            <li>
                                <h4>HOW TO MEASURE</h4>
                            </li>
                        </a>
                        <a href="{{ route('offers') }}">
                            <li>
                                <h4>OFFERS</h4>
                            </li>
                        </a>
                        <a href="{{ route('contact') }}">
                            <li>
                                <h4>CONTACT US</h4>
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="main-menu2">
                    <ul>
                        <a href="#">
                            <li>
                                <h4>OUR RANGE</h4>
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <h4>ABOUT US</h4>
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <h4>WALLPAPER INSTALLER</h4>
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <h4>HOW TO MEASURE</h4>
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <h4>OFFERS</h4>
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <h4>CONTACT US</h4>
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="menu-icons">
                    <ul>
                        <li><i class="fas fa-heart"></i></li>
                        <li><i class="fa fa-search"></i></li>
                        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i>{{ Cart::count() }}</a></li>
                    </ul>
                </div>
            </header>