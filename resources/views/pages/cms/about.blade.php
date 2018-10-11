@extends('layouts.master')

@section('top_yield')
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<div class="title measure-title">
				<h3>About Us</h3>
				<ul class="navbar">
					<li class="nobackground"><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href=""><strong>About Us</strong></a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row">
				<div class="about-sec">
					<p>Aliquam augue sem, varius id felis id, mattis tincidunt ipsum. Proin a dui et tellus sodales aliquet. Vestibulum imperdiet, purus eget tempor mollis, enim purus congue urna, nec placerat erat metus a magna. Vestibulum sodales mauris vel justo porta, ut semper neque rhoncus. Aliquam ac viverra velit. Etiam ac rutrum purus. Duis tincidunt dui ac massa tincidunt, sit amet bibendum ex consequat. Etiam nulla nisi, volutpat sed viverra vitae, vulputate nec leo.</p>
					
					<p>Proin id dictum lectus. Sed scelerisque risus ut varius dictum. Nunc massa justo, consectetur at auctor at, condimentum ut nisl. Maecenas tincidunt tempor dignissim. Donec lobortis nunc ut neque rutrum iaculis vel vitae lectus. Mauris scelerisque, velit eu lacinia posuere, justo ipsum fermentum elit, a iaculis elit purus at enim. Nulla pretium venenatis libero et suscipit. Donec aliquam est eu ipsum bibendum luctus. Nam quis pharetra eros.</p>
					
					<div class="about-img-sec col-sm-12">
						<img src="{{ asset('build/assets/images/img1.png') }}" alt="" class="col-sm-6">
						<img src="{{ asset('build/assets/images/img2.png') }}" alt="" class="col-sm-6">	
					</div>
					<p>
					Cras ornare felis id nibh dignissim fringilla. Cras feugiat rhoncus laoreet. Etiam iaculis, nisi in convallis pulvinar, metus orci tristique sem, sed mattis leo mauris a enim. Donec nec justo iaculis, ornare sem id, pharetra lorem. Mauris ex turpis, pellentesque vel sollicitudin sit amet, commodo ut mi. Mauris malesuada lectus ac odio posuere varius. Proin ac pellentesque arcu. Sed ex lacus, faucibus ut nulla quis, porta fermentum libero. Proin vitae libero sit amet ligula interdum efficitur in eget nibh. Nam tempus eu urna sed vestibulum. Nullam sed dictum erat. Etiam placerat mollis augue, feugiat convallis arcu ultrices sed. Aenean nec sem quis dui suscipit gravida. Fusce ullamcorper eleifend justo, a facilisis ante porta vel. Vivamus porta libero augue, id hendrerit lectus dignissim vitae. Morbi eget pellentesque ante.
					</p>
					<p>
					Etiam aliquam eget tortor in sagittis. Aliquam volutpat metus euismod, finibus arcu vitae, vestibulum purus. Aliquam non orci venenatis, posuere nulla id, vestibulum erat. Proin ut scelerisque ante. Etiam sit amet vulputate magna. Pellentesque id purus id massa ornare imperdiet eu sed velit. Maecenas quis dolor sem. Vivamus et tellus odio. Etiam malesuada nec arcu eu iaculis. Cras placerat nisi sed sem dictum auctor. Donec pellentesque commodo urna ac consequat. Suspendisse in libero erat. Sed ut dignissim purus. Pellentesque felis quam, ultricies nec turpis in, tristique sollicitudin purus. Ut sit amet feugiat odio, vel tempor urna. Ut congue ligula eu fermentum porta.	
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection