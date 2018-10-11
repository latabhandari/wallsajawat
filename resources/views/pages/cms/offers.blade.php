@extends('layouts.master')

@section('top_yield')
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<div class="title measure-title">
				<h3 class="paddingBottom20">Offers</h3>
				<ul class="navbar">
					<li class="nobackground"><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href="">Offers</a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="measure-content paddingBottom20">
				<img src="{{ asset('build/assets/images/offer-banner.jpg') }}" alt="">
				<p>Please read the terms and conditions below:</p>
				
				<ul>
				<li>Nam blandit orci nec gravida varius. In ornare neque vel blandit laoreet</li>
				<li>Morbi lacinia molestie est, nec malesuada massa congue eu. Sed vitae molestie odio.</li>
				<li>Morbi et sapien eu diam vulputate bibendum. Aenean eu elit faucibus, sagittis nibh vel, luctus nisl.</li>
				<li>Morbi aliquet lacinia ante sit amet rutrum.</li>
				<li>Morbi lacinia molestie est, nec malesuada massa congue eu. Sed vitae molestie odio.</li>
				<li>Morbi aliquet lacinia ante sit amet rutrum.</li>
				</ul>
				
				
			</div>
		</div>
	</div>
</div>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection