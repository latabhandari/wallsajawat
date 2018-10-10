@extends('layouts.master')

@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
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
          <div class="col-sm-4">
            <a href="checkout.html" title="Proceed to Checkout" class="btn pull-right">Proceed to Checkout</a>
          </div>
        </div>
        <!-- start cart-box -->
        <div class="cart-box">
          <div class="title">
            <div class="row">
              <div class="col-sm-2">Product</div>
              <div class="col-sm-4">Description</div>
              <div class="col-sm-2">Item Price</div>
              <div class="col-sm-2">Quantity</div>
              <div class="col-sm-2">Total</div>
            </div>
          </div>
          <div class="cart-row">
            <div class="row">
              <div class="col-sm-2">
                <div class="imgb">
                  <img src="images/product/img_product_detail1.jpg" width="281" height="345" alt="product">
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Men's BN Threadborne Run Mesh Singlet</h5>
                <p>Sku: 1299528-008-SM</p>
                <p>Size: Small</p>
                <p>Color: STEALTH GRAY / Black</p>
              </div>
              <div class="col-sm-2">INR 2,756.12</div>
              <div class="col-sm-2">
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
                <a href="#" class="remove">Remove</a>
              </div>
              <div class="col-sm-2">INR 2,756.12</div>
            </div>
          </div>
          <div class="subtotal">
            <div class="row">
              <div class="col-sm-10 text-right">
                <span>Subtotal</span>
              </div>
              <div class="col-sm-2">
                INR 2,756.12
              </div>
            </div>
          </div>
        </div>
        <!-- end cart-box -->
        <div class="row">
          <div class="col-sm-6">
            <a href="product-listing.html" title="Continue Shopping" class="back-link"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Continue Shopping</a>
          </div>
          <div class="col-sm-6">
            <a href="checkout.html" title="Proceed to Checkout" class="btn pull-right">Proceed to Checkout</a>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection
