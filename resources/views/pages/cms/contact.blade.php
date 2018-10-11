@extends('layouts.master')

@section('title', 'Contact Us')

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
				<h3>Contact Us</h3>
				<ul class="navbar">
					<li class="nobackground"><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href=""><strong>Contact us</strong></a></li>
					
				</ul>
			</div>
		</div>
		
		<!--form sec-->
		<div class="col-sm-12 paddingleft40">
			<div class="row">
				<div class="col-sm-12">
					<p><strong>You can also leave your query by filling the form below. We will get back to you at the earliest!</strong></p>
				</div>
				<div class="col-sm-7">
					<div class="row">
						<div class="col-sm-12 ">
							<form class="contact-form" method="POST" action="{{ route('contactpost') }}" aria-label="{{ __('Contact') }}">
							  @csrf	
								<div class="form-group">
									<label for="name" class="width20 floatL">Name:</label>
									<input type="text" name="name" class="form-control width80" id="name" placeholder="Enter Name">
										@if ($errors->has('name'))
											<span class="error" role="alert">
												{{ $errors->first('name') }}
											</span>
										@endif
								</div>
							
								<div class="form-group">
									<label for="tel" class="width20 floatL">Phone:</label>
									<input type="tel" class="form-control width80" id="tel" name="phone" placeholder="Enter Phone Number">
									@if ($errors->has('phone'))
										<span class="error" role="alert">
											{{ $errors->first('phone') }}
										</span>
									@endif
								</div>

								<div class="form-group">
									<label for="email" class="width20 floatL">Email address:</label>
									<input type="email" class="form-control width80" id="email" aria-describedby="emailHelp" placeholder="Enter email">
									@if ($errors->has('msg'))
										<span class="error" role="alert">
											{{ $errors->first('msg') }}
										</span>
									@endif

								</div>

								<div class="form-group">
									<label for="comment" class="width20 floatL">Message:</label>
									<textarea class="form-control width80" rows="5" id="comment" name="msg"></textarea>
									@if ($errors->has('msg'))
										<span class="error" role="alert">
											{{ $errors->first('msg') }}
										</span>
									@endif
								</div>
								<div class="form-group">
									<button type="submit" class="btn contact-submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End of form sec-->
		
		<!--map sec-->
		<div class="col-sm-12 paddingleft40">
			<div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;q=GAUTAM%20BUDDHA%20NAGAR%2C%20UTTAR%20PRADESH%20(UP)+(Wall%20sajawat)&amp;ie=UTF8&amp;t=&amp;z=9&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google Maps iframe generator</a></iframe></div><br>
		</div>
		<!--End of map sec-->
	</div>
</div>





 <div class="container">
	<form method="POST" action="{{ route('contactpost') }}" aria-label="{{ __('Contact') }}">
		@csrf
		<div class="form-group">
			<label for="name">Name </label>
			<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autocomplete="off" />
			@if ($errors->has('name'))
			<span class="error" role="alert">
				{{ $errors->first('name') }}
			</span>
			@endif
		</div>
		<div class="form-group">
			<label for="email">Email </label>
			<input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="off" />
			@if ($errors->has('email'))
			<span class="error" role="alert">
				{{ $errors->first('email') }}
			</span>
			@endif
		</div>
		<div class="form-group">
			<label for="msg">Msg:</label>
			<textarea class="form-control" id="text" name="msg" cols="10">{{ old('msg') }}</textarea>
			@if ($errors->has('msg'))
			<span class="error" role="alert">
				{{ $errors->first('msg') }}
			</span>
			@endif
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection