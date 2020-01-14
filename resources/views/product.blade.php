@extends('layouts.web')
@section('title','Single Product')

@section('content')
<section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<!-- Slider of the Page -->
				<div class="slider">
					<!-- Product Slider of the Page -->
					<div class="product-slider">
						<div class="slide">
							<img src="{{asset('public')}}/{{$product->product_image}}" alt="image descrption">
						</div>
					</div>
					<!-- Product Slider of the Page end -->
					
				</div>
				<!-- Slider of the Page end -->
				<!-- Detail Holder of the Page -->
				<div class="detial-holder">
					<!-- Breadcrumbs of the Page -->
					<ul class="list-unstyled breadcrumbs">
						<li><a href="#">{{$product->category->category_name}} <i class="fa fa-angle-right"></i></a></li>
						<li>Products</li>
					</ul>
					<!-- Breadcrumbs of the Page end -->
					<h2>{{$product->product_name}}</h2>
					<!-- Rank Rating of the Page -->
					<div class="rank-rating">
						<ul class="list-unstyled rating-list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o"></i></a></li>
						</ul>
						<span class="total-price">Reviews (12)</span>
					</div>
					
					<div class="txt-wrap">
						<p>{!! substr($product->product_des, 0, 100) !!}</p>
						
					</div>
					<div class="text-holder">
						@if($product->product_discount_price)
						<span class="price">{{$product->product_discount_price}} <del>{{$product->product_base_price}}</del></span>
						@else
						<span class="price">{{$product->product_price}}</span>
						@endif
					</div>
					<!-- Product Form of the Page -->
					<form action="#" class="product-form">
						<fieldset>
							<div class="row-val">
								<label for="qty">qty</label>
								<input type="number" id="qty" placeholder="1">
							</div>
							<div class="row-val">
								<button type="button" class="tt-btn-addtocart" data-product_id="{{$product->id}}">ADD TO CART</button>
							</div>
						</fieldset>
					</form>
					<!-- Product Form of the Page end -->
				</div>
				<!-- Detail Holder of the Page end -->
			</div>
		</div>
	</div>
</section><!-- Mt Product Detial of the Page end -->
<div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="mt-tabs text-center text-uppercase">
					<li><a href="#tab1" class="active">DESCRIPTION</a></li>
					
				</ul>
				<div class="tab-content">
					<div id="tab1">
						<p>{{$product->product_des}}</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- related products start here -->
<div class="related-products wow fadeInUp" data-wow-delay="0.4s">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2>RELATED PRODUCTS</h2>
				<hr>
				<div class="row">
					<div class="col-xs-12">
						@foreach($related_products as $product)
						<!-- mt product1 center start here -->
						<div class="mt-product1 mt-paddingbottom20">
							<div class="box">
								<div class="b1">
									<div class="b2">
										<a href="{{url('product/')}}/{{$product->id}}"><img src="{{asset('public')}}/{{$product->product_image}}" alt="image description"></a>
										<span class="caption">
											<span class="new">NEW</span>
										</span>
										<ul class="links">
											<li><a href="javascript:void(0)" class="tt-btn-addtocart" data-product_id="{{$product->id}}"><i class="icon-handbag"></i><span>Add to Cart</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="txt">
								<strong class="title"><a href="{{url('product/')}}/{{$product->id}}">{{$product->product_name}}</a></strong>
								<span class="price"> <span>{{$product->product_price}}</span></span>
							</div>
						</div><!-- mt product1 center end here -->
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div><!-- related products end here -->
</div>
@endsection