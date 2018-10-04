<!DOCTYPE html>
<head>
<title>Untitled Document</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,intial-scale=1.0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width,initial-scale=1.0" name="viewport">


@yield('css')
@yield('js')
</head>
<body>
   
        @include('pages.include.top_head')
        @include('pages.include.header')
        
        @yield('content')
        
        @include('pages.include.footer')

        
	    <script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('build/assets/js/jquery.bxslider.min.js') }}" type="text/javascript"></script>
	    <script type="text/javascript" src="{{ asset('build/assets/js/easyzoom.js') }}"></script>

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
