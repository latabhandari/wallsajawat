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
<style type="text/css" media="screen">
  .alert-success{margin:20px 10px 10px 30px;padding:10px;} 	
</style>
@endsection

@section('content')

<div class="main-container">
	<div class="container">
		<!-- start checkout -->

		<form name="checkout" action="{{ route('profile.update') }}" method="POST">
		@csrf

		<div class="checkout">
			<div class="row">
				<div class="col-sm-10">
					<!-- start form-box -->
					<div class="form-box">
						<div class="sub-heading">
							<h3 style="margin:5px 0">Update Profile</h3>
						</div>

						@if ($success = Session::get('success'))
			                  <div class="alert alert-success">
			                      <p>Your Profile has been updated successfully!</p>
			                  </div>
			            @endif

						@php
						   $city_id  = $user->city;
						   $state_id = $user->state;
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
											<label>Address<samp>*</samp></label>
											<input type="text" name="address" class="form-control" value="{{ $user->address }}">
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
											<select id="state" class="form-control" name="state" onchange="getCities(this.value)">
												@foreach ($states as $state)
												  <option {{ $state_id == $state->id ? "selected" : "" }} value="{{ $state->id }}">{{ $state->name }}</option>
												@endforeach
											</select>
											@if ($errors->has('state'))
			                                    <span class="error" role="alert">
			                                        {{ $errors->first('state') }}
			                                    </span>
			                                @endif

										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>City</label>
											<div id="cityContainer">
												<select class="form-control" name="city">
													@foreach ($cities as $city)
													  <option {{ $city_id == $city->id ? "selected" : "" }} value="{{ $city->id }}">{{ $city->name }}</option>
													@endforeach
												</select>
											</div>

												@if ($errors->has('city'))
					                                    <span class="error" role="alert">
					                                        {{ $errors->first('city') }}
					                                    </span>
			                                    @endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Postal Code <samp>*</samp></label>
											<input type="text" name="pin" class="form-control" value="{{ $user->pin }}" />
											@if ($errors->has('pin'))
			                                    <span class="error" role="alert">
			                                        {{ $errors->first('pin') }}
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

								<input type="hidden" id="user_city_id" value="{{ $city_id }}">


								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<button type="submit" class="btn">Update</button>
										</div>
									</div>
									<div class="col-sm-6">
									</div>
								</div>

						</div>
					</div>
					<!-- end form-box -->
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
	                             		 	 h += '<select class="form-control" name="city">';
	                             		 	 var sel = '';
	                             		 	 var user_city_id = parseInt($.trim($("#user_city_id").val()));
	                             		 	 $.each(resp.cities, function(a, b) {
	                             		 	 	sel = (user_city_id == b.i) ? "selected"  : "" ;
	                             		 	 	h += '<option ' + sel + ' value="' + b.i + '">' + b.n + '</option>'
	                             		 	 });
	                             		 	 h += '</select>';
	                             		 	 $("#cityContainer").html(h);
	                             		 }

	                                  
	                             }
                         });

		 }


</script>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection