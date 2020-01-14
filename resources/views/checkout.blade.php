@extends('layouts.web')
@section('title','Checkout')
@section('css')

@endsection
@section('content')

<main id="mt-main">
    <section class="mt-contact-banner mt-banner-22 wow fadeInUp" data-wow-delay="0.4s" style="background-image: url('{{asset("public/frontend/images/shoping_cart.jpg")}}');">
	<div class="container">
	<div class="row">
	<div class="col-xs-12">
	<h1 class="text-center">CHECK OUT</h1>
	<!-- Breadcrumbs of the Page -->
	<nav class="breadcrumbs">
		<ul class="list-unstyled">
			<li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
			<li>Check Out</li>
		</ul>
	</nav>
	<!-- Breadcrumbs of the Page end -->
</div>
</div>
</div>
</section>
<!-- Mt Process Section of the Page -->
<div class="mt-process-sec wow fadeInUp" data-wow-delay="0.4s">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
                <!-- Process List of the Page -->
                <ul class="list-unstyled process-list">
					<li class="active">
						<span class="counter">01</span>
						<strong class="title">Shopping Cart</strong>
					</li>
					<li class="active">
						<span class="counter">02</span>
						<strong class="title">Check Out</strong>
					</li>
					<li>
						<span class="counter">03</span>
						<strong class="title">Order Complete</strong>
					</li>
				</ul>
                <!-- Process List of the Page end -->
			</div>
		</div>
	</div>
</div><!-- Mt Process Section of the Page end -->
<!-- Mt Detail Section of the Page -->
<section class="mt-detail-sec toppadding-zero wow fadeInUp" data-wow-delay="0.4s">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<h2>BILLING DETAILS</h2>
				<!-- Bill Detail of the Page -->
				<form method="post" action="{{route('cart.submit')}}" id="CheckoutForm">
					{{ @csrf_field() }}
					<fieldset>
						<div class="form-group">
                            <label for="delivery_type">SHIPPING TYPE <sup>*</sup></label>
                            <select id="delivery_type" class="form-control" name="delivery_type">
                                <!--option value="">Select Delivery Type</option>
								<option value="cod">Cash on Delivery</option-->
                                <option value="self">Self</option>
							</select>
						</div>
						@role('dealer')
						<div class="form-group">
                            <label for="delivery_from">DELIVERY FROM <sup>*</sup></label>
                            <select id="delivery_from" class="form-control" name="delivery_from">
                                <option value="">Select Shipping Type</option>
                                <option value="company">Office</option>
							</select>
						</div>
						@else
                        <div class="form-group">
                            <label for="delivery_from">DELIVERY FROM <sup>*</sup></label>
                            <select id="delivery_from" class="form-control" name="delivery_from">
                                <option value="">Select Shipping Type</option>
                                <option value="company">Office</option>
                                <option value="dealer">Dealar</option>
                                <option value="user">Home Delivery</option>
							</select>
						</div>
                        <div class="dealer_section hide">
                            <div class="form-group">
                                <label for="dealer_district">DEALER DISTRICTS <sup>*</sup></label>
                                <select id="dealer_district" class="form-control" name="dealer_district">
                                    <option value="">Select DISTRICTS</option>
                                    @foreach($dealersDistricts as $dealersDistrict)
                                    <option value="{{$dealersDistrict->id}}">{{$dealersDistrict->name}}</option>
                                    @endforeach
								</select>
							</div>
							
							<div class="form-group dealerUpazila hide">
                                <label for="dealer_upazila">DEALER THANA <sup>*</sup></label>
                                <select id="dealer_upazila" class="form-control" name="dealer_upazila">
                                    <option value="">Select Thana</option>
								</select>
							</div>
							
							<div class="form-group dealerUnion hide">
                                <label for="dealer_union">DEALER UNION <sup>*</sup></label>
                                <select id="dealer_union" class="form-control" name="dealer_union">
                                    <option value="">Select Union</option>
								</select>
							</div>
							
                            <div class="form-group">
                                <label for="dealer_list">DEALER LIST <sup>*</sup></label>
                                <select id="dealer_list" class="form-control" name="dealer_list">
                                    <option value="">Select Dealer List</option>
								</select>
							</div>
                            <div class="dealer_info hide">
                                <div class="form-group">
                                    <label for="dealer_name">DEALER NAME</label>
                                    <p id="dealer_name"></p>
								</div>
                                <div class="form-group">
                                    <label for="dealer_phone">DEALER PHONE</label>
                                    <p id="dealer_phone"></p>
								</div>
                                <div class="form-group">
                                    <label for="dealer_address">DEALER ADDRESS</label>
                                    <p id="dealer_address"></p>
								</div>
							</div>
						</div>
						@endrole
						<div class="office_section hide">
							@foreach($dealers as $dealer)
							@if($dealer->dealer_type == 'company')
							<div class="form-group">
								<label for="office_name">Name <sup>*</sup></label>
								<p id="office_name">{{$dealer->User->name}}</p>
							</div>
							<div class="form-group">
								<label for="office_phone">Phone <sup>*</sup></label>
								<p id="office_phone">{{$dealer->User->phone}}</p>
							</div>
							<div class="form-group">
								<label for="office_address">Address <sup>*</sup></label>
								<p id="office_address">{{$dealer->User->address}}</p>
							</div>
							@endif
							@endforeach
							
						</div>
						<div class="user_section hide">
							<div class="form-group">
								<label for="state">DISTRICTS <sup>*</sup></label>
								<select id="state" class="form-control" name="state">
									<option value="">Districts</option>
									@foreach($districts as $district)
									<option value="{{$district['id']}}">{{$district['name']}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="user_name">Name <sup>*</sup></label>
								<input type="text" id="user_name" name="user_name" class="form-control form-control-sm" value="{{Auth()->User()->name}}" placeholder="Name">
							</div>
							<div class="form-group">
								<label for="user_phone">Phone <sup>*</sup></label>
								<input type="text" id="user_phone" name="user_phone" value="{{Auth()->User()->phone}}" class="form-control form-control-sm" placeholder="Phone">
							</div>
							<div class="form-group">
								<label for="user_address">Address <sup>*</sup></label>
								<textarea id="user_address" name="user_address" class="form-control" placeholder="Address">{{Auth()->User()->address}}</textarea>
							</div>
							<div class="form-group">
								<label for="post_code">Postcode <sup>*</sup></label>
								<input type="text" id="post_code" name="post_code" class="form-control form-control-sm" placeholder="Post Code">
							</div>
						</div>
						<div class="form-group">
							<textarea class="form-control" placeholder="Order Notes"></textarea>
						</div>
					</fieldset>
					<!-- Bill Detail of the Page end -->
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="holder">
						<h2>YOUR ORDER</h2>
						<?php 
							$subPriceTotal = 0;
							$subPointTotal = 0;
						?>
						@if(Session::has('cart_total'))
						<?php 
							$cardTotalData = Session::get('cart_total');
							$subPriceTotal = $cardTotalData['price_subtotal'];
							$subPointTotal = $cardTotalData['point_subtotal'];
						?>
						@endif
						<ul class="list-unstyled block">
							<li>
								<div class="txt-holder">
									<strong class="title sub-title pull-left">Total PV</strong>
									<div class="txt pull-right">
										<span class="total_point_span">{{$subPointTotal}}</span>
									</div>
								</div>
							</li>
							<li>
								<div class="txt-holder">
									<strong class="title sub-title pull-left">CART TOTAL</strong>
									<div class="txt pull-right">
										<span class="total_span">{{ $subPriceTotal}} Tk</span>
									</div>
								</div>
							</li>
							<li>
								<div class="txt-holder">
									<strong class="title sub-title pull-left">SHIPPING</strong>
									<div class="txt pull-right">
										<strong>Free Shipping</strong>
									</div>
								</div>
							</li>
							<li style="border-bottom: none;">
								<div class="txt-holder">
									<strong class="title sub-title pull-left">GRAND TOTAL</strong>
									<div class="txt pull-right">
										<span class="total_span">{{ $subPriceTotal}} Tk</span>
									</div>
								</div>
							</li>
						</ul>
						<h2>Account Status</h2>
						<ul class="list-unstyled block">
							<li>
								<div class="txt-holder">
									<strong class="title sub-title pull-left">Current TopUp Balance</strong>
									<div class="txt pull-right">
										<span class="total_topUp_span">{{$avaliableTopup}} Tk</span>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<button type="submit" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
				</div>
			</div>
		</div>
	</section>
</form>
</main>

@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		
		$('#CheckoutForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				setTimeout(function(){
					location.href= responseText.redirectUrl;
				}, 2000);
			},
			resetForm:true
		});
		
		$(document).on('change','#delivery_from',function(){
			let type = $(this).val();
			$(".office_section").addClass('hide');
			$(".dealer_section").addClass('hide');
			$(".user_section").addClass('hide');
			
			if(type == 'company'){
				$(".office_section").removeClass('hide');
			}
			else if(type == 'dealer'){
				$(".dealer_section").removeClass('hide');
			}
			else if(type == 'user'){
				$(".user_section").removeClass('hide');
			}
		});
		
		function getDealerList(){
			let districtId = $('select[name="dealer_district"]').val() || null;
			let upazilaId = $('select[name="dealer_upazila"]').val() || null;
			let unionId = $('select[name="dealer_union"]').val() || null;
			$('select[name="dealer_list"]').children('option:not(:first)').remove();
			$.ajax({
				type: 'get',
				url: '{{ route('dealer.list') }}',
				data: {
					district_id: districtId,
					upazila_id: upazilaId,
					union_id: unionId
				},
				success:function(data) {
					let delars = data.dealer;
					delars.forEach(function(element) {
						$('select[name="dealer_list"]').append('<option value="'+element.user_id+'">'+element.dealer_name+'</option>');
					});
				}
			});
		}
		
		$(document).on('change','select[name="dealer_district"]',function(){
			let id = $(this).val();
			$('select[name="dealer_upazila"]').children('option:not(:first)').remove();
			$('select[name="dealer_union"]').children('option:not(:first)').remove();
			if(id){
				$.ajax({
					type: 'get',
					url: '{{ url('dealer/city/') }}/'+id ,
					success:function(data) {
						if(data.status="success"){
							$(".dealerUpazila").removeClass('hide');
							let delars = data.upazilas;
							delars.forEach(function(element) {
								$('select[name="dealer_upazila"]').append('<option value="'+element.id+'">'+element.name+'</option>');
							});
							}else{
							$(".dealerUpazila").addClass('hide');
						}
						getDealerList();
					}
				});
			}
		});
		
		$(document).on('change','select[name="dealer_union"]',function(){
			getDealerList();
		});
		
		$(document).on('change','select[name="dealer_upazila"]',function(){
			let id = $(this).val();
			$('select[name="dealer_union"]').children('option:not(:first)').remove();
			if(id){
				$.ajax({
					type: 'get',
					url: '{{ url('dealer/union/') }}/'+id ,
					success:function(data) {
						if(data.status="success"){
							$(".dealerUnion").removeClass('hide');
							let delars = data.union;
							delars.forEach(function(element) {
								$('select[name="dealer_union"]').append('<option value="'+element.dealer_union+'">'+element.dealer_union+'</option>');
							});
							}else{
							$(".dealerUnion").addClass('hide');
						}
						getDealerList();
					}
				});
			}
		});
		
	});
	
</script>
@endsection																																										