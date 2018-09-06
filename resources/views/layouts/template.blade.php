<!DOCTYPE>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Interior Xpression</title>
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('build/assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{ asset('build/assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
</head>
<body>
    <div class="container">

        @include('pages.include.top_head')
        

        <header>
            <div class="center-container">
                <div class="logo"><img src="{{ asset('images/logo.jpg') }}Images/" alt="Interior Xpression"/></div>
                <div class="main-menu">
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
                        <li><i class="fa fa-shopping-cart"></i></li>
                        <li><i class="fa fa-user"></i></li>
                    </ul>
                </div>
            </header>
            <div class="home-banner"> </div>
            <div class="seller-sec">
                <div class="seller-top">
                    <h3>TOP SELLERS</h3>
                    <h4>WALLPAPER</h4>
                </div>
                <div class="seller-imgs">
                    <div class="image1">
                        <h4>TREE</h4>
                    </div>
                    <div class="image2">
                        <div class="sub-img1">
                            <h4>FLORAL</h4>
                        </div>
                        <div class="sub-img2">
                            <h4>TEXTURE</h4>
                        </div>
                        <!--<ul><li><img src="Images/Tree1.jpg" width="638"></li>
                        <li><img src="Images/Floral.jpg" width="330"></li>
                        <li><img src="Images/Texture.jpg" width="330"></li></ul>-->
                    </div>
                    <div class="image3">
                        <div class="image3-part1">
                            <h4>INTERIOR</h4>
                        </div>
                        <div class="image3-part2">
                            <h4>ELEMENTS</h4>
                        </div>
                        <div class="image3-part3">
                            <h4>ALL</h4>
                            <h3>TOP SELLERS</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-sec">
                <div class="slider-head"> <h3>TOP SELLERS</h3><h4>POSTERS</h4></div>
                <div class="center-container">
                    <ul class="bxslider">
                        <!-- <a class="prev" id="prev" onClick="plusSlides(-1)" width="15">&#10094;</a>-->
                        <li>
                            <div class="img-block">
                                <img src="Images/Sliderimg1.png">
                                <div class="trending-content">
                                    <h4>QUOTES</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="img-block">
                                <img src="Images/Sliderimg2.png">
                                <div class="trending-content">
                                    <h4>ILLUTRATION ART</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="img-block">
                                <img src="Images/Sliderimg3.png">
                                <div class="trending-content">
                                    <h4>NATURE AND LANDSCAPE</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="img-block">
                                <img src="Images/Sliderimg3.png">
                                <div class="trending-content">
                                    <h4>NATURE AND LANDSCAPE</h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!--  <a class="next" onClick="plusSlides(1)">&#10095;</a> </div>-->
                </div>
            </div></div>
            <div class="product-sec">
                <div class="product-head">
                    <h3>BEST SELLING</h3>
                    <h4>PRODUCTS</h4>
                </div>
                <div class="main-product">
                    <ul>
                        <li>
                            <img src="Images/Product1.jpg" alt="Design1"/>
                            <div class="product-btm">
                                <div class="product-price"><i class="fas fa-rupee-sign"></i><span>10,249/roll</span></div>
                                <div class="product-icons"><i class="fas fa-share-alt"></i><i class="fas fa-star"></i></div>
                            </div>
                        </li>
                        <li>
                            <img src="Images/Product3.jpg" alt="Design1"/>
                            <div class="product-btm">
                                <div class="product-price"><i class="fas fa-rupee-sign"></i><span>10,249/roll</span></div>
                                <div class="product-icons"><i class="fas fa-share-alt"></i><i class="fas fa-star"></i></div>
                            </div>
                        </li>
                        <li>
                            <img src="Images/Product2.jpg" alt="Design1"/>
                            <div class="product-btm">
                                <div class="product-price"><i class="fas fa-rupee-sign"></i><span>10,249/roll</span></div>
                                <div class="product-icons"><i class="fas fa-share-alt"></i><i class="fas fa-star"></i></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="artist-sec">
                <div class="center-container">
                    <div class="artist-imgs">
                        <div class="artist-part1">
                            <h3>ARTIST CORNER</h3>
                            <h4> Show the world your artworks.</h4>
                            <h4> Build collections and increase sales!</h4>
                            <span><a href="#">Read More</a></span>
                        </div>
                        <div class="artist-part2">
                            <h3>VAASTU FRIENDLY SPACES</h3>
                            <h4> Make your home and office spaces </h4>
                            <h4> more blissful and positive.</h4>
                            <span><a href="#">Read More</a></span>
                        </div>
                        <div class="artist-part3">
                            <h3>MEMORY WALL</h3>
                            <h4> Make a wall for all the special moments </h4>
                            <h4> you have had with your loved ones.</h4>
                            <span><a href="#">Read More</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tips-sec">
                <div class="center-container">
                    <div class="tips-head">
                        <h3> TIPS & TRICKS FOR INTERIOR DECOR</h3>
                    </div>
                    <div class="tips-body">
                        <ul>
                            <li>
                                <img src="Images/tips-tree.jpg" alt="tips-tree"/>
                                <h3>30 travel decor ideas for the wanderlust in you</h3>
                                <h4>This is a list of the number of ways people can bring their fondness for travel,
                                memories and memorabilia into their living and office spaces.
                                </h4>
                            </li>
                            <li>
                                <img src="Images/Tips-flower.jpg" alt="tips-tree"/>
                                <h3>Top 20 Home Decor Ideas using seamless pattern & texture</h3>
                                <h4>Patterns and repetitions have a calming effect on the mind and soothe our aura.
                                Here are 20 ways they can be part of home decor.
                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="privilege-sec">
                <div class="privilege-body">
                    <h1>Become our <span>privilege partner<span></h1>
                        <img src="Images/hands.png" alt="privilege partner"/>
                    </div>
                </div>
                <div class="footer-sec">
                    <div class="foot1">
                        <h4>Discover the widest range
                        of unique wallpapers, also customize
                        your own designs and buy them online.
                        Get free home delivery anywhere in India.
                        </h4>
                    </div>
                    <div class="foot2">
                        <ul>
                            <li class="information-sec">
                                <h3>INFORMATION</h3>
                                <ul>
                                    <li>
                                        <h4><a href="#">About Us</a></h4>
                                    </li>
                                    <li>
                                        <h4><a href="#">Contact Us</a></h4>
                                    </li>
                                    <li>
                                        <h4><a href="#">Terms of Use</a></h4>
                                    </li>
                                    <li>
                                        <h4><a href="#">Return/Refund Policies</a></h4>
                                    </li>
                                </ul>
                            </li>
                            <li class="follow-us">
                                <h3> FOLLOW UP ON</h3>
                                <ul>
                                    <li> <i class="fab fa-facebook-f"></i></li>
                                    <li> <i class="fab fa-twitter"></i></li>
                                    <li> <i class="fab fa-instagram"></i></li>
                                </ul>
                            </li>
                            <li class="accept">
                                <h3> WE ACCEPT</h3>
                                <ul>
                                    <li> <img src="Images/master.png" alt="mastercard"/></li>
                                    <li> <img src="Images/Visa.png" alt="visa"/></li>
                                    <li><img src="Images/Rupay.png" alt="rupay"/></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="btm-sec">
                        <h4>Copyright &copy; 2018 wallpapers, All Rights Reserved.</h4>
                    </div>
                </div>
            </div>
            <script src="{{ asset('build/assets/js/jquery.bxslider.min.js') }}" type="text/javascript"></script>
            <script>
            $(document).ready(function(){
            $('.bxslider').bxSlider({
            minSlides: 1,
            maxSlides: 3,
            slideWidth: 400,
            slideMargin: 30,
            pager: true,
            auto: true,
            controls:true,
            infiniteLoop: true
            
            
            });
            });
            </script>
        </body>
    </html>