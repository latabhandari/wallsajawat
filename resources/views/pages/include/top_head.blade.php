        <div class="container-fluid top-bar">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-sm-6 lft-top"><h6>FLAT 40% OFF ON ALL PRODUCT CATEGORY</h6></div>
                    <div class="col-sm-6 text-right rgt-main">
                        <div class="rgt-top">
                            @guest
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> / <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @else   
                                 <a class="dropdown-item nav-link" href="#">{{ __('Profile') }}</a> /
                                 <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                 </form>
                            @endguest
                            <i class="fa fa-phone"></i>&nbsp;+91 0123456789
                            <i class="fa fa-envelope"></i>&nbsp;<a class="nav-link-help" href="mailto:info@wallsajawat.com">info@wallsajawat.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->


        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 lft-top">
                <h6>FLAT 40% OFF ON ALL PRODUCT CATEGORY</h6>
              </div>
              <div class="col-sm-6 text-right rgt-main">
                <div class="rgt-top">  <i class="fa fa-phone"></i>&nbsp;+91 0123456789 <i class="fa fa-envelope"></i>&nbsp;example@ecample.com </div>
              </div>
            </div>
          </div>
        </div>
