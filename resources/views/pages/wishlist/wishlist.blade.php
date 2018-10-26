@extends('layouts.master')

@section('title', 'Wishlist')

@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
<style>
  .imgb img {width:120px;height:120px}
</style>
@endsection

@section('content')

  <div class="main-container">
    <div class="container">
      <!-- start cart -->
      <div class="cart">
        <div class="row">
          <div class="col-sm-8">
            <h2>YOUR WISHLIST</h2>
          </div>
        </div>
        <!-- start cart-box -->

    @if(count($wishlists))
        <div class="cart-box">
          <div class="title">
            <div class="row">
              <div class="col-sm-2 hidden-xs">Image</div>
              <div class="col-sm-4 hidden-xs">Description</div>
              <div class="col-sm-2 hidden-xs">Item Price</div>
              <div class="col-sm-4 hidden-xs">Action</div>
            </div>
          </div>

          @foreach($wishlists as $row)
            @php
              $prod_image_info   = App\Helpers\MyHelper::getProductImage($row->id);
            @endphp

            <div class="cart-row">
              <div class="row">
                <div class="col-sm-2">
                  <div class="title hidden-md hidden-sm hidden-lg">
                    <h4>Image</h4>
                  </div>
                  <div class="imgb">
                    <img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" width="281" height="345" alt="{{ $row->name }}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="title hidden-md hidden-sm hidden-lg">
                    <h4>Description</h4>
                  </div>
                  <h5>{{ $row->name }}</h5>
                  <p>Sku: {{ $row->sku }}</p>
                </div>
                <div class="col-sm-2"><div class="title hidden-md hidden-sm hidden-lg">
                    <h4>Item Price</h4>
                  </div><i class="fa fa-inr">&nbsp;</i> {{ $row->price }}</div>
                <div class="col-sm-4"><div class="title hidden-md hidden-sm hidden-lg">
                    <h4>Action</h4>
                  </div>&nbsp;&nbsp;<a class="remove" style="margin-top:0px" onclick="return confirm('are you sure?');" href="{{ route('wishlist.remove', $row->random_string) }}"><button type="button" class="btn pull-left">Remove</button></a><a href="{{ route('product.detail', $row->slug) }}" title="Product Detail" class="btn pull-left">Detail</a></div>
              </div>
            </div>

       @endforeach

        </div>
    @else
        <div>Sorry, no product in your wishlist.</div>     
    @endif


      </div>
    </div>
</div>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection
