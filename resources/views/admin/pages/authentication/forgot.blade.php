@extends('admin.layout.template')
@section('login')
<style type="text/css" media="screen">
  .box-footer{border: none}
  .login-box-body, .register-box-body{padding:10px}
  h3, footer{margin-top: 10px}
</style>
               <!-- /.box-header -->

                @if ($errors->all())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p><i class="fa fa-exclamation-circle"></i> {{ $error }} </p>
                            @endforeach
                    </div>
                @endif
                    
                @if(Session::has('failure'))
                    <div class="alert-danger alert">
                      <p><i class="fa fa-exclamation-circle"></i> {{ Session::get('failure') }}</p>
                    </div>
                @endif

                @if(Session::has('success'))
                    <div class="alert-success alert">
                      <p><i class="fa fa-check"></i> Your New Password has been successfully sent</p>
                    </div>
                @endif

            <!-- form start -->

          <div class="login-box-body">
            {!! Form::open(['route' => 'admin.post.forgot', 'role' => 'form', 'autocomplete' => 'off', 'files' => true]) !!}
              
                <h3>Forgot Password</h3>
                <div class="form-group has-feedback">
                 <input class="form-control" id="email" name="email" placeholder="Email" type="text" value="{{ old('email') }}">
                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Submit</button>&nbsp;&nbsp;<a href="{{ route('admin.get.login') }}">Sign In</a>
                </div>
            
              {!! Form::close() !!}
           </div>
@stop