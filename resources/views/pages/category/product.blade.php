@extends('layouts.master')

@section('top_yield')
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
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
              <h1>Cascade Classic</h1>
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
        <h4>View Entire Collection<span class="caret"></span></h4>
        </a> </div>
    </div>
  </div>
</div>

<div class="container selling-img-sec">
  <div class="row">
    <div class="col-sm-12 text-left selling-img-heading">
      <h4>AVAILABLE DESIGNS(61)</h4>
    </div>
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-3 text-center selling-imgs"> <img src="Images/Product4.jpg" alt="">
          <div class="img-price"> <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;10,249/roll</span> <span class="righttxt"><i class="fa fa-share-alt"></i><i class="fa fa-star"></i></span> </div>
        </div>
        <div class="col-sm-3 text-center selling-imgs"> <img src="Images/Product5.jpg" alt="">
          <div class="img-price"> <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;10,249/roll</span> <span class="righttxt"><i class="fa fa-share-alt"></i><i class="fa fa-star"></i></span> </div>
        </div>
        <div class="col-sm-3 text-center selling-imgs"> <img src="Images/Product6.jpg" alt="">
          <div class="img-price"> <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;10,249/roll</span> <span class="righttxt"><i class="fa fa-share-alt"></i><i class="fa fa-star"></i></span> </div>
        </div>
        <div class="col-sm-3 text-center selling-imgs"> <img src="Images/Product7.jpg" alt="">
          <div class="img-price"> <span class="lefttxt"><i class="fa fa-inr"></i>&nbsp;&nbsp;10,249/roll</span> <span class="righttxt"><i class="fa fa-share-alt"></i><i class="fa fa-star"></i></span> </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection