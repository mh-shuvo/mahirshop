@extends('layouts.web')
@section('title','Contact')
@section('css')

@endsection
@section('content')
	
	<div class="container">
		{{-- <div class="row"> --}}
			      <!-- End header-->
				  <div class="ogami-breadcrumb">
					<div class="container">
					  <ul>
					  <li> <a class="breadcrumb-link" href="{{route('welcome')}}"> <i class="fas fa-home"></i>Home</a></li>
					  <li> <a class="breadcrumb-link active" href="{{route('contactus')}}">Contact us</a></li>
					  </ul>
					</div>
				  </div>
				  <!-- End breadcrumb-->
				  <div class="contact-us">
					<div class="container">
					  <div class="feature map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3023.6752502007657!2d-73.992009!3d40.725165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259851c1e9037%3A0x74407071825a96a4!2sCBGB!5e0!3m2!1sen!2sus!4v1395419817211"></iframe>
					  </div>
					  <div class="contact-method">
						<div class="row">
						  <div class="col-12 col-md-4">
							<div class="method-block"><i class="icon_pin_alt"></i>
							  <div class="method-block_text">
								<p>60-49 Road 11378 </p>
								<p>New York</p>
							  </div>
							</div>
						  </div>
						  <div class="col-12 col-md-4">
							<div class="method-block"><i class="icon_mail_alt"></i>
							  <div class="method-block_text">
								<p> <span>Phone:</span>60-49 Road 11378 </p>
								<p><span>Mail:</span>info.deercreative@gmail.com</p>
							  </div>
							</div>
						  </div>
						  <div class="col-12 col-md-4">
							<div class="method-block"><i class="icon_clock_alt"></i>
							  <div class="method-block_text">
								<p> <span>Week Days:</span>10:00 – 22:00</p>
								<p><span>Sunday:</span>Close</p>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					  <div class="leave-message">
						<h1 class="title">Leave Message</h1>
						<p>Our staff will call back later and answer your questions.</p>
						<form action="" method="post">
						  <div class="row">
							<div class="col-12 col-md-6">
							  <input class="no-round-input" type="text" placeholder="Name">
							</div>
							<div class="col-12 col-md-6">
							  <input class="no-round-input" type="email" placeholder="Email">
							</div>
							<div class="col-12">
							  <textarea class="textarea-form" name="" cols="30" rows="10" placeholder="Your message"></textarea>
							</div>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				  <!-- End contact us-->
				  <div class="partner">
					<div class="container">
					  <div class="partner_block d-flex justify-content-between" data-slick="{&quot;slidesToShow&quot;: 6}">
						<div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
						<div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
						<div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
						<div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
						<div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
						<div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
						<div class="partner--logo" href=""> <a href=""><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
					  </div>
					</div>
				  </div>
				  <!-- End partner-->
		{{-- </div> --}}
	</div>
@endsection
@section('js')

@endsection