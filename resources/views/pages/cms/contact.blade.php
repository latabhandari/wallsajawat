@extends('layouts.master')
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