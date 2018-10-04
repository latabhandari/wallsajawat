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

@if(Cart::count())

<form name="updateform" action="{{ route('cart.item.update') }}" method="POST">
	@csrf
	     <div class="main-container">
			<div class="container">
				<!-- start cart -->
				<div class="cart">
					<div class="row">
						<div class="col-sm-8">
							<h2>YOUR BAG</h2>
						</div>
						<div class="col-sm-4">
							<a href="checkout.html" title="Proceed to Checkout" class="btn pull-right">Proceed to Checkout</a>
						</div>
					</div>
					<!-- start cart-box -->
					<div class="cart-box">
						<div class="title">
							<div class="row">
								<div class="col-sm-2">Image</div>
								<div class="col-sm-4">Product</div>
								<div class="col-sm-2">Item Price</div>
								<div class="col-sm-2">Quantity</div>
								<div class="col-sm-2">Total</div>
							</div>
						</div>

					@foreach(Cart::content() as $row)
						@php
						  $prod_image_info   = App\Helpers\MyHelper::getProductImage($row->id);
						  $measurement_info  = App\Helpers\MyHelper::getMeasurement($row->options->type);
						@endphp

						<div class="cart-row">
							<div class="row">
								<div class="col-sm-2">
									<div class="imgb">
										<img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" width="281" height="345" alt="product">
									</div>
								</div>
								<div class="col-sm-4">
									<h5>{{ $row->name }}</h5>
									<p class="minfo">Size (Width x Height): {{ $row->options->width }} {{ $measurement_info->name }} * {{ $row->options->height }} {{ $measurement_info->name }}</p>
								</div>
								<div class="col-sm-2">INR {{ round($row->price) }}</div>
								<div class="col-sm-2">
									<select name="update[{{ $row->rowId }}]">
										  @for($i = 1; $i <= 10; $i++)
										  {{ $selected = ($i == $row->qty) ? "selected" : "" }}
										  <option value="{{ $i }}" {{ ($i == $row->qty) ? "selected" : "" }}>{{ $i }}</option>
										  @endfor
									</select>
									<a class="remove" href="{{ route('cart.item.delete', $row->rowId) }}">Remove</a>
								</div>
								<div class="col-sm-2"><i class="fa fa-inr">&nbsp;</i> {{ number_format((float) ($row->price * $row->qty), 2, '.', '') }}</div>
							</div>
						</div>

					
						@endforeach

						<div class="subtotal">
							<div class="row">
								<div class="col-sm-10 text-right">
									<span>Subtotal</span>
								</div>
								<div class="col-sm-2">
									INR {{ Cart::total() }}
								</div>
							</div>
						</div>
					</div>
					<!-- end cart-box -->
					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('home.index') }}" title="Continue Shopping" class="back-link"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Continue Shopping</a>
						</div>

						<div class="col-sm-6">
							<button type="submit" name="updatebtn" class="btn btn-info">Update</button>
							<a href="checkout.html" title="Proceed to Checkout" class="btn pull-right">Proceed to Checkout</a>
						</div>
					</div>
				</div>
				<!-- end cart -->
			</div>
		</div>
   </form>

	@else

    <p>No product in cart</p>

	<a style="width:15%" href="{{ route('home.index') }}" class="btn btn-success btn-block">Continue Shopping <i class="fa fa-angle-right"></i></a>

	@endif

@endsection