@extends('layouts.master')

@section('title', 'Measurement')

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


<div class="top-banner measure">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="title mrgnlft40">
				<h3>How to Measure</h3>
				<ul class="navbar">
					<li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href=""><strong>How to Measure</strong></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>



<div class="main sec-padding-sm paddingtop0">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-header title">
				<h3>How to Measure</h3>
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-10">
			<div class="measure-content">
				<p>Size does matter when it comes to buying wallpaper for your home or office because:</p>
				
				<ul>
				<li>You would not want to buy extra rolls which have no use and lie stacked around.</li>
				<li>You do not want to fall short of rolls to cover your entire wall.</li>
				<li>You do not want tacky work with frayed wallpaper sticking out at the corners.</li>
				</ul>
				
				<p>Therefore, once you have zeroed down on the design, the next step is to measure the size of wallpaper you would require to cover up your walls in an aesthetic way.</p>
				
				<p>In order to measure your wallpaper, you have to consider what you require:</p>
				
				<ul>
				<li>Full wall covering for high impact and best value for money.</li>
				<li>Partial wall covering for adding a certain theme to smaller spaces.</li>
				</ul>
				</div>
			</div>
		</div>
				
				
			
             <div class="measure-wrap">
			   <div class="row">
			   	
			   	
			   	<div class="col-sm-5">
			   		<div class="measure-text">
			   		<h4><strong>For Full Wall Coverings</strong></h4>
				<ul>
				<li><b>Width</b> - Measure the horizontal distance of the wall, from corner to corner.</li>
				<li><b>Height</b>&nbsp;– Measure the vertical height at each corner of the wall. Some walls are not perfectly square. If there is a difference in height, always select the greater of the two height measurements.</li>
				</ul>
			</div>
		</div>
			<div class="col-sm-7">
             	<div class="measure-img text-center">
				<img src="{{ asset('build/assets/images/width-height.png') }}" alt="" class="img-responsive">
				</div>
			</div>
		</div>
    </div>
        <div class="measure-wrap">
		<div class="row">

			<div class="col-sm-7">
				<div class="measure-img text-center"> <img src="{{ asset('build/assets/images/width-height1.png') }}" alt="" class="img-responsive"></div>
			</div>

			<div class="col-sm-5">
				<div class="measure-text">
				<h4><strong>For Partial Wall Coverings</strong></h4>
				<p>Make registration marks along the area that you want to cover.</p>
				
				<ul>
				<li><b>Width</b> - Measure the horizontal distance between registration marks.</li>
				<li><b>Height</b>&nbsp;– Measure the vertical height at each corner of the registration mark. You may want to cover a variety of heights. In case of difference in height, always select the greater of the two height measurements.</li>
				</ul>
			</div>
		</div>
		</div>	
	
	</div>
				<p>Most wallpaper designs are pretty flexible and trimming the edges to achieve a perfect finish does not harm the overall look. Always use a measuring tape to get the most accurate measurement. Finally, add a few extra inches along the sides of your wallpaper. This will give you a little breathing space in case of any odd mistakes!
				Got any queries? Simply call us </p>
			</div>
	</div>
</div>
</div>
@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection