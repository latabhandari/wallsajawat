@extends('layouts.master')

@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
@endsection


@section('content')

<link href="https://lipis.github.io/bootstrap-social/bootstrap-social.css" rel="stylesheet">

<div class="container">

   <!-- <div class="btn-group btn-breadcrumb">
            <a href="{{ route('home.index') }}" class="btn btn-default"><i class="fa fa-home"></i></a>
            <a href="#" class="btn btn-default">Login</a>
    </div> -->


    <div class="row justify-content-center">

        <div class="col-sm-12 text-center">
            <div class="title measure-title">
                <h3>How to Measure</h3>
                <ul class="navbar">
                    <li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
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

                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autocomplete="off" />

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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
