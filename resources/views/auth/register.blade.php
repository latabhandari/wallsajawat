@extends('layouts.master')

@section('content')

@section('css')
  <link href="https://lipis.github.io/bootstrap-social/bootstrap-social.css" rel="stylesheet" />
@endsection
@section('js')
  {!! NoCaptcha::renderJs() !!}
@endsection

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">


                    <div class="form-grup">
                        <div class="col-md-12 text-center">
                           <div class="col-md-6 text-center">
                                   <a class="btn btn-block btn-social btn-facebook" href="{{ route('social_login', 'facebook') }}">
                                     <span class="fa fa-facebook"></span> Sign in with Facebook
                                   </a>
                                   <a class="btn btn-block btn-social btn-google" href="{{ route('social_login', 'google') }}">
                                        <span class="fa fa-google"></span> Sign in with Google
                                   </a>
                            </div>
                        </div>
                        
                    </div>

                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" />

                                @if ($errors->has('name'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" />

                                @if ($errors->has('email'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" />

                                @if ($errors->has('password'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="google-captcha" class="col-md-4 col-form-label text-md-right">{{ __('Captcha') }}</label>
                            <div class="col-md-6">
                                {!! NoCaptcha::display() !!}

                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="error">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
