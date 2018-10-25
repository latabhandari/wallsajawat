@extends('layouts.master')

@section('title', 'Frequently Asked Questions')

@section('top_yield')
<link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('build/assets/css/jquery.bxslider.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="{{ asset('build/assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('build/assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/site.js') }}"></script>
@endsection

@section('content')
<div class="top-banner faq">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="title measure-title">
				<h3 class="paddingBottom20">FAQs</h3>
				<ul class="navbar">
					<li class="nobackground"><a href="{{ route('home.index') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href="">FAQs</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<div class="faq-header sec-padding-sm">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-header">

             <h2>Top 10 Customised Wallpaper FAQs:</h2>

             </div>
         </div>
     </div>
 </div>
</div>
<div class="list-block">
<div class="container">
  <div class="row">
	<div class="col-sm-8">
				
				<ul class="faq-list">
				<li>The surface of my wall is not flat. Can I still install wallpaper on it?</li>
				<li>Will my wall paint peel off or my walls get damaged when I remove the wallpaper?</li>
				<li>Can I get someone from Wall Sajawat to install the wallpaper at my home or office or workplace?</li>
				<li>Is there a minimum size / order quantity for custom wallpaper orders?</li>
				<li>I really liked one of your wallpaper designs, but I need a different size. What do I do?</li>
				<li>I want to go for Custom Size wallpaper. How do I calculate the size I require?</li>
				<li>Under what conditions can I return my wallpaper?</li>
				<li>Can I exchange my wallpaper for a new one?</li>
				<li>Can I clean my Wallpaper?</li>
				<li>Do you ship overseas?</li>
				</ul>	
	</div>
	<div class="col-sm-4">
		<div class="img-box">
			<img src="{{ asset('build/assets/images/faq.jpg') }}" alt="" class="img-responsive">
		</div>
	</div>




			</div>
		</div>
	</div>
	<div class="container">
				<p class="topborder paddingTop20 weight600"></p>
				<div class="panel-group" id="accordion">
			    	<div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">The surface of my wall is not flat. Can I still install wallpaper on it?</a>
			        	</h4>
					</div>
			      <div id="collapse1" class="panel-collapse collapse in">
			        <div class="panel-body">No. For best results, wallpapers are installed on absolutely flat/smooth surfaces. Therefore, we recommend that you choose a smooth surface for installing our customised wallpaper to avoid bumps and achieve a perfect finish.</div>
			      </div>
                 </div>

                 <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Will my wall paint peel off or my walls get damaged when I remove the wallpaper?</a>
			        	</h4>
					</div>
			      <div id="collapse2" class="panel-collapse collapse">
			        <div class="panel-body">In most cases, your wall will not get damaged. However, we cannot guarantee the condition of your wall surface before you apply the wallpaper. Wall Sajawat will not take any responsibility for any damage that occurs while removing the wallpaper or paint touch-ups that might be required.</div>
			      </div>
                 </div>
			     
			     <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Can I get someone from Wall Sajawat to install the wallpaper at my home or office or workplace?</a>
			        	</h4>
					</div>
			      <div id="collapse3" class="panel-collapse collapse ">
			        <div class="panel-body">Sure! We offer installation service within 48 hours in Delhi-NCR at a nominal charge.</div>
			      </div>
                 </div>

                 <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Is there a minimum size / order quantity for custom wallpaper orders?</a>
			        	</h4>
					</div>
			      <div id="collapse4" class="panel-collapse collapse">
			        <div class="panel-body">Yes, the minimum customised wallpaper size we accept is 40 Sq. Ft.</div>
			      </div>
                 </div>

                 <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">I really liked one of your wallpaper designs, but I need a different size. What do I do?</a>
			        	</h4>
					</div>
			      <div id="collapse5" class="panel-collapse collapse">
			        <div class="panel-body">No problem! You can customize the size of any existing wallpaper design to suit your requirements by following these steps:
			    <ul class="paddingBottom20">
					<li>Select the wallpaper design from our website.</li>
					<li>Go to the Custom Size option.</li>
					<li>Fill-in the required Width and Height of the wallpaper.</li>
					<li>Since the Height and Width ratio of the size you entered is different than our original image, you need to crop the image to decide the actual part of the image that you would like us to print.</li>
					<li>To Crop the image, Move the crop box on the wallpaper design by dragging with your mouse.</li>
					<li>You can also Re-size the crop box by dragging the small corner squares.</li>
					<li>Preview of the re-sized image before confirming your order.</li>
					<li>If you are happy with what you see, continue to place your order to print.</li>
					<li>If you want to re-size your wallpaper again, you will be prompted to go back to Step 5 above.</li>
				</ul>
			        </div>
			      </div>
                 </div>
   				
   				 <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">I want to go for a Custom Size wallpaper. How do I calculate the size I need ?</a>
			        	</h4>
					</div>
			      <div id="collapse6" class="panel-collapse collapse">
			        <div class="panel-body">Don’t worry! Simply calculate the measurement of your wall/area where you wish to install a wallpaper. Provide us with the measurements in cm, inch or foot and leave the rest to us. We will convert your measurements into Sq Ft and let you know the exact Custom Size of wallpaper you need. For more information on how to get the precise measurements of your wall, please refer to the “How to Measure" section on our website.</div>
			      </div>
                 </div>

             <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Under what conditions can I return my wallpaper?</a>
			        	</h4>
					</div>
			      <div id="collapse7" class="panel-collapse collapse">
			        <div class="panel-body">You may return your wallpaper in case of:
			     <ul>
						<li>Damaged or tampered packaging at the time of receipt. Please DO NOT accept your order in such cases and ask the courier executive to take it back. Additionally, please inform us about the situation via email so that we can take corrective action at the earliest.</li>
						<li>If the wallpaper you receive is incorrect or does not match the specifications (in terms of size and design) provided by you. In this case you need to:
					<ul>
						<li>Inform our customer care about the discrepancy via email within 24 hours of order receipt.</li>
						<li>Email us a photo-proof of the discrepancy in your order within 24 hours.</li>
						<li>Send us back the order in its original shipping package within 5 working days. Please note that you need to bear the cost of shipping the damaged/incorrect/defective wallpaper back to us.</li>
					</ul>
				</li>
				</ul>
				<p>For more details, please read our <a href="#">Return Policy.</a></p>
			        </div>
			      </div>
                 </div>

              <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Can I exchange my wallpaper for a new one?</a>
			        	</h4>
					</div>
			      <div id="collapse8" class="panel-collapse collapse">
			        <div class="panel-body">We offer an exchange only if your order is incorrect or defective (does not match your specifications in terms of size or design). In such cases, we will resend a fresh order to you. For more information on order exchange, please read our Return Policy.</div>
			      </div>
                 </div>


                 <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Can I clean my Wallpaper?</a>
			        	</h4>
					</div>
			      <div id="collapse9" class="panel-collapse collapse">
			        <div class="panel-body">Yes, you can clean your customised wallpaper with a damp sponge dipped into a solution of water and mild soapy cleaning detergent. Avoid excessive scrubbing or using harsh chemical-based detergents that may damage the surface of your wallpaper.</div>
			      </div>
                 </div>
               

                <div class="panel panel-default">
			      	<div class="panel-heading">
			        	<h4 class="panel-title">
			          	  <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Do you ship overseas?</a>
			        	</h4>
					</div>
			      <div id="collapse9" class="panel-collapse collapse">
			        <div class="panel-body">Yes, we do – to USA, UK, Middle East and the Far East, but shipping charges would be extra.</div>
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