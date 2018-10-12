@extends('layouts.master')

@section('title', 'Cart')

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

<div class="container">
	<div class="row">
	
		<div class="col-sm-12">
			<div class="title measure-title">
				<ul class="navbar orderul">
					<li class="nobackground"><a href="">Your Account</a></li>
					<li class="weight600"><a href="">Your Orders</a></li>
				</ul>
			</div>
		</div>
		<!---->
		
		<div class="col-sm-6 paddingBottom20">
			<div class="order-heading">
				<h2 class="weight600 marginZero">Your Orders</h2>
			</div>
		</div>
		<div class="col-sm-6 paddingBottom20">
			<div class="order-search-sec">
				<div class="row">
					<div class="col-sm-9">
						<div class="col-auto">
							<i class="fa fa-search h4 text-body"></i>
						</div>
						<div class="order-search">
							<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search all orders">
						</div>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-lg search-btn-custom" type="submit">Search orders</button>
					</div>
				</div>
			</div>
		</div>
		<!---->
	</div>
</div>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection