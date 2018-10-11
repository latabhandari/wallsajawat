<!DOCTYPE html>
<head>
<title>WallSajawat</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,intial-scale=1.0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width,initial-scale=1.0" name="viewport">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>

<style type="text/css" media="screen">
input[type=search] {
    -webkit-appearance: textfield;
    -webkit-box-sizing: content-box;
    font-family: inherit;
    font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
    display: none; 
}


input[type=search] {
    background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
    border: solid 1px #ccc;
    padding: 9px 10px 9px 32px;
    width: 55px;
    
    -webkit-border-radius: 10em;
    -moz-border-radius: 10em;
    border-radius: 10em;
    
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    transition: all .5s;
}
input[type=search]:focus {
    width: 130px;
    background-color: #fff;
    border-color: #66CC75;
    
    -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
    -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
    box-shadow: 0 0 5px rgba(109,207,246,.5);
}


input:-moz-placeholder {
    color: #999;
}
input::-webkit-input-placeholder {
    color: #999;
}
    
</style>
</head>
<body>

    @include('pages.include.top_head')

    @include('pages.include.header')

    <div class="contanier banner-img">
      <div class="row">
        <div class="col-sm-12 main-img"> </div>
      </div>
    </div>

    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="heading-sec">
                            <div class="col-sm-5 text-right side-bars"><img src="{{ asset('build/assets/images/bar.jpg') }}"> </div>
                            
                            <div class="col-sm-2 text-center center-content">
                                <h4 class="text-center"> TOP SELLERS</h4>
                            </div>
                            
                            <div class="col-sm-5 side-bars"> <img src="{{ asset('build/assets/images/bar.jpg') }}"></div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h6 class="text-center">WALLPAPER</h6>
                </div>
                <div class="col-sm-12">

                    @php
                       $i = 1;
                    @endphp      
                    @foreach ($wallpaper_images as $wall_image)  
                     <div class="sub-img{{ $i++ }}" style="background-image: url({{ asset('catalog/category/'.$wall_image->wallpaper_image) }})">
                        <a href="{{ route('category.product', $wall_image->slug) }}"><h5>{{ $wall_image->name }}</h5></a>
                    </div>
                    @endforeach

                    <div class="sub-img6" style="background-image: url({{ asset('build/assets/images/All-elements.png') }});min-height: 300px;width:318px;margin-left: 3px">
                        <a href="">
                            <h5>All</h5>
                            <h4>Top Sellers</h4>
                        </a>
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
    </div>
    <div class="selling-sec">
        <div class="container">
            <div class="row heading-sec">
                <div class="col-sm-5 text-right side-bars"><img src="{{ asset('build/assets/images/bar.jpg') }}"/> </div>
                <div class="col-sm-2 text-center center-content"><h4> BEST SELLING</h4></div>
                <div class="col-sm-5 side-bars"> <img src="{{ asset('build/assets/images/bar.jpg') }}"/></div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center sub-head"><h6>PRODUCTS</h6></div>
            </div>
        </div>
        <div class="container selling-img-sec">
                @php
                    $i = 0;
                @endphp            
                @foreach ($best_selling_products as $selling_products)
                     @php
                        if ($i == 0)
                        echo '<div class="row">';
                        $prod_image_info = App\Helpers\MyHelper::getProductImage($selling_products->id);
                     @endphp
                        
                            <div class="col-sm-4 text-center selling-imgs">
                                <a href="{{ route('product.detail', $selling_products->slug) }}">
                                    <img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" alt=""/>
                                </a>
                                    <div class="img-price">
                                        <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;{{ $selling_products->price }}/roll</span>
                                        <span class="righttxt"><i class="fa fa-share-alt"></i><i class="fa fa-star"></i></span>
                                    </div>
                            </div>
                            @php
                               $i++;
                               if ($i % 3 == 0)
                                   {
                                      echo '</div>';
                                      $i = 0;
                                   }
                            @endphp
                @endforeach
                @php
                    if ($i != 0)
                    echo '</div>';
                @endphp

            </div>
        </div>
    </div>

    
    <div class="tips-sec">
        <div class="container">
            <div class="row heading-sec tips-head">
                <div class="col-sm-4 text-right side-bars-tips"><img src="{{ asset('build/assets/images/bar.jpg') }}"/> </div>
                <div class="col-sm-4 text-center center-content-tips"><h3> Tips & Tricks for Interior Decor</h3></div>
                <div class="col-sm-4 side-bars-right"> <img src="{{ asset('build/assets/images/bar.jpg') }}"/></div>
            </div>
        </div>
        <div class="tips-img-sec">
            <div class="col-sm-6 text-right tips-img1">
                <img src="{{ asset('build/assets/images/tips-tree.jpg') }}" alt=""/>
                <div class="tips-cont-1 text-left">
                    <h4>30 travel decor ideas for the wanderlust in you</h4>
                    <h5>This is a list of the number of ways people can bring their fondness for travel,
                    memories and memorabilia into their living and office spaces.</h5>
                </div>
            </div>
            <div class="col-sm-6 text-left tips-img2">
                <img src="{{ asset('build/assets/images/Tips-flower.jpg') }}" alt=""/>
                <div class="tips-cont text-left">
                    <h4>Top 20 Home Decor Ideas using seamless pattern & texture</h4>
                    <h5>Patterns and repetitions have a calming effect on the mind and soothe our aura.
                    Here are 20 ways they can be part of home decor.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="privilege-sec">
        <div class="container-fluid priv-img">
               <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 priv-txt">
                        <h1>Become our privilege partner</h1>
                    </div>
                        <div class="col-sm-3 hands-sec">
                            <img src="{{ asset('build/assets/images/hands.png') }}" alt="" />
                        </div>
                </div>
        </div>
    </div>

    @include('pages.include.footer')
        
    
    <script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/js/jquery.bxslider.min.js') }}" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
             $('.bxslider').bxSlider({
                                            minSlides: 1,
                                            maxSlides: 3,
                                            slideWidth: 400,
                                            slideMargin: 30,
                                            pager: true,
                                            auto: true,
                                            infiniteLoop: true
                                    });
       });
    </script>
   </body>
</html>