<!DOCTYPE html>
<head>
<title>Untitled Document</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,intial-scale=1.0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width,initial-scale=1.0" name="viewport">


<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">


@yield('css')
@yield('js')
</head>
<body>
   
        @include('pages.include.top_head')
        @include('pages.include.header')
        
        @yield('content')
        
        @include('pages.include.footer')

        <script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('build/assets/js/jquery.bxslider.min.js') }}" type="text/javascript"></script>
	    <script>
	      $(document).ready(function() {
	             $('.bxslider').bxSlider({
	                                            minSlides: 1,
	                                            maxSlides: 3,
	                                            slideWidth: 400,
	                                            slideMargin: 30,
	                                            pager: true,
	                                            auto: true,
	                                            infiniteLoop: true
	                                    });
	       });
	    </script>
    
</body>
</html>
