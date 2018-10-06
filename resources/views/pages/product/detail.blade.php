@extends('layouts.master')

@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
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
            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails is-ready">
              <a href="{{ asset('catalog/product/'.$product_images[0]->image) }}">
                <img src="{{ asset('catalog/product/'.$product_images[0]->image) }}" alt="product" width="612" height="650" class="product-small">
              </a>
            </div>
            <!-- start product-thumbnails -->
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
            </div>
            <!-- end product-thumbnails -->
          </div>
          <!-- end product-imgb -->
        </div>
        <div class="col-sm-5">
          <!-- start product-txtb -->
          <div class="product-txtb">
            <h3>{{ $detail->name }}</h3>
            <p class="cag-title">1100 orders this month</p>
            <div class="rating">
              <div class="row">
                <div class="col-sm-12">
                  <div class="rating-star">
                    <ul>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    </ul>
                    <span>1</span>
                    |<span>Style #{{ $detail->sku }}</span>
                  </div>
                </div>
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
						<li><label>Width:</label>
						<input type="text" name="width" id="w_width" value="" class="istyle8" width="50" autocomplete="off" />
					</li>
					<li><label>Height:</label>
						<input type="text" name="height" id="w_height" value="" class="istyle8" autocomplete="off" />
					</li>
          @php
            $sq_feet_price = App\Helpers\MyHelper::getProductSquareFeetPrice($detail->id);

          @endphp
					<li>Price : <span id="cal_price"><i class="fa fa-inr">&nbsp;</i>{{ $sq_feet_price }} / Sq.Feet</span></li>
				</ul>
			</div>

            <div class="">
              <p><strong>Quantity:</strong> Please select Quantity.</p>
              <div class="row">
                <div class="col-sm-12">
                  <input type="number" name="qty" placeholder="1" min="1" max="25" class="form-control" value="1" />
                  <button  type="submit" class="btn"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Bag</button>
                </div>
              </div>
            </div>

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
    <div class="product-description">
      <div class="row">
        <div class="col-sm-8">
          <h3>Product Description</h3>
          <p>{!! $detail->description !!}</p>
        </div>
        <div class="col-sm-4">
          
        </div>
      </div>
    </div>
    <!-- end product-description -->

    <!-- start recommend-product -->

    @if(count($featured_products))

    <div class="recommend-product">
      <h3>Recommend Product</h3>
      <div class="bx-wrapper" style="max-width: 1090px;">
         <div class="bx-viewport" aria-live="polite" style="width: 100%; overflow: hidden; position: relative; height: 324px;">
          <ul class="bxslider" style="width: 10215%; position: relative; transition-duration: 0s; transform: translate3d(-1120px, 0px, 0px);">

          @foreach($featured_products as $featured_product)
              @php
                  $prod_image_info = App\Helpers\MyHelper::getProductImage($featured_product->id);
              @endphp

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
    $("#product").validate({
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


  });

</script>

<script>
  var pid   = {{ $detail->id }};
  var price = {{ $sq_feet_price }};
  $("#material_type").change(function() 
     {  
          var size = $('option:selected', this).attr('data-value');
          var measurement = $('option:selected', this).attr('data-attr');
          $("#cal_price").text("INR "+(price / size).toFixed(5)+"/ Sq. " + measurement);
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
                  $.ajax({
                             type: "POST",
                             url: WallSajawat.getSitePath('product/option'),
                             dataType: "json",
                             data: {"width": w_width, "height": w_height, "mid": mid, "pid": pid},
                             success: function (resp) {

                                  $("#cal_price").text("INR " + resp.price);
                             }

                         });

              }
         }

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
@endsection