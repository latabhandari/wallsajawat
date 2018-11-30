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
<script type="text/javascript" src="{{ asset('build/assets/js/jquery.validate.min.js') }}"></script>

<style>
    .error{font-weight:normal}

</style>
</head>
<body>

    @include('pages.include.top_head')

    @include('pages.include.header')

    <div class="slider">
        <div class="slide_viewer">
          <div class="slide_group">
            <div class="slide">
      	           <img src="{{ asset('build/assets/images/1.jpg') }}" alt="">
            </div>
            <div class="slide">
      	           <img src="{{ asset('build/assets/images/1.jpg') }}" alt="">
            </div>
            <div class="slide">
      	           <img src="{{ asset('build/assets/images/1.jpg') }}" alt="">
            </div>
            <div class="slide">
                	 <img src="{{ asset('build/assets/images/1.jpg') }}" alt="">
            </div>
          </div>
        </div>
    </div><!-- End // .slider -->

<div class="slide_buttons"></div>

<div class="directional_nav">
  <div class="previous_btn" title="Previous">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="-11 -11.5 65 66">
      <g>
        <g>
          <path fill="#fff" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
			c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
          <path fill="#fff" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
        </g>
      </g>
    </svg>
  </div>
  <div class="next_btn" title="Next">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="-11 -11.5 65 66">
      <g>
        <g>
          <path fill="#fff" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
          <path fill="#fff" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
        </g>
      </g>
    </svg>
  </div>
</div><!-- End // .directional_nav -->

<div class="container-fluid secn-2">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="heading-sec text-center">
                        <h2 class="text-center"> TOP SELLERS</h2>
                        <h4 class="subheading">Category</h4>
                </div>
            </div>
        </div>
     
        <div class="col-sm-12">

            @php
               $i = 1;
            @endphp      
            @foreach ($wallpaper_images as $wall_image)  
             <div class="work-overlay sub-img{{ $i++ }}" style="background-image: url({{ asset('catalog/category/'.$wall_image->wallpaper_image) }})">
                <a href="{{ route('category.product', $wall_image->slug) }}"><h5>{{ $wall_image->name }}</h5></a>
            </div>
            @endforeach

            <div class="sub-img6" style="background-image: url({{ asset('build/assets/images/All-elements.png') }});min-height: 300px;width:318px;margin-left: 3px">
                <a href="{{ route('categories') }}">
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
              <h4 class="subheading">Wallpaper</h4>
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
                   $wishlist_pid          =  array();
                   $wishlist_products_id  =  App\Helpers\MyHelper::getWishlistProductsId();
                   if (isset($wishlist_products_id->pid))
                   $wishlist_pid          =  array_filter(explode(',', $wishlist_products_id->pid));

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
                            @php
                                $url = route('product.detail', $selling_products->slug)
                            @endphp

                                <a href="{{ $url }}">
                                    <img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" alt="" />
                                </a>

                                <div class="social_containter" id="share_container_{{ $selling_products->id }}">
            
                                    <div class="social facebook"><a target="_blank" href="https://www.facebook.com/sharer.php?u={{ $url }}"><i class="fa fa-facebook"></i></a></div>
                                    <div class="social twitter"><a target="_blank" href="http://twitter.com/share?url={{ $url }}&text={{ $selling_products->name }}"><i class="fa fa-twitter"></i></a></div>
                                    <div class=" social google"><a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url={{ $url }}"><i class="fa fa-google-plus"></i></a></div>

                                  </div>

                                    <div class="img-price">
                                        <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;{{ $selling_products->price }}/roll</span>
                                        <span class="righttxt">
                                          <a href="javascript:void(0)" class="share" data-attr="{{ $selling_products->id }}"><i class="fa fa-share-alt"></i></a>

                                          @if(in_array($selling_products->id, $wishlist_pid))
                                              <i class="fa fa-star wshlst" title="Already added in your wishlist"></i>
                                          @else
                                              <a href="javascript:void(0)" class="addwishlist" data-attr="{{ $selling_products->id }}"><i class="fa fa-star"></i></a>
                                          @endif

                                        </span>
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
<script>
$('.slider').each(function() {
  var $this = $(this);
  var $group = $this.find('.slide_group');
  var $slides = $this.find('.slide');
  var bulletArray = [];
  var currentIndex = 0;
  var timeout;
  
  function move(newIndex) {
    var animateLeft, slideLeft;
    
    advance();
    
    if ($group.is(':animated') || currentIndex === newIndex) {
      return;
    }
    
    bulletArray[currentIndex].removeClass('active');
    bulletArray[newIndex].addClass('active');
    
    if (newIndex > currentIndex) {
      slideLeft = '100%';
      animateLeft = '-100%';
    } else {
      slideLeft = '-100%';
      animateLeft = '100%';
    }
    
    $slides.eq(newIndex).css({
      display: 'block',
      left: slideLeft
    });
    $group.animate({
      left: animateLeft
    }, function() {
      $slides.eq(currentIndex).css({
        display: 'none'
      });
      $slides.eq(newIndex).css({
        left: 0
      });
      $group.css({
        left: 0
      });
      currentIndex = newIndex;
    });
  }
  
  function advance() {
    clearTimeout(timeout);
    timeout = setTimeout(function() {
      if (currentIndex < ($slides.length - 1)) {
        move(currentIndex + 1);
      } else {
        move(0);
      }
    }, 4000);
  }
  
  $('.next_btn').on('click', function() {
    if (currentIndex < ($slides.length - 1)) {
      move(currentIndex + 1);
    } else {
      move(0);
    }
  });
  
  $('.previous_btn').on('click', function() {
    if (currentIndex !== 0) {
      move(currentIndex - 1);
    } else {
      move(3);
    }
  });
  
  $.each($slides, function(index) {
    var $button = $('<a class="slide_btn">&bull;</a>');
    
    if (index === currentIndex) {
      $button.addClass('active');
    }
    $button.on('click', function() {
      move(index);
    }).appendTo('.slide_buttons');
    bulletArray.push($button);
  });
  
  advance();
});
</script>

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