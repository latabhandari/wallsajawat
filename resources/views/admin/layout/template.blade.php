<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin Panel</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/font-awesome/css/font-awesome.min.css') }}" />
      <!-- Ionicons -->
      <link rel="stylesheet" href="{{ URL::asset('backend/theme/bower_components/Ionicons/css/ionicons.min.css') }}" />
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ URL::asset('backend/theme/dist/css/AdminLTE.min.css') }}" />
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{ URL::asset('backend/theme/dist/css/skins/_all-skins.min.css') }}" />
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.#4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
	  
   </head>
 
   <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
         <b>Admin Panel</b>
        </div>
        <div class="login-box-body">
             @yield('login')
        </div>
      
         <footer class="">
            <div class="pull-right hidden-xs">
               <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; </strong>{{ date('Y') }} All rights reserved.
         </footer>
      </div>

      <!-- jQuery 3 -->
      <script src="{{ URL::asset('backend/theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="{{ URL::asset('backend/theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

      @yield('pagejs')

   </body>
</html>

