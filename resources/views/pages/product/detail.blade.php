@extends('layouts.master')

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
              <a href="images/product/img_product_detail1_lg.jpg">
                <img src="images/product/img_product_detail1.jpg" alt="product" width="612" height="650" class="product-small">
              </a>
            </div>
            <!-- start product-thumbnails -->
            <div class="product-thumbnails">
              <ul class="thumbnails">
                <li>
                  <a href="images/product/img_product_detail1_lg.jpg" data-standard="images/product/img_product_detail1.jpg">
                    <img src="images/product/product-thumb1.jpg" width="281" height="345" alt="product">
                  </a>
                </li>
                <li>
                  <a href="images/product/img_product_detail2_lg.jpg" data-standard="images/product/img_product_detail2.jpg">
                    <img src="images/product/product-thumb2.jpg" width="281" height="345" alt="product">
                  </a>
                </li>
                <li>
                  <a href="images/product/img_product_detail3_lg.jpg" data-standard="images/product/img_product_detail3.jpg">
                    <img src="images/product/product-thumb3.jpg" width="281" height="345" alt="product">
                  </a>
                </li>
				<li>
                  <a href="images/product/img_product_detail3_lg.jpg" data-standard="images/product/img_product_detail3.jpg">
                    <img src="images/product/product-thumb3.jpg" width="281" height="345" alt="product">
                  </a>
                </li>
				<li>
                  <a href="images/product/img_product_detail3_lg.jpg" data-standard="images/product/img_product_detail3.jpg">
                    <img src="images/product/product-thumb3.jpg" width="281" height="345" alt="product">
                  </a>
                </li>
              </ul>
            </div>
            <!-- end product-thumbnails -->
          </div>
          <!-- end product-imgb -->
        </div>
        <div class="col-sm-5">
          <!-- start product-txtb -->
          <div class="product-txtb">
            <h3>Lorem Ipsum</h3>
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
                    |<span>Style #1299528</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="price-text">
              <p>INR 2,756.12</p>
            </div>
           <!-- <div class="color">
              <p><strong>Color:</strong> Stealth Gray (008) / Black</p>
              <div class="row">
                <div class="col-sm-12">
                  <ul class="color-dd">
                    <li><a href="#" title="gray"><img src="images/product/color_gray.jpg" width="25" height="15" alt="gray"></a></li>
                    <li><a href="#" title="red"><img src="images/product/color_red.jpg" width="25" height="15" alt="red"></a></li>
                    <li><a href="#" title="green"><img src="images/product/color_green.jpg" width="25" height="15" alt="green"></a></li>
                    <li><a href="#" title="black"><img src="images/product/color_black.jpg" width="25" height="15" alt="black"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="size">
              <p>Please select a size</p>
              <div class="row">
                <div class="col-sm-12">
                  <ul class="size-dd">
                    <li><a href="#" title="SM"><span class="color-box">SM</span></a></li>
                    <li><a href="#" title="MD"><span class="color-box">MD</span></a></li>
                    <li><a href="#" title="LG"><span class="color-box">LG</span></a></li>
                    <li><a href="#" title="XL"><span class="color-box">XL</span></a></li>
                    <li><a href="#" title="XXL"><span class="color-box">XXL</span></a></li>
                    <li><a href="#" title="3XL"><span class="color-box">3XL</span></a></li>
                  </ul>
                </div>
              </div>
            </div>-->
			<div class="form-element-50-50">        
				<ul>
					<li><label>Measurement in</label>
						<select name="size_format" id="size_format" class="istyle7">
							<option value="feet">Feet</option>
							<option value="inch">Inch</option>
							<option value="cm">Centimeter</option> 
						</select>
					</li>
						<li><label>Width:</label>
						<input type="text" name="txtwidth" id="txtwidth" value="" class="istyle8" width="50">
						<input type="hidden" name="maxarea" id="maxarea" class="istyle8" value="40">

					</li>
					<li><label>Height:</label>

						<input type="text" name="txtheight" id="txtheight" value="" class="istyle8">
						<label id="areaerror" class="error" style="display: none;"></label>
					</li>
					<li>Price : <span id="cal_price">INR 130 / Sq.Ft</span></li>
				</ul>
			</div>
            <div class="">
              <p><strong>Quantity:</strong> Please select Quantity.</p>
              <div class="row">
                <div class="col-sm-12">
                  <input type="number" name="" placeholder="1" class="form-control">
                  <a href="cart.html" title="Add to Bag" class="btn">Add to Bag <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
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
          <ul>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</li>
            <li>Proin massa dolor, vulputate quis mauris ut,</li>
            <li>Full mesh back delivers strategic ventilation</li>
            <li>gravida viverra metus. Nulla eget augue blandit </li>
            <li>blandit metus tincidunt aliquam a at nunc. Etiam molestie</li>
            <li>Nulla nec ornare nibh. Duis viverra turpis nulla,</li>
            <li>nec euismod nunc porta posuere</li>
            <li>Quisque pharetra quam at magna semper facilisis. </li>
          </ul>
          <p><a href="#" title="Shop all Men's Tank Tops &amp; Sleeveless T's">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></p>
        </div>
        <div class="col-sm-4">
          
        </div>
      </div>
    </div>
    <!-- end product-description -->
    <div class="product-tab-info">
      <div class="tab-nav clearfix">
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="#product" role="tab" data-toggle="tab" title="Product">Product</a></li>
          <li role="presentation"><a href="#product2" role="tab" data-toggle="tab" title="Product 2">Product 2</a></li>
          <li role="presentation"><a href="#product3" role="tab" data-toggle="tab" title="Product 3">Product 3</a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="product">
          <h4>Product</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="tab-pane" id="product2">
          <h4>Product 2</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="tab-pane" id="product3">
          <h4>Product 3</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
      </div>
    </div>
    <!-- start recommend-product -->
    <div class="recommend-product">
      <h3>Recommend Product</h3>
      <div class="bx-wrapper" style="max-width: 1090px;"><div class="bx-viewport" aria-live="polite" style="width: 100%; overflow: hidden; position: relative; height: 324px;"><ul class="bxslider" style="width: 10215%; position: relative; transition-duration: 0s; transform: translate3d(-1120px, 0px, 0px);"><li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product2.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li><li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product3.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li><li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product4.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li><li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product5.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="false">
          <div class="imgb">
            <img src="images/product/img_product1.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="false">
          <div class="imgb">
            <img src="images/product/img_product2.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="false">
          <div class="imgb">
            <img src="images/product/img_product3.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product4.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li aria-hidden="true" style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;">
          <div class="imgb">
            <img src="images/product/img_product5.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li aria-hidden="true" style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;">
          <div class="imgb">
            <img src="images/product/img_product1.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product2.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product3.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product4.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
        <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product5.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li>
      <li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product1.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li><li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product2.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li><li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product3.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li><li style="float: left; list-style: none; position: relative; width: 250px; margin-right: 30px;" class="bx-clone" aria-hidden="true">
          <div class="imgb">
            <img src="images/product/img_product4.jpg" width="300" height="360" alt="product">
          </div>
          <div class="overlay">
            <h5>BN Threadborne™ Mesh Singlet</h5>
            <div class="price">
              <span>INR 2,757.89</span>
              <span><s>INR 3,757.89</s></span>
            </div>
          </div>
        </li></ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev" href="">Prev</a><a class="bx-next" href="">Next</a></div></div></div>
    </div>
    <!-- end recommend-product -->
  </div>
