@extends('layouts.master')

@section('title', 'Cart')

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
.nocart span {
	font-size:16px;border:1px solid #ddd;line-height:14px;padding:20px 0 20px 10px;font-weight:bold;width:100%;float:left;margin:0 0 20px 0
}
.cart .imgb img {width:120px;height:120px}
</style>
@endsection

@section('content')

@if(Cart::count())
<div class="cart-head">
	<div class="container">
<div class="title">
			
				<ul class="navbar">
					<li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href=""><strong>Cart</strong></a></li>
				</ul>
			</div>
		</div>
	</div>
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
							<a href="{{ route('cart.checkout') }}" title="Proceed to Checkout" class="btn pull-right">Proceed to Checkout</a>
						</div>
					</div>
					<!-- start cart-box -->
					<div class="cart-box">
						<div class="title">
							<div class="row">
								<div class="col-sm-2 hidden-xs">Image</div>
								<div class="col-sm-4 hidden-xs">Product</div>
								<div class="col-sm-2 hidden-xs">Item Price</div>
								<div class="col-sm-2 hidden-xs">Quantity</div>
								<div class="col-sm-2 hidden-xs">Action</div>
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
									<div class="title hidden-md hidden-sm hidden-lg">
										<h4>Image</h4>
									</div>
									<div class="imgb">
										<img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" width="281" height="345" alt="product">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="title hidden-md hidden-sm hidden-lg">
										<h4>Product</h4>
									</div>
									<h5>{{ $row->name }}</h5>
									
								</div>
								<div class="col-sm-2">
									<div class="title hidden-md hidden-sm hidden-lg">
										<h4>Item Price</h4>
									</div>
									<i class="fa fa-inr">&nbsp;</i> {{ round($row->price) }}</div>
								<div class="col-sm-2">
									<div class="title hidden-md hidden-sm hidden-lg">
										<h4>Quantity</h4>
									</div>
									<select name="update[{{ $row->rowId }}]" onchange="this.form.submit()">
										  @for($i = 1; $i <= 10; $i++)
										  {{ $selected = ($i == $row->qty) ? "selected" : "" }}
										  <option value="{{ $i }}" {{ ($i == $row->qty) ? "selected" : "" }}>{{ $i }}</option>
										  @endfor
									</select>
									<a class="remove" href="{{ route('cart.item.delete', $row->rowId) }}">Remove</a>
								</div>
								<div class="col-sm-2">
									<div class="title hidden-md hidden-sm hidden-lg">
										<h4>Action</h4>
									</div>
									<i class="fa fa-inr">&nbsp;</i> {{ number_format((float) ($row->price * $row->qty), 2, '.', '') }}</div>
							</div>
						</div>
					
						@endforeach

						<div class="subtotal">
							<div class="row">
								<div class="col-sm-10 text-right">
									<span>Subtotal</span>
								</div>
								<div class="col-sm-2">
									<i class="fa fa-inr">&nbsp;</i> {{ Cart::total() }}
								</div>
							</div>
						</div>
					</div>
					<!-- end cart-box -->
					<div class="row">
						<div class="col-sm-6 button-center">
							<a href="{{ route('home.index') }}" title="Continue Shopping" class="back-link"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Continue Shopping</a>
						</div>

						<div class="col-sm-6 button-center">
							<a href="{{ route('cart.checkout') }}" title="Proceed to Checkout" class="btn pull-right">Proceed to Checkout</a>
						</div>
					</div>
				</div>
				<!-- end cart -->
			</div>
		</div>
   </form>

	@else

	<div class="main-container">
		<div class="container">
			<div class="cart">
				<div class="row">
					<div class="col-sm-12 nocart">
						<span>No product in cart</span>
					</div>
					<div class="col-sm-12">
						<a style="width:19%" href="{{ route('home.index') }}" class="btn btn-block">Continue Shopping <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endif

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection