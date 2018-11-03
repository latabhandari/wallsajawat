@extends('layouts.master')

@section('title', $category_info->name)

@section('top_yield')
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/jquery.validate.min.js') }}"></script>
<meta name="keywords" content="{{ $category_info->meta_keywords }}" />
<meta name="description" content="{{  $category_info->meta_description }}" />
<style type="text/css" media="screen">

.social_containter {
  display:flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  filter:url('#goo');
}

.button {
  z-index: 99;
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 150px;
  height: 40px;
  background: linear-gradient(45deg, #B388EB, #8093F1);
  border-radius: 20px;
  color: #FFF;
  font-size: 20px;
  letter-spacing: 1px;
  font-weight: 200;
}

.social {
  opacity: 0;
  position: relative;
  margin: 8px;
  width: 40px;
  height: 40px;
  border-radius: 100%;
  display: inline-block;
  color: #FFF;
  font-size: 20px;
  text-align: center;
  i {
   margin-top: 10px;
  }
  
  a {
    color: #FFF;
  }
}

.twitter {
  background: #00aced;
}

.facebook {
  background: #3b5998;
}

.google {
  background: #dd4b39;
}

.youtube {
  background: #bb0000;
}

.clicked {
  opacity: 1;
  transition: 1.2s all ease;
  transform: translateY(56px);
}
  
</style>

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
              <h1>{{ $category_info->name }}</h1>
            </div>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-3"> <span class="rightbannertxt"><i class="fa fa-share-alt"></i></span></div>
          				<div class="col-sm-8">
          					<div class="productpg-info-main">
          						<p>Fusce eu tellus hendrerit, pellentesque nunc eget, tempus justo. Suspendisse in diam purus. Mauris fringilla ante finibus enim sodales feugiat. </p>	
          					</div>
          				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="entire-sec text-center"> <a href="">
        <h2>View Entire Collection<span class="caret"></span></h2>
        </a> </div>
    </div>
  </div>
</div>

<div class="container selling-img-sec">
  <div class="row">
    <div class="col-sm-12 text-left selling-img-heading">
      <h4>AVAILABLE DESIGNS({{ count($products) }})</h4>
    </div>
    <div class="col-sm-12">
      <div class="row">
        @if(count($products))
          @foreach ($products as $product)
              @php
                        $prod_image_info = App\Helpers\MyHelper::getProductImage($product->id);
              @endphp

              <div class="col-sm-3 text-center selling-imgs"> 
                <div class="box-inner">
                  <a href="{{ route('product.detail', $product->slug) }}"><img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" alt=""></a>
                 <div class="img-price"> <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;{{ $product->price }} /roll</span> 

                  <span class="righttxt"><i class="fa fa-share-alt"></i>

                  <div class="social_containter" style="display: none">
                    <span class="need-share-button_dropdown need-share-button_dropdown-middle-right" style="margin-top: -20px;"><span class="need-share-button_link need-share-button_mailto" data-network="mailto"></span><span class="need-share-button_link need-share-button_twitter" data-network="twitter"></span><span class="need-share-button_link need-share-button_pinterest" data-network="pinterest"></span><span class="need-share-button_link need-share-button_facebook" data-network="facebook"></span><span class="need-share-button_link need-share-button_googleplus" data-network="googleplus"></span><span class="need-share-button_link need-share-button_linkedin" data-network="linkedin"></span></span>
                  </div>




                  <a href="javascript:void(0)" class="addwishlist" data-attr="{{ $product->id }}"><i class="fa fa-star"></i></a></span> </div>
               </div>
              </div>
          @endforeach
        @else
                <p style="padding:0 0 0 15px">Sorry no product found.!</p>
        @endif

      </div>
    </div>
  </div>
</div>

@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection