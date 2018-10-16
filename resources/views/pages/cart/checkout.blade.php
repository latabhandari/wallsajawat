@extends('layouts.master')

@section('title', 'Checkout')

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
<style type="text/css" media="screen">
	.sub-heading h3{margin:3px 0 0 0}
</style>
@endsection

@section('content')

<div class="main-container">
	<div class="container">
		<!-- start checkout -->

		<form name="checkout" action="{{ route('cart.checkout.store') }}" method="POST">
		@csrf

		<div class="checkout">
			<div class="row">
				<div class="col-sm-8">
					<h2>Secure Checkout</h2>
					<!-- start form-box -->
					<div class="form-box">
						<div class="sub-heading">
							<h3><span>1</span> Shipping</h3>
						</div>

						@php
						   $city_id  = $user->profile->city;
						   $state_id = $user->profile->state;
						   if (empty($city_id) && empty($state_id))
						    {
						        $state_id  = env('DEFAULT_STATE', 13);
						        $city_id   = env('DEFAULT_CITY', 1119); 
						    }

						@endphp

						<div class="form">
							
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Full Name <samp>*</samp></label>
											<input type="text" name="name" class="form-control" value="{{ $user->name }}">
											@if ($errors->has('name'))
			                                    <span class="error" role="alert">
			                                        {{ $errors->first('name') }}
			                                    </span>
			                                @endif

										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Address Line<samp>*</samp></label>
											<input type="text" name="address" class="form-control" value="{{ $user->profile->address }}">
											@if ($errors->has('address'))
			                                    <span class="error" role="alert">
			                                        {{ $errors->first('address') }}
			                                    </span>
			                                @endif
										</div>
									</div>
								</div>
						
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>State <samp>*</samp></label>
											<select class="form-control" id="state" name="state_id" onchange="getCities(this.value)">
												@foreach ($states as $state)
												  <option {{ $state_id == $state->id ? "selected" : "" }} value="{{ $state->id }}">{{ $state->name }}</option>
												@endforeach
											</select>

										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>City</label>
											<div id="cityContainer">											
											</div>
											@if ($errors->has('city_id'))
			                                    <span class="error" role="alert">
			                                        {{ $errors->first('city_id') }}
			                                    </span>
			                                @endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Postal Code <samp>*</samp></label>
											<input type="text" name="postal_code" class="form-control" value="{{ $user->profile->pin }}" />
											@if ($errors->has('postal_code'))
			                                    <span class="error" role="alert">
			                                        {{ $errors->first('postal_code') }}
			                                    </span>
			                                @endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Phone Number <samp>*</samp></label>
											<input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}">
											@if ($errors->has('mobile'))
			                                    <span class="error" role="alert">
			                                        {{ $errors->first('mobile') }}
			                                    </span>
			                                @endif
										</div>
									</div>
								</div>
								<div class="row">
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Email Address <samp>*</samp></label>
											<input type="text" class="form-control" readonly name="email" value="{{ $user->email }}">
										</div>
									</div>

									<div class="col-sm-6"></div>
								</div>

								<input type="hidden" id="user_city_id" value="{{ $city_id }}" />

						</div>
					</div>
					<!-- end form-box -->
				
				</div>
				<div class="col-sm-4">
					<div class="rightcol-fixed">
						<div class="add-coupon">
							<h5>Redeem a coupon or promotion</h5>
							<label>Enter the code below and click Apply</label>
							<div class="row">
								<div class="col-sm-8">
									<input type="text" class="form-control" name="coupon" id="coupon" placeholder="Coupon Code" autocomplete="off" />
								</div>
								<div class="col-sm-4 padding-left-none">
									<input type="button" value="Apply" class="btn btn-block" id="apply_coupon" />
								</div>
								<p class="cpn_err" id="cpn_err"></p>

								@if (Session::has('discount_status'))
							        <p class="cpn_suc" id="cpn_suc">{!! session('discount_status') !!}</p>
							   @endif

							</div>
						</div>

						<!-- start order-summary -->

						@php
						  $discount = 	session('discount');
						  $cart_total = App\Helpers\MyHelper::removeComma(Cart::total());
						  $total      = $cart_total - $discount;

						@endphp
						<div class="order-summary">
							<table>
								<tr>
									<td>Items:</td>
									<td class="text-right"><i class="fa fa-inr">&nbsp;</i> {{ $cart_total }}</td>
								</tr>

								@php
								   if ($discount) {
								@endphp

									<tr>
									  <td>Discount:</td>
									  <td class="text-right"><i class="fa fa-inr">&nbsp;</i> {{ $discount }}</td>
								    </tr>

								@php
								  }
								@endphp
								
								<tr class="total">
									<td>Order Total:</td>
									<td class="text-right"><i class="fa fa-inr">&nbsp;</i> {{ $total }}</td>
								</tr>
							</table>
							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-block">Place Order</button>
								</div>
							</div>
						</div>
						<!-- end order-summary -->
					</div>
				</div>
			</div>
		</div>

	  </form>
		<!-- end checkout -->
	</div>
</div>

<script>

	$(document).ready(function() {

		var i = $('#state option:selected').val();
		getCities(i);

	});


	function getCities(state_id)
		 {
					$.ajax({
	                             type: "GET",
	                             url: WallSajawat.getSitePath('getcities/' +  state_id),
	                             dataType: "json",
	                             data: {},
	                             beforeSend: function() {
       								 // setting a timeout
        							 $('#cityContainer').html('loading...');
    							 },
	                             success: function (resp) {
	                             	if (resp.status == true)
	                             		 {
	                             		 	 var h = '';
	                             		 	 h += '<select class="form-control" name="city_id">';
	                             		 	 $.each(resp.cities, function(a, b) {
	                             		 	 	h += '<option value="' + b.i + '">' + b.n + '</option>'
	                             		 	 });
	                             		 	 h += '</select>';
	                             		 	 $("#cityContainer").html(h);
	                             		 }

	                                  
	                             }
                         });

		 }

	$('#apply_coupon').on('click', function() {
		var coupon = $.trim($("#coupon").val());
		if (! coupon)
			{
				$("#cpn_err").html('please enter coupon code!');
				return false;
			}
			 
			 $(this).attr('disabled', true);

			 $.ajaxSetup({
					        headers: {
					            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					        }
    					});

					$.ajax({
	                             type: "POST",
	                             url: WallSajawat.getSitePath('coupon'),
	                             dataType: "json",
	                             data: {"coupon": coupon},
	                             beforeSend: function() {
       								 // setting a timeout
        							 $('#apply_coupon').val('...');
    							 },
	                             success: function (resp) {
	                             	if (resp.status == true)
	                             		 {
	                             		 	location.href = location.href;
	                             		 }
	                             	else
	                             	     {
	                             	     	$('#apply_coupon').val('Apply').attr('disabled', false);
	                             	     	$('#cpn_err').html(resp.msg);
	                             	     }	                                  
	                             }
                         });
	});



</script>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection