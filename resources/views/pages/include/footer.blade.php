                <footer>
                    <div class="container">
                        <div class="row footer-sec">
                            <div class="col-sm-4 foot-sec1">
                                <div class="white-logo"><h3><a href="{{ route('home.index') }}">Logo</a></h3></div>
                                <p>Discover the widest range <br>
                                of unique wallpapers, also customize<br>
                                your own designs and buy them online. <br>
                                Get free home delivery anywhere in India.<br>
                                </p>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>INFORMATION</h3>
                                        <ul class="info-list">
                                            <a href="{{ route('about') }}"><li>About Us</li></a>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                            <li><a href="{{ route('faq') }}">Faq</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h3>FOLLOW US ON</h3>
                                        <ul class="nav navbar-nav follow-list">
                                            <li><a href="https://www.facebook.com/Wall-Sajawat-1102408909952441/" target="_blank" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                                            <li><a href="https://twitter.com/WSajawat" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://www.instagram.com/wallsajawat/?hl=en" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h3>WE ACCEPT</h3>
                                        <ul class="nav navbar-nav follow-list2">
                                            <li><img src="{{ asset('build/assets/images/master.png') }}" alt="mastercard"/></li>
                                            <li><img src="{{ asset('build/assets/images/Visa.png') }}" alt="visa"/></li>
                                            <li><img src="{{ asset('build/assets/images/Rupay.png') }}"" alt="rupay"/></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 text-center footer-btm">
                                <h5>Copyright &copy; {{ date("Y") }} wallpapers, All Rights Reserved.</h5>
                            </div>
                        </div>
                    </div>
                </footer>
