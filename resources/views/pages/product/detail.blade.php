@extends('layouts.master')

@section('content')

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
	var price = {{ $detail->price }}
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
						           data: {"width": w_width, "height": w_height, "mid": mid, "price": price},
						           success: function (resp) {

						           	  	$("#cal_price").text("INR " + resp.price);
						           }

						       });

         		 }
         }

</script>
@endsection