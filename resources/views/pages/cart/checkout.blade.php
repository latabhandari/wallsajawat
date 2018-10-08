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
		<!-- start checkout -->
		<div class="checkout">
			<div class="row">
				<div class="col-sm-8">
					<h2>Secure Checkout</h2>
					<!-- start form-box -->
					<div class="form-box">
						<div class="sub-heading">
							<h3><span>1</span> Shipping</h3>
						</div>
						<div class="form">
							<form action="#">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>First Name <samp>*</samp></label>
											<input type="text" class="form-control" value="{{ $user->name }}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Address Line<samp>*</samp></label>
											<input type="text" class="form-control" value="">
										</div>
									</div>
								</div>
						
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>City <samp>*</samp></label>
											<input type="text" class="form-control" >
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Region</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Postal Code <samp>*</samp></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Country <samp>*</samp></label>
											<select class="form-control">
												<option>Country</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Phone Number <samp>*</samp></label>
											<input type="text" class="form-control" value="{{ $user->mobile }}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Email Address <samp>*</samp></label>
											<input type="text" class="form-control" {{ $user->email }}>
										</div>
									</div>
								</div>
								
							</form>
						</div>
					</div>
					<!-- end form-box -->
					<!-- start form-box -->
					<div class="form-box">
						<div class="sub-heading">
							<h3><span>2</span> Billing & Payment</h3>
						</div>
						<div class="form">
							<h5>Payment Method</h5>
							<div class="form-group">
								<label><input type="checkbox" name=""> My billing address is the same as my shipping address</label>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label class="card-info">
											<input type="radio" name="">
											<img src="images/visa.gif" width="37" height="23" alt="visa">
											<img src="images/mastercard.gif" width="37" height="23" alt="mastercard">
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Card Number <samp>*</samp></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Expiration Date <samp>*</samp></label>
										<div class="row">
											<div class="col-sm-4 padding-right-none">
												<input type="text" class="form-control">		
											</div>
											<div class="col-sm-8">
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end form-box -->
				</div>
				<div class="col-sm-4">
					<div class="rightcol-fixed">
						<div class="add-coupon">
							<h5>Redeem a coupon or promotion</h5>
							<label>Enter the code below and click Apply</label>
							<div class="row">
								<div class="col-sm-8">
									<input type="text" class="form-control">
								</div>
								<div class="col-sm-4 padding-left-none">
									<input type="submit" value="Apply" class="btn btn-block">
								</div>
							</div>
						</div>
						<!-- start order-summary -->
						<div class="order-summary">
							<table>
								<tr>
									<td>Items:</td>
									<td class="text-right"><i class="fa fa-inr"> {{ Cart::total() }}</td>
								</tr>
								<tr>
									<td>Shipping:</td>
									<td class="text-right">INR 2,124</td>
								</tr>
								<tr>
									<td>Duties & Taxes:</td>
									<td class="text-right">INR 1,739</td>
								</tr>
								<tr class="total">
									<td>Order Total:</td>
									<td class="text-right">INR 6,619</td>
								</tr>
							</table>
							<div class="row">
								<div class="col-sm-12">
									<a href="order-details.html" class="btn btn-block">Submit Order</a>
								</div>
							</div>
						</div>
						<!-- end order-summary -->
					</div>
				</div>
			</div>
		</div>
		<!-- end checkout -->
	</div>
</div>

@endsection