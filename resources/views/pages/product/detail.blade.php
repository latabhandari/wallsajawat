@extends('layouts.master')
@section('title', $detail->name)
@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('build/assets/js/jquery.elevatezoom.min.js') }}" type="text/javascript"></script>
<style>
.mrgntp{margin:10px 0 0 0;font-size:13px}
span.short_desc p{font-size:13px}
#gallery img { width:80px;height:80px }
.rating {float:left}
.lnehght24{line-height:24px !important}
.rating:not(:checked) > input {visibility:hidden;top:-9999px;clip:rect(0,0,0,0)}
.rating:not(:checked) > label {float:right;width:1em;padding:0 .1em;overflow:hidden;white-space:nowrap;cursor:pointer;font-size:150%;line-height:1.2;color:#ddd}
.rating:not(:checked) > label:before {content:'★ ';}
.rating > input:checked ~ label {color:orange}
.rating:not(:checked) > label:hover,.rating:not(:checked) > label:hover ~ label {color:orange}
.rating > input:checked + label:hover,.rating > input:checked + label:hover ~ label,.rating > input:checked ~ label:hover,.rating > input:checked ~ label:hover ~ label,.rating > label:hover ~ input:checked ~ label {color:#ea0}
.rating > label:active {position:relative;top:2px;left:2px}
.padd0{padding-left:0px !important;}
.dngr{background:#dd4b39 !important;cursor:default;}
</style>
@endsection
@section('content')
<div class="main-container">
  <!-- start product-detail -->
  <div class="product-detail">
    <div class="container">
      <div class="row">
        <div class="col-sm-7">
          <!-- start product-imgb -->
          <div class="product-imgb">

            <!--<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails is-ready">
              <a href="{{ asset('catalog/product/'.$product_images[0]->image) }}">
                <img src="{{ asset('catalog/product/'.$product_images[0]->image) }}" alt="product" width="612" height="650" class="product-small">
              </a>
            </div>
            
            <div class="product-thumbnails">
              <ul class="thumbnails">
                @foreach ($product_images as $image)
                <li>
                  <a href="{{ asset('catalog/product/'.$image->image) }}" data-standard="{{ asset('catalog/product/'.$image->image) }}">
                    <img src="{{ asset('catalog/product/'.$image->image) }}" width="281" height="345" alt="product">
                  </a>
                </li>
                @endforeach
              </ul>
            </div>-->

              <div class="zoomWrapper">
                 <img id="zoom" src="{{ asset('catalog/product/'.$product_images[0]->image) }}" data-zoom-image="{{ asset('catalog/product/'.$product_images[0]->image) }}">
              </div>

              <div id="gallery" class="product-thumbnails">
                <ul class="thumbnails">
                    @foreach ($product_images as $image)
                      <li>
                        <a href="{{ asset('catalog/product/'.$image->image) }}" data-image="{{ asset('catalog/product/'.$image->image) }}" data-zoom-image="{{ asset('catalog/product/'.$image->image) }}">
                          <img id="img_01" src="{{ asset('catalog/product/'.$image->image) }}" />
                        </a>
                      </li>
                    @endforeach
                </ul>                     
              </div>

            <!-- end product-thumbnails -->
          </div>
          <!-- end product-imgb -->
        </div>
        <div class="col-sm-5">
          <!-- start product-txtb -->
          <div class="product-txtb">

            @if (\Session::has('error_msg'))
                <div class="alert alert-danger" style="padding:5px 15px">
                        <span>{!! \Session::get('error_msg') !!}</span>
                </div>
            @endif

            <h3>{{ $detail->name }}</h3>
            @php
              $order_this_month = App\Helpers\MyHelper::orderThisMonth($detail->id);
              if ($order_this_month)
              echo '<p class="cag-title">'.$order_this_month.' order(s) this month</p>';
              $prating = App\Helpers\MyHelper::getProductRating($detail->id);
            @endphp
            
            <p class="wishlist"><a href="javascript:void(0)" id="addwishlist" data-attr="{{ $detail->id }}">[Add to wishlist]</a></p>
            <span class="short_desc">{!! $detail->short_desc !!} </span>
            <div class="rating">
              <div class="row">
                <div class="col-sm-12">
                  <div class="rating-star">
                    @php
                     if ($prating)
                       {
                    @endphp
                    <ul>
                      {!! str_repeat('<li class=\'lnehght24\'><i class="fa fa-star-o" aria-hidden="true"></i></li>', $prating) !!}
                    </ul>
                     <span>{{ $prating }}</span>
                    |<span>Style #{{ $detail->sku }}</span>
                    @php
                     } else {
                    @endphp
                        <span class="padd0">Style #{{ $detail->sku }}</span>
                    @php
                      }
                    @endphp
                    
                  </div>
                </div>
                <div class="col-sm-12">Price:&nbsp;<i class="fa fa-inr" aria-hidden="true"></i>&nbsp;{{ $detail->price }}</div>
                @php
                  $dimension = App\Helpers\MyHelper::getRollDimenstionById($detail->roll_id);
                @endphp
                <div class="col-sm-12 mrgntp">Size (Width x Height):{{ $dimension->width }} Feet x {{ $dimension->height }} Feet&nbsp;</div>
              </div>
            </div>
           
            <form name="product" id="product" action="{{ route('product.cart') }}" method="post">
            	  @csrf

          			<div class="form-element-50-50">        
          				<ul>
          					<li><label>Measurement in</label>
          						<select id="material_type" name="material_type" class="istyle7">
          				     		@foreach ($measurements as $data)
          				                <option data-attr="{{ strtolower($data->name) }}" data-value="{{ $data->square_feet_value }}" value="{{ $data->id }}">{{ $data->name }}</option>
          				            @endforeach
          				     	</select>
          					</li>
          						<li class="width"><label>Width:</label>
          						<input type="text" name="width" id="w_width" value="" class="istyle8" width="50" autocomplete="off" />
          					</li>
          					<li class="height"><label>Height:</label>
          						<input type="text" name="height" id="w_height" value="" class="istyle8" autocomplete="off" />
          					</li>
                    @php
                      $sq_feet_price = App\Helpers\MyHelper::getProductSquareFeetPrice($detail->id);
                    @endphp
          					<!--<li>Price : <span id="cal_price"><i class="fa fa-inr">&nbsp;</i>{{ $sq_feet_price }} / Sq.Feet</span></li>-->

                    <li id="cal_price"></li>

          				</ul>
          			</div>

                @if( ! empty($detail->stock_item))
                    <p><strong>Quantity:</strong> Please Select Quantity.</p>
                    <div class="row">
                      <div class="col-sm-12">
                        <input type="number" name="qty"  min="1" max="25" class="form-control" value="1" />
                        <button  type="submit" class="btn"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Bag</button>
                      </div>
                    </div>
                @else
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-danger dngr">OUT OF STOCK</button>
                    </div>
                  </div>
                @endif

                <input type="hidden" name="id" id="id" value="{{ $detail->id }}" autocomplete="off" />

             </form>

          </div>
          <!-- end product-txtb -->
        </div>
      </div>
    </div>
  </div>
  <!-- end product-detail -->
  <div class="container">
    <!-- start product-description -->
    <div class="product-description" id="prddesc">
      <div class="row">
        <div class="col-sm-8">
          <h3>Product Description</h3>
          <p>{!! ($detail->description) ? $detail->description : 'No Description!' !!}</p>
        </div>
        <div class="col-sm-4">
          
      </div>
    </div>
  </div>

  @php
    if ( ! empty($rating))
       {
  @endphp

  <div class="rating-form">
    <div class="row">
      <div class="col-sm-6">

            <form name="ratingfrm" id="ratingfrm" action="#" method="post">
              @csrf
              <div class="rating-box">
                <div class="form-group row">
                  <div class="col-md-4">
                    <span>Your Rating:</span>
                  </div>
                  <div class="col-md-8">
                    <div class="rating-star">
                      <div class="row">
                        <div class="col-md-9">
                          <!-- <i class="fa fa-star-o" ></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>-->
                          <!--<select name="star" id="star">
                             <option value="1">1 star</option>
                             <option value="2">2 star</option>
                             <option value="3">3 star</option>
                             <option value="4">4 star</option>
                             <option value="5">5 star</option>
                          </select>-->

                          <fieldset class="rating">
                              <input type="radio" id="star5" name="star" value="5" /><label for="star5" title="">5 stars</label>
                              <input type="radio" id="star4" name="star" value="4" /><label for="star4" title="">4 stars</label>
                              <input type="radio" id="star3" name="star" value="3" /><label for="star3" title="">3 stars</label>
                              <input type="radio" id="star2" name="star" value="2" /><label for="star2" title="">2 stars</label>
                              <input type="radio" id="star1" name="star" value="1" /><label for="star1" title="">1 star</label>
                          </fieldset>

                        </div>
                        <div class="col-md-3">
                          <span>Rate it!</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               </div>

               <div class="form-group">
                 <textarea name="review" id="review" class="form-control" placeholder="Review"></textarea>
               </div>
               <div class="form-group">
                 <input type="submit" name="submit" class="btn" value="Submit" id="sbmtrt" />
               </div>
            </form>
        </div>
      </div>
    </div>
    @php
      }
    @endphp

    <!-- end product-description -->

    <div class="comment-block">

        @if(session()->has('ratingsuc'))
                <div class="alert alert-success"> 
                {!! session('ratingsuc') !!}
                </div>
        @endif

        @php 
          if (count($user_ratings))
           {
              foreach ($user_ratings as $rating_obj)
                 {
                    $uname = $rating_obj->user->name
        @endphp
      
          <div class="media">
            <div class="media-left">
            <span>{{ strtoupper(substr($uname, 0, 1)) }}</span>
           </div>
          <div class="media-body">
            <div class="rate-box">
               {!! str_repeat('<i class="fa fa-star-o "></i>', $rating_obj->rating) !!}
            </div>
            <div class="head">{{ $rating_obj->review }}</div>
            <div class=review" title="vijay">by {{ $rating_obj->user->name }}  on {{ date('D, j M Y h:i a', $rating_obj->timestamp) }}</div>
          </div>
        </div>
        @php
         }
        }
       @endphp

    </div>



    <!-- start recommend-product -->

    @if(count($featured_products))

    <div class="recommend-product">
      <h3>Recommend Product</h3>
      <div class="bx-wrapper" style="max-width: 1140px;">
         <div class="bx-viewport" aria-live="polite" style="width: 100%; overflow: hidden; position: relative; height: 324px;">
          <ul class="bxslider" style="width: 10215%; position: relative; transition-duration: 0s; transform: translate3d(-1120px, 0px, 0px);">

          @foreach($featured_products as $featured_product)
              @php
                  $prod_image_info = App\Helpers\MyHelper::getProductImage($featured_product->id);
              @endphp

              <a href="{{ route('product.detail', $featured_product->slug) }}">
                <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
                <div class="imgb">
                  <img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" width="300" height="360" alt="product">
                </div>
                <div class="overlay">
                  <h5>{{ $featured_product->name }}</h5>
                  <div class="price">
                    <span>INR {{ $featured_product->price }}</span>
                  </div>
                </div>
                </li>
              </a>
          @endforeach

      </ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev" href="">Prev</a><a class="bx-next" href="">Next</a></div></div></div>
    </div>
    
    @endif
    <!-- end recommend-product -->
  </div>
</div>


@endsection

@section('bottom_yield')

<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/js/jquery.bxslider.min.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
  $.validator.setDefaults({
      submitHandler: function()  {
        alert("submitted!");
      }
  });

  $(document).ready(function() {
    // validate the comment form when it is submitted
  
    // validate signup form on keyup and submit

    $("#ratingfrm").validate({
                                errorElement: 'span',
                                rules: {
                                          star: {
                                                            required: true, 
                                                },
                                          review:{
                                                            maxlength: 255
                                                 }
                                       },
                                 messages: {
                                                star: "required !",
                                           },

                          submitHandler: function()  {
                                                            let rating =  $('input[name=star]:checked', '#ratingfrm').val();
                                                            let review =  $('#review').val();
                                                            $("#sbmtrt").attr({'disabled': true, 'value': '...'});

                                                            $.ajax({
                                                                     type: "POST",
                                                                     url: WallSajawat.getSitePath('rating'),
                                                                     dataType: "json",
                                                                     data: {rating: rating, review: review, encrypt_id: '{{ last(request()->segments()) }}' },

                                                                     success: function (resp) {

                                                                        if (resp.status == 'success')
                                                                          window.location.reload();
                                                                        else
                                                                          alert('An error occured! Try again');

                                                                          $("#sbmtrt").attr({'disabled': false, 'value': 'Submit'});
                                                                     }

                                                                 });
                                                     }
                });


  /* $("#product").validate({
      rules: {
        width: {
              required: true, 
              number: true,
        },
        height: {
              required: true, 
              number: true,
        }
      },
      messages: {
              width: {
                required: "Please enter width",
                number: "accept only number and float values"
              },
              height: {
                required: "Please enter height",
                number: "accept only number and float values"
              }
            },
      submitHandler: function()  {
          return true;
      }
    });
   */



  });

</script>

<script>
  var pid   = {{ $detail->id }};
  var price = {{ $sq_feet_price }};
  $("#material_type").change(function() 
     {  
          var size = $('option:selected', this).attr('data-value');
          var measurement = $('option:selected', this).attr('data-attr');

          $('#w_width').val('');
          $('#w_width').val('');

         // $("#cal_price").text("INR "+(price / size).toFixed(5)+"/ Sq. " + measurement); aded 8 nov


        /*var size_format = $(this).val();
      
      if(size_format == "feet")
        { 
                 $("#cal_price").text("INR " + price + "/ Sq.Ft");
        }
    
      if(size_format == "inch")
        { 
                 $("#cal_price").text("INR "+(price/(12*12*12)).toFixed(5)+"/ Sq.inch");
        }

        if(size_format == "centimeter")
          { 
                   $("#cal_price").text("INR "+(price/(30*30*30)).toFixed(7)+"/ Sq.cm");
          }
          */

      //$("#cal_price").text()");
      });



      $("#w_width").bind("keyup keypress blur change",function(){
      pricecalculate();
    });

    $("#w_height").bind("keyup keypress blur change",function(){
      pricecalculate();
    });  


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        function pricecalculate()
         {
            var w_width  =  $('#w_width').val();
            var w_height =  $('#w_height').val();
            var mid      =  $("#material_type option:selected").val();

            if (w_width && w_height)
               {
                    var currentRequest = null;
                    currentRequest  =  $.ajax({
                                                 type: "POST",
                                                 url: WallSajawat.getSitePath('product/option'),
                                                 dataType: "json",
                                                 data: {"width": w_width, "height": w_height, "mid": mid, "pid": pid},
                                                 beforeSend : function()    {           
                                                      if(currentRequest != null) {
                                                          currentRequest.abort();
                                                      }
                                                  },
                                                 success: function (resp) {

                                                      // $("#cal_price").text("INR " + resp.price);
                                                      $("#cal_price").text("Roll: " + resp.roll).css('display','');

                                                 },
                                                 error: function(e) {
                                                    // Error
                                                 }
                                              });

                }
              else
                  $("#cal_price").html('').css('display', 'none');
         }

        $(document).ready(function() {
               $('.bxslider').bxSlider({
                                              minSlides: 1,
                                              maxSlides: 3,
                                              slideWidth: 350,
                                              slideMargin: 30,
                                              pager: true,
                                              auto: true,
                                              infiniteLoop: true
                                      });
         });


$(document).ready(function () {
$("#zoom").elevateZoom({gallery:'gallery', cursor: 'pointer', galleryActiveClass: "active", imageCrossfade: true, loadingIcon: ""}); 

$("#zoom").bind("click", function(e) {  
  var ez =   $('#zoom').data('elevateZoom');
  ez.closeAll(); //NEW: This function force hides the lens, tint and window 
  $.fancybox(ez.getGalleryList());
  return false;
}); 

}); 



</script>
@endsection

