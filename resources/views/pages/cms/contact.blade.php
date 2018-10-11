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