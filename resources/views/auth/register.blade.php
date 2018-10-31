@extends('layouts.master')

@section('title', 'Register')

@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="https://lipis.github.io/bootstrap-social/bootstrap-social.css" rel="stylesheet" />
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
{!! NoCaptcha::renderJs() !!}
@endsection


@section('content')
<div class="register-page sec-padding">
<div class="container">
    <div class="row justify-content-center">

        <div class="col-sm-12 text-center">
            <div class="title measure-title">
                <ul class="navbar">
                    <li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li>{{ __('Register') }}</li>
                </ul>
            </div>
        </div>

        <div class="col-sm-6 col-sm-offset-3">
            <div class="card">
                  <div class="card-body">

                    <div class="form-group row">
                            
                               <div class="col-md-6 text-center">
                                       <a class="btn btn-block btn-social btn-facebook" href="{{ route('social_login', 'facebook') }}">
                                         <span class="fa fa-facebook"></span> Sign in with Facebook
                                       </a>
                                </div>

                                <div class="col-md-6 text-center">
                                       <a class="btn btn-block btn-social btn-google" href="{{ route('social_login', 'google') }}">
                                            <span class="fa fa-google"></span> Sign in with Google
                                       </a>
                                </div>

                    </div>

                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" />

                                @if ($errors->has('name'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" Placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                             <div class="col-md-12">
                                <input id="password" type="password" Placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" />

                                @if ($errors->has('password'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="error">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-4"></div>
    </div>
</div>
</div>
@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection