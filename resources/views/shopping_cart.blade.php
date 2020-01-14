@extends('layouts.web')
@section('title','Shopping Cart')
@section('css')

@endsection
@section('content')

<main id="mt-main">
	<section class="mt-contact-banner mt-banner-22 wow fadeInUp" data-wow-delay="0.4s" style="background-image: url('{{asset("public/frontend/images/shoping_cart.jpg")}}');">
	<div class="container">
	<div class="row">
	<div class="col-xs-12">
	<h1 class="text-center">SHOPPING CART</h1>
	<!-- Breadcrumbs of the Page -->
	<nav class="breadcrumbs">
		<ul class="list-unstyled">
			<li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
			<li>Shopping Cart</li>
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
                <ul class="list-unstyled process-list">
					<li class="active">
						<span class="counter">01</span>
						<strong class="title">Shopping Cart</strong>
					</li>
					<li>
						<span class="counter">02</span>
						<strong class="title">Check Out</strong>
					</li>
					<li>
						<span class="counter">03</span>
						<strong class="title">Order Complete</strong>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div><!-- Mt Process Section of the Page end -->
<!-- Mt Product Table of the Page -->
<div class="mt-product-table wow fadeInUp" data-wow-delay="0.4s">
	<div class="container">
		<div class="row border">
			<div class="col-xs-12 col-sm-4">
                <strong class="title">PRODUCT</strong>
			</div>
			<div class="col-xs-12 col-sm-2">
                <strong class="title">PRICE</strong>
			</div>
			<div class="col-xs-12 col-sm-2">
                <strong class="title">PV</strong>
			</div>
			<div class="col-xs-12 col-sm-2">
                <strong class="title">QUANTITY</strong>
			</div>
			<div class="col-xs-12 col-sm-2">
                <strong class="title">TOTAL</strong>
			</div>
		</div>
		<form id="CartForm">
            @if(Session::has('cart'))
			<?php 
				$cardData = Session::get('cart');
			?>
            @foreach( $cardData as $value) 
            <div class="row border shopping_cart_check{{$value['product_id']}}">
				<div class="col-xs-12 col-sm-2">
					<div class="tt-product-img img-holder">
						<img src="{{asset('public')}}/{{$value['product_image']}}" data-src="{{asset('public')}}/{{$value['product_image']}}" alt="{{$value['product_name']}}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 tt-title">
					<strong class="product-name">{{$value['product_name']}}</strong>
				</div>
				<div class="col-xs-12 col-sm-2">
					<strong class="price tt-price">{{$value['product_price']}} Tk</strong>
				</div>
				<div class="col-xs-12 col-sm-2">
					<strong class="price tt-price">
					<span class="tt_subtotal_point_span{{$value['product_id']}}">{{$value['product_point_total']}}</span> PV</strong>
				</div>
				<div class="col-xs-12 col-sm-2">
					<strong class="price">
						<input type="number" value="{{$value['product_qty']}}" class="form-control product_qty" data-id="{{$value['product_id']}}" name="product_qty[]" size="100">
					</strong>
				</div>
				
				<div class="col-xs-12 col-sm-2">
					<strong class="price tt-price tt_subtotal_span{{$value['product_id']}}">{{$value['product_price_total']}} Tk</strong>
					<a href="javascript:void(0)" class="fa fa-close removeShoppingCartProduct" data-id="{{$value['product_id']}}" ></a> 
					
				</div>
			</div>
            @endforeach
		</form>
		@else
		<h2 class="text-center" >Shopping cart Empty</h2>
		@endif
	</div>
</div><!-- Mt Product Table of the Page end -->
<!-- Mt Detail Section of the Page -->
<section class="mt-detail-sec style1 wow fadeInUp" data-wow-delay="0.4s">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <h2>CART TOTAL</h2>
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
                <ul class="list-unstyled block cart">
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
							<strong class="title sub-title pull-left">GRAND TOTAL</strong>
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
							<strong class="title sub-title pull-left">CART TOTAL</strong>
							<div class="txt pull-right">
								<span class="total_span">{{ $subPriceTotal}} Tk</span>
							</div>
						</div>
					</li>
				</ul>
                <a href="{{route('checkout')}}" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
			</div>
		</div>
	</div>
</section>
</main>

@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		// calculate();
		
		$(document).on('keyup change', '#CartForm .product_qty', function() {
			let Id = $(this).data('id');
			let productQty = $(this).val();
			$(this).ajaxSubmit({
				data: { "product_id": Id, "product_qty": productQty },
				dataType: 'json',
				method: 'GET',
				url: "{{route('product.cart.update')}}",
				success: function (responseText) {
					cartUpdate(responseText);
					calculate(responseText);
				}
			});
		});
		
		$(document).on('click','.removeShoppingCartProduct',function(){
			let id = $(this).data('id');
			$(this).ajaxSubmit({
				data: { "product_id": id, "product_cart_remove": id },
				dataType: 'json',
				method: 'GET',
				url: "{{route('product.cart.update')}}",
				success: function (responseText) {
					$('.cart_check'+responseText.product_id).remove();
					$('.shopping_cart_check'+responseText.product_id).remove();
					cartUpdate(responseText);
					calculate(responseText);
				}
			});
		});
		
		
		function calculate(data) {
			$(".tt_subtotal_span"+data.product_id).html(data.product_price_total);
			$(".tt_subtotal_point_span"+data.product_id).html(data.product_point_total);
			$(".total_point_span").html(data.point_subtotal);
			$(".total_span").html(data.price_subtotal);
		}
		
		$('#CartForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
			},
			resetForm:true
		});
		
		$(document).on('change','#delivery_from',function(){
			let type = $(this).val();
			$(".office_section").addClass('hide');
			$(".dealer_section").addClass('hide');
			$(".user_section").addClass('hide');
			
			if(type == 'office'){
				$(".office_section").removeClass('hide');
			}
			else if(type == 'dealer'){
				$(".dealer_section").removeClass('hide');
			}
			else if(type == 'user'){
				$(".user_section").removeClass('hide');
			}
		});
		
		$(document).on('change','#dealer_city',function(){
			let id = $(this).val();
			$.ajax({
				type: 'get',
				url: '{{ url('dealer/city/') }}/'+id ,
				success:function(data) {
					let delars = JSON.parse(data);
					delars.forEach(function(element) {
						$("#dealer_list").append('<option value="'+element.id+'">'+element.dealer_delivery_name+'</option>');
					});
					
				}
			});
			
		});
		
		$(document).on('change','#dealer_list',function(){
			let id = $(this).val();
			$("#dealer_info").addClass("hide");
			$.ajax({
				type: 'get',
				url: '{{ url('dealer/') }}/'+id ,
				success:function(data) {
					let dealar = JSON.parse(data);
					$("#dealer_name").html(dealar.dealer_delivery_name);
					$("#dealer_phone").html(dealar.dealer_delivery_phone);
					$("#dealer_address").html(dealar.dealer_delivery_address);
					$(".dealer_info").removeClass("hide");
				}
			});
		});
	});
	
</script>
@endsection										