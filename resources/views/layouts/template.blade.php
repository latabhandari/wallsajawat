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
    <script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
</head>
<body>
    <div class="container">

        @include('pages.include.top_head')

          @include('pages.include.header')

            <div class="home-banner"> </div>
            
            @include('pages.include.home_wallpaper')

            <div class="slider-sec">
                <div class="slider-head"> <h3>TOP SELLERS</h3><h4>POSTERS</h4></div>
                <div class="center-container">
                    <ul class="bxslider">
                        <!-- <a class="prev" id="prev" onClick="plusSlides(-1)" width="15">&#10094;</a>-->
                        <li>
                            <div class="img-block">
                                <img src="{{ asset('build/assets/images/Sliderimg1.png') }}">
                                <div class="trending-content">
                                    <h4>QUOTES</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="img-block">
                                <img src="{{ asset('build/assets/images/Sliderimg2.png') }}">
                                <div class="trending-content">
                                    <h4>ILLUTRATION ART</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="img-block">
                                <img src="{{ asset('build/assets/images/Sliderimg3.png') }}">
                                <div class="trending-content">
                                    <h4>NATURE AND LANDSCAPE</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="img-block">
                                <img src="{{ asset('build/assets/images/Sliderimg3.png') }}">
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
                        @foreach ($best_selling_products as $selling_products)
                        <li>
                            <a href="{{ route('product.detail', $selling_products->slug) }}"><img src="{{ asset('build/assets/catalog/product/Product1.jpg') }}" alt="" /></a>
                             <div class="product-btm">
                                <a href="{{ route('product.detail', $selling_products->slug) }}">
                                     <div class="product-price"><i class="fas fa-rupee-sign"></i><span>{{ $selling_products->price }} / roll</span></div>
                                </a>
                                <div class="product-icons"><i class="fas fa-share-alt"></i><i class="fas fa-star"></i></div>
                             </div>
                        </li>
                        @endforeach
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
                                <img src="{{ asset('build/assets/images/tips-tree.jpg') }}" alt="tips-tree"/>
                                <h3>30 travel decor ideas for the wanderlust in you</h3>
                                <h4>This is a list of the number of ways people can bring their fondness for travel,
                                memories and memorabilia into their living and office spaces.
                                </h4>
                            </li>
                            <li>
                                <img src="{{ asset('build/assets/images/Tips-flower.jpg') }}" alt="tips-tree"/>
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
                        <img src="{{ asset('build/assets/images/hands.png') }}" alt="privilege partner"/>
                    </div>
            </div>

            @include('pages.include.footer')

            </div>
            <script src="{{ asset('build/assets/js/jquery.bxslider.min.js') }}" type="text/javascript"></script>
            <script>
             $(document).ready(function() {
                $('.bxslider').bxSlider({minSlides:1,maxSlides:3,slideWidth:400,slideMargin:30,pager:true,auto:true,controls:true,infiniteLoop: true});
             });
            </script>
        </body>
    </html>