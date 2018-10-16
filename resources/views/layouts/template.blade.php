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
                        <div class="heading-sec text-center">
                                <h2 class="text-center"> TOP SELLERS</h2>
                                <h4 class="subheading">Wallpaper</h4>
                        </div>
                               
                        </div>
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
        <div class="heading-sec text-center">
                                <h2 class="text-center"> TOP SELLERS</h2>
                                <h4 class="subheading">Posters</h4>
                        </div>
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
          
            <div class="heading-sec text-center">
                                <h2 class="text-center">Best Selling</h2>
                                <h4 class="subheading">Products</h4>
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
                                <div class="box-inner">
                                <a href="{{ route('product.detail', $selling_products->slug) }}">
                                    <img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" alt=""/>
                                </a>
                                    <div class="img-price">
                                        <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;{{ $selling_products->price }}/roll</span>
                                        <span class="righttxt"><i class="fa fa-share-alt"></i><i class="fa fa-star"></i></span>
                                    </div>
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
            <div class="heading-sec text-center">
                                <h2 class="text-center">Tips & Tricks for Interior </h2>
                                <h4 class="subheading">Decor</h4>
            </div>
        </div>
        <div class="tips-img-sec">
            <div class="col-sm-6 text-right tips-img1">
                <img src="{{ asset('build/assets/images/tips-tree.jpg') }}" alt=""/>
                <div class="tips-cont-1 text-left">
                    <h4>30 travel decor ideas for the wanderlust in you</h4>
                    <p>This is a list of the number of ways people can bring their fondness for travel,
                    memories and memorabilia into their living and office spaces.</p>
                </div>
            </div>
            <div class="col-sm-6 text-left tips-img2">
                <img src="{{ asset('build/assets/images/Tips-flower.jpg') }}" alt=""/>
                <div class="tips-cont text-left">
                    <h4>Top 20 Home Decor Ideas using seamless pattern & texture</h4>
                    <p>Patterns and repetitions have a calming effect on the mind and soothe our aura.
                    Here are 20 ways they can be part of home decor.</p>
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