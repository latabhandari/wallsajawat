@extends('layouts.master')

@section('title', 'About Us')

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
<div class="top-banner about">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="title mrgnlft40">
				<h3>About Us</h3>
				<ul class="navbar">
					<li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href=""><strong>About Us</strong></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<div class="about main sec-padding">
<div class="container">
	<div class="row">
		<div class="col-sm-12 measure-content">
			<div class="row">
				<div class="about-sec col-sm-6">
					<h2 class="main-heading">About</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non cursus elit. Nulla rutrum quam arcu. Cras posuere augue at vehicula sagittis. Nunc a convallis lectus, eu ornare ante. Maecenas dictum consequat tortor eu commodo. Etiam interdum felis est, eget ultrices lacus accumsan a. In dignissim arcu ut diam luctus, nec iaculis nisl dapibus. Ut ornare tellus sed congue malesuada.</p>
					
					<p>Nunc ultricies justo ac malesuada ornare. Aenean ut interdum augue. Mauris lorem odio, gravida ac leo eu, vestibulum molestie nibh. Duis in fringilla dolor. Donec condimentum, libero vel pretium pellentesque, neque ex luctus ipsum, ut fermentum mauris neque nec risus. Etiam aliquam id purus sit amet posuere. Nam iaculis turpis id cursus elementum. Sed libero enim, dignissim vulputate accumsan eget, faucibus eu arcu.</p>
				</div>
					
					<div class="about-img-sec col-sm-6">
						<img src="{{ asset('build/assets/images/about1.jpg') }}" alt="" class="img-responsive">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection

@section('bottom_yield')

<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection