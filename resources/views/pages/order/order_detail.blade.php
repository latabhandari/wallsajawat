@extends('layouts.master')

@section('title', 'Cart')

@section('top_yield')
<link href="{{ asset('build/assets/css/easyzoom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
@endsection

@section('content')

<div class="container">
	<div class="row">
	
		<div class="col-sm-12">
			<div class="title measure-title">
				<ul class="navbar orderul">
					<li><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li class="weight600">Your Orders</li>
				</ul>
			</div>
		</div>
		<!---->
		
		<div class="col-sm-6 paddingBottom20">
			<div class="order-heading">
				<h2 class="weight600 marginZero">Your Orders</h2>
			</div>
		</div>
		<div class="col-sm-6 paddingBottom20">
			<div class="order-search-sec">
				<div class="row">
					<div class="col-sm-9">
						<div class="col-auto">
							<i class="fa fa-search h4 text-body"></i>
						</div>
						<div class="order-search">
							<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search all orders">
						</div>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-lg search-btn-custom" type="submit">Search orders</button>
					</div>
				</div>
			</div>
		</div>
		<!---->
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="Dashboard" role="tabpanel">
					<div class="row">
						<div class="col-sm-12 paddingLeftRght0">
							<div class="collapse navbar-collapse marginBottom20 paddingLeftRght0" id="mynavbar">
								<ul class="nav nav-tabs " id="dashboards-tabs" role="tablist">
									<li class="nav-item active">
										<a class="nav-link" id="dashboard1-tab" data-toggle="tab" href="#Dashboard1" role="tab">Orders</a>
									</li>
					
									<li>
										<a class="nav-link" id="dashboard2-tab" data-toggle="tab" href="#Dashboard2" role="tab">Cancelled Orders</a>
									</li>
								</ul>
							</div>
						</div>
						<!---->
						
						<div class="tab-content">
							<div class="tab-pane fade active in" id="Dashboard1" role="tabpanel">
								<div class="col-sm-12">
									<div class="placed-order-count">
										<h5><span class="weight600">{{ count($orders) }} order</span> placed in</h5>
									</div>
								</div>

								@foreach ($orders as $order)

								<div class="col-sm-12">
									<div class="row ">
										<div class="order-head">
											<div class="col-sm-4 paddingLeftRght0">
												<div class="order-date-sec">
													<div class="col-sm-6">
														<p class="marginZero">ORDER PLACED</p>
														<p class="placed-date">{{ date('D, j M\'y H:i', $order->unix_timestamp) }}</p>
													</div>
													<div class="col-sm-6">
														<p class="marginZero">TOTAL</p>
														<p class="placed-amount"><i class="fa fa-inr" aria-hidden="true"></i> {{ $order->payable_amount }}</p>
													</div>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="order-name-sec">
													<div class="col-sm-8">
														<p class="marginZero">SHIP TO</p>
														<p class="user-order-name">{{ App\Helpers\MyHelper::getCustomerShippingAddress($order->id) }}</p>
													</div>
													<div class="col-sm-4 text-right paddingLeftRght0">
														<div class="row">
															<div class="col-sm-12">
																<p class="order-no marginZero">ORDER # {{ $order->order_number }}</p>
															</div>
															
															<div class="col-sm-12">
																<p class="order-details-txt col-sm-6 paddingLeftRght0 text-center">Order details</p>
																<p class="order-invoice-txt col-sm-6 paddingLeftRght0">Invoice No. XXX </p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="row">
										<div class="order-main-body">
										@php
											$order_products = App\Helpers\MyHelper::getOrderProducts($order->id);
										@endphp

										@foreach ($order_products as $product)

										@php
										  $prod_image_info = App\Helpers\MyHelper::getProductImage($product->id);
										  $product_info    = App\Helpers\MyHelper::getProductInfo($product->id, ['short_desc']);
										  dd($product_info);
										  $dimension       = json_decode($product->dimension);
										@endphp


											<div class="row">
												<div class="col-sm-12">
													<h4>Delivered XX-Apr-2018</h4>
												</div>
												<div class="col-sm-12">
													<p class="order-status">Your package was delivered</p>
												</div>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-3">
															<div class="order-img">
																<img src="{{ asset('catalog/product/'.$prod_image_info->image) }}" alt=""/>
															</div>
														</div>
														<div class="col-sm-9 order-desc">
															<div>
																<h4 class="order-product-title col-sm-12">
																	{{ $product->name }}
																</h4>
															</div>
															<div>
																<h5 class="col-sm-3 paddingRght0">Quantity</h5><span class="col-sm-1 paddingTop10">:</span><div class="wallpaper-quantity col-sm-8">{{ $product->qty }}</div>
															</div>

															<div>
																<h5 class="col-sm-3 paddingRght0">Size (Width x Height)</h5><span class="col-sm-1 paddingTop10">:</span><div class="wallpaper-size col-sm-8">{{ $dimension->width }} {{ $dimension->name }} x {{ $dimension->height }} {{ $dimension->name }}</div>
															</div>
															
															<div>
																<h5 class="col-sm-3 paddingRght0">Description</h5><span class="col-sm-1 paddingTop10">:</span><div class="wallpaper-material col-sm-8">{{ $product_info['short_desc'] }}</div>
															</div>	
															<h4 class="placed-amount col-sm-12"><i class="fa fa-inr" aria-hidden="true"></i> 999</h4>
															<div class="col-sm-12 ">
																<button class="btn buyagain-btn" type="submit">Buy it again</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-3 order-buttons">
													<div class="row">
														<div class="col-sm-12 paddingLeftRght0">
															<button class="btn askproduct-btn" type="submit"><a href="">Refund/ Replace Order</a></button>
														</div>
														
														<div class="col-sm-12 paddingLeftRght0 overhidden">
															<button class="btn reviewproduct-btn" type="submit"><a href="">Write a product review</a></button>
														</div>
													</div>
												</div>
											</div>

											@endforeach


										</div>
									</div>
								</div>
							@endforeach


							</div>
							<!---->
							<div class="tab-pane fade" id="Dashboard2" role="tabpanel">
								<!--<div class="cancelled-order-sec text-center paddingTop20 paddingBottom20">
									<h4>We aren't finding any cancelled orders. <a href="">View all orders</a></h4>
								</div>-->
																<div class="col-sm-12">
									<div class="placed-order-count">
										<h5><span class="weight600">1 order</span> Cancelled</h5>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="row ">
										<div class="order-head">
											<div class="col-sm-4 paddingLeftRght0">
												<div class="order-date-sec">
													<div class="col-sm-6">
														<p class="marginZero">ORDERED PLACED</p>
														<p class="placed-date">xx April 2018</p>
													</div>
													<div class="col-sm-6">
														<p class="marginZero">TOTAL</p>
														<p class="placed-amount"><i class="fa fa-inr" aria-hidden="true"></i> 999</p>
													</div>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="order-name-sec">
													<div class="col-sm-8">
														<p class="marginZero">CANCELLED BY</p>
														<p class="user-order-name">xyz &nbsp; &nbsp; &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></p>
													</div>
													<div class="col-sm-4 text-right paddingLeftRght0">
														<div class="row">
															<div class="col-sm-12">
																<p class="order-no">ORDER # XXX-XXXXXXX-XXXXXXX</p>
															</div>
															<div class="col-sm-2"></div>
															<div class="col-sm-10">
																<p class="order-details-txt col-sm-6 paddingLeftRght0">Order details</p>
																<p class="order-invoice-txt col-sm-6 paddingLeftRght0">Invoice &nbsp; &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="row">
										<div class="order-main-body">
											<div class="row">
												<div class="col-sm-12">
													<h4>Delivered XX-Apr-2018</h4>
												</div>
												<div class="col-sm-12">
													<p class="order-status">Your package was delivered</p>
												</div>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-3">
															<div class="order-img">
																<img src="Images/Product6.jpg" alt="">
															</div>
														</div>
														<div class="col-sm-9 order-desc">
															<div>
																<h4 class="order-product-title col-sm-12">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit..
																</h4>
															</div>
															<div>
																<h5 class="col-sm-3 paddingRght0">Quantity</h5><span class="col-sm-1 paddingTop10">:</span><div class="wallpaper-quantity col-sm-8">XX</div>
															</div>

															<div>
																<h5 class="col-sm-3 paddingRght0">Size (Width x Height)</h5><span class="col-sm-1 paddingTop10">:</span><div class="wallpaper-size col-sm-8">12 Feet x 12 Feet</div>
															</div>
															
															<div>
																<h5 class="col-sm-3 paddingRght0">Description</h5><span class="col-sm-1 paddingTop10">:</span><div class="wallpaper-material col-sm-8">Matt Finish Wallpaper</div>
															</div>	
															<h4 class="placed-amount col-sm-12"><i class="fa fa-inr" aria-hidden="true"></i> 999</h4>
															<div class="col-sm-12 ">
																<button class="btn buyagain-btn" type="submit">Buy it again</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-3 order-buttons">
													<div class="row">
														<div class="col-sm-12 paddingLeftRght0 width100">
															<button class="btn cancelled-btn" type="submit"><a href=""> Cancelled Order</a></button>
														</div>		
														<div class="cancelled-date text-center">
															<h5 class="paddingTop20" style="display:inline-block; width:100%;">Cancelled on:<span> XX XX XXXX</span></h5><h5>
														</h5></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('bottom_yield')
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
@endsection