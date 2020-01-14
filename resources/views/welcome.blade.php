@extends('layouts.web')
@section('title','Home')
@section('css')
<style>
    .slick-list{
        height: 585px;;
    }
    .slick-track{
        height: 100%;
    }
    
</style>
@endsection
@section('content')

<div class="slider slider-hp-2">
	<div class="ogami-container-fluid">
	  <div class="slider_wrapper" data-slick="{&quot;swipe&quot;: false, &quot;setting&quot;: &quot;unslick&quot;}">
        @foreach($banners as $banner)
		<div class="slider-block" style="background-image: url({{asset('public')}}/{{$banner->banner_image}});" style="background-size:100% 100%;">
		  <div class="slider-content">
			<div class="container">
			  <div class="row align-items-center justify-content-center">
				<div class="col-12 col-md-5 col-xl-6">
				  <div class="slider-text d-flex flex-column align-items-center align-items-md-start">
					<h1>{{$banner->banner_name}}</h1>
					<h3><span>{{$banner->banner_des}}</span></h3>
				  </div>
				</div>
				<div class="col-12 col-md-6">
				  <div class="slider-img"><img src="assets/images/homepage01/slider_subbackground_1.png" alt="">
					<div class="prallax-img">
					  <div id="img-block"><img class="img" src="assets/images/homepage01/slider_img_1.png" alt="" data-depth="1"></div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		@endforeach
		
	  </div>
	</div>
</div>

<!-- mt main slider end here -->
<div class="feature-products feature-products_v2">
    <div class="ogami-container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title mx-auto">Featured Product</h1>
        </div>
        <div class="col-12">
          <div id="tab">
            <ul class="tab-control">
              <li><a class="active" href="#tab-1">All</a></li>
              @foreach(App\Category::where('category_status','Active')->get() as $category)
            <li><a href="#tab-{{ $category->id}}">{{ $category->category_name }}</a></li>
              @endforeach
            </ul>

            <div id="tab-1">
              <div class="row no-gutters-sm">
                @foreach($featured_products as $product)
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                  <div class="product borderless"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product01.png" alt=""></a>
                    <h5 class="product-type">Oranges</h5>
                    <h3 class="product-name">Pure Pineapple</h3>
                    <h3 class="product-price">$14.00 
                      <del>$35.00</del>
                    </h3>
                    <div class="product-select">
                      <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                      <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                      <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                      <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                    </div>
                  </div>
                </div>
             @endforeach
              </div>
            </div>
            @foreach(App\Category::where('category_status','Active')->get() as $category)
            <div id="tab-{{ $category->id}}">
                <div class="row no-gutters-sm">
                @foreach ($category->product as $product)
                  <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                    <div class="product borderless"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product01.png" alt=""></a>
                      <h5 class="product-type">Oranges</h5>
                      <h3 class="product-name">Pure Pineapple</h3>
                      <h3 class="product-price">$14.00 
                        <del>$35.00</del>
                      </h3>
                      <div class="product-select">
                        <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                        <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                        <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                        <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End feature-products-->


@endsection
@section('js')

@endsection

