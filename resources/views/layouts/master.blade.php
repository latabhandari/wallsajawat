<!DOCTYPE html>
<head>
<title>Untitled Document</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,intial-scale=1.0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width,initial-scale=1.0" name="viewport">
@yield('top_yield')
</head>
<body>
   
        @include('pages.include.top_head')
        @include('pages.include.header')
        
        @yield('content')
        
        @include('pages.include.footer')

        @yield('bottom_yield')
        
	    
    
</body>
</html>
