<!DOCTYPE>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Interior Xpression</title>
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('build/assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{ asset('build/assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
</head>
<body>
    <div class="container">
        @include('pages.include.top_head')
        @include('pages.include.header')
        
        <div class="content">
            @yield('content')
        </div>
        
        @include('pages.include.footer')
    </div>
</body>
</html>
