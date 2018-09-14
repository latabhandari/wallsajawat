        <div class="top-head">
            <div class="center-container">
                <div class="left-th">
                    <h5>FLAT 40% OFF ON ALL PRODUCT CATEGORY</h5>
                </div>
                <div class="right-th">
                    <ul>
                        <li>
                            <img src="Images/location.png" alt="" height="15" width="15"/>
                            <!--<h5>Login/Register</h5> -->
                            <h5>
                                @guest
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> / <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @else   
                                     <a class="dropdown-item nav-link" href="#">{{ __('Profile') }}</a> /
                                     <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                        @csrf
                                     </form>
                                @endguest
                            </h5>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <h5>+91 0123456789</h5>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <h5><a class="nav-link-help" href="mailto:info@wallsajawat.com">info@wallsajawat.com</a></h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
