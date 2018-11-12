@extends('layouts.master')

@section('title', 'All Categories')

@section('top_yield')
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/jquery.validate.min.js') }}"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />

@endsection

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 product-banner">
      <div class="row">
        <div class="col-sm-8"> </div>
        <div class="col-sm-4 product-info">
          <div class="row">
            <div class="col-sm-12">
              <h1>All Categories</h1>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="entire-sec text-center">
        <h2>View All Categories ({{ count($categories) }})</h2>
      </div>
    </div>
  </div>
</div>

<div class="container selling-img-sec">
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        @if(count($categories))
          @foreach ($categories as $category)
              <div class="col-sm-3 text-center selling-imgs"> 
                <div class="box-inner">
                  <a href="{{ route('category.product', $category->slug) }}"><img src="{{ asset('catalog/category/'.$category->wallpaper_image) }}" alt=""></a>
                 <div class="img-price ctgry">{{ $category->name }}</div>
               </div>
              </div>
          @endforeach
        @else
                <p style="padding:0 0 0 15px">Sorry no category found.!</p>
        @endif

      </div>
    </div>
  </div>
</div>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection