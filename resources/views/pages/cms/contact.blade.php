@extends('layouts.master')

@section('content')

<div class="container">
  
     <form method="POST" action="{{ route('contactpost') }}" aria-label="{{ __('Contact') }}">
     	@csrf

     	<div class="form-group">
		    <label for="name">Name </label>
		    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
		    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
		  </div>

		  <div class="form-group">
		    <label for="email">Email </label>
		    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
		    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
		  </div>
		  <div class="form-group">
		    <label for="msg">Msg:</label>
		    <textarea class="form-control" id="text" name="msg" cols="10">{{ old('msg') }}</textarea>
		    @if ($errors->has('msg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('msg') }}</strong>
                                    </span>
                                @endif

		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
	 </form>

</div>
@endsection