</div>


<div class="container" style="float: left;line-height: 26px;margin:10px 0">
	<form name="product" id="product" action="{{ route('product.cart') }}" method="post">
		@csrf
     <div>product name : {{ $detail->name }}</div>
     <div>sku : {{ $detail->sku }}</div>
     <div>price : <span id="cal_price">INR {{ $detail->price }} / Sq.Ft</span></div>
     <div>product name : {{ $detail->name }}</div>
     <div>short_desc : {!! $detail->short_desc !!}</div>
     <div class=''>
     	<select id="material_type" name="material_type">
     		@foreach ($measurements as $data)
                <option data-attr="{{ strtolower($data->name) }}" data-value="{{ $data->square_feet_value }}" value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
     	</select>

     </div>
     <input type="hidden" name="id" id="id" value="{{ $detail->id }}" autocomplete="off">

     <div class=''><input type="text" name="width" id="w_width" placeholder="width" autocomplete="off"></div>
     <div class=''><input type="text" name="height" id="w_height" placeholder="height" autocomplete="off"></div>

     <input type="submit" name="submit" value="Add to cart">

    </form>

</div>

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
	var price = {{ $detail->price }};
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
         		 	console.log(WallSajawat.getSitePath('product/option'));
						$.ajax({
						           type: "POST",
						           url: WallSajawat.getSitePath('product/option'),
						           dataType: "json",
						           data: {"width": w_width, "height": w_height, "mid": mid, "price": price},
						           success: function (resp) {

						           	  	$("#cal_price").text("INR " + resp.price);
						           }

						       });

         		 }
         }

</script>
@endsection