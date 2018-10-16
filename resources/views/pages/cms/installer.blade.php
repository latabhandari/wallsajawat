@extends('layouts.master')

@section('title', 'WallPaper Installer')

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
<div class="top-banner installer">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="title mrgnlft40">
				<h3>Wallpaper Installer</h3>
				<ul class="navbar">
					<li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href=""><strong>Wallpaper Installer</strong></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>


<div class="installer-page main sec-padding-sm paddingtop0">
<div class="container">
	
	<div class="row">
		<div class="col-sm-12">
			<div class="measure-content">
				
				<h3 style="margin-bottom:20px;" class="page-header"><strong>Wall sajawat installation network in India</strong></h3>
				
				<p class="weight400">Our list of wallpaper installers in various cities is given below. We are continuously working to expand our network of installers across India. In case you  have a reference or wish to tie-up with us, please feel to drop us an email at info@wallsajawat.com. Please note the installation charges are separate and are not included in the cost of the wallpapers.</p>
				<h3 class=" marginBottom20 "><strong>Wallpaper Installers are currently available in the following cities:</strong></h3>
				<div class="well">
				
				<ul>
				<li>Ahmedabad</li>
				<li>Bangalore</li>
				<li>Baroda</li>
				<li>Chennai</li>
				<li>Delhi</li>
				<li>Faridabad</li>
				<li>Gurgaon</li>
				<li>Hyderabad</li>
				<li>Kolkata</li>
				<li>Mumbai</li>
				<li>NCR</li>
				<li>Noida</li>
				<li>Pune</li>
				</ul>
			</div>
		</div>
				<div class="row">
					<div class="col-md-12">
					<p class="weight400"><span class="weight600">Please note:</span> Wall sajawat provides the installation as a service to customers. Except for Delhi / NCR, we would not be held responsible for any delay or damage in the installation of your wallpaper by these service providers. We can assure you that they are trained installers, but any installation job comes with a certain risk and we would not be held liable for the same. You are free to negotiate the terms and costs of the job with the installer independently. <br/><span class="weight600">Please note installation charges are extra.</span></p>
				<p class="weight400">Please call us for contact details once you place your order and we would be happy to provide the same for you.</p>
			</div>
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