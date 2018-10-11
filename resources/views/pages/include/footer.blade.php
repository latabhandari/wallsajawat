                <footer>
                    <div class="container">
                        <div class="row footer-sec">
                            <div class="col-sm-4 foot-sec1">
                                <p>Discover the widest range <br>
                                of unique wallpapers, also customize<br>
                                your own designs and buy them online. <br>
                                Get free home delivery anywhere in India.<br>
                                </p>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4>INFORMATION</h4>
                                        <ul class="info-list">
                                            <a href="{{ route('about') }}"><li>About Us</li></a>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                            <li><a href="{{ route('faq') }}">Faq</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>FOLLOW US ON</h4>
                                        <ul class="nav navbar-nav follow-list">
                                            <li><i class="fa fa-facebook-f"></i></li>
                                            <li><i class="fa fa-twitter"></i></li>
                                            <li><i class="fa fa-instagram"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>WE ACCEPT</h4>
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
