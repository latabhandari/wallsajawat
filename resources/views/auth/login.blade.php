@extends('layouts.master')

@section('title', 'Login')

@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
<style type="text/css" media="screen">
.clrwht{color:#ffdb50}
</style>
@endsection


@section('content')

<link href="https://lipis.github.io/bootstrap-social/bootstrap-social.css" rel="stylesheet">
<div class="login-page sec-padding">

<div class="container">

   <!-- <div class="btn-group btn-breadcrumb">
            <a href="{{ route('home.index') }}" class="btn btn-default"><i class="fa fa-home"></i></a>
            <a href="#" class="btn btn-default">Login</a>
    </div> -->


    <div class="row justify-content-center">

        <div class="col-sm-12 text-center">
            <div class="title measure-title">
                <ul class="navbar">
                    <li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li>{{ __('Login') }}</li>
                </ul>
            </div>
        </div>

        <div class="col-sm-6 col-sm-offset-3">
            <div class="card">
                <div class="card-body" style="">
                    @php
                        $redirect_url = Request::get('redirect_url');
                        if ($redirect_url)
                        echo "<p class='clrchk'><i class=\"fa fa-check\" aria-hidden=\"true\"></i>&nbsp;&nbsp;You need to signin or signup to proceed the checkout</p>";
                    @endphp

                    <form method="POST" action="{{ route('login'). '?' . Request::server('QUERY_STRING') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            
                               <div class="col-md-6">
                                       <a class="btn btn-block btn-social btn-facebook" href="{{ route('social_login', 'facebook'). '?' . Request::server('QUERY_STRING')  }}">
                                         <span class="fa fa-facebook"></span> Sign in with Facebook
                                       </a>
                                </div>
                         
                           
                                <div class="col-md-6">
                                       <a class="btn btn-block btn-social btn-google" href="{{ route('social_login', 'google'). '?' . Request::server('QUERY_STRING')  }}">
                                            <span class="fa fa-google"></span> Sign in with Google
                                       </a>
                                </div>
                            </div>
                            </div>

                                

                            
                     

                    

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email Address" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autocomplete="off" />

                                @if ($errors->has('email'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                        
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" />

                                @if ($errors->has('password'))
                                    <span class="error" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                                <div class="col-md-6">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
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