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
  .patternbg {
      background-image: url(public/frontend/assets/img/pattern-1.jpg);
      background-attachment: fixed;
      width: 100%;
      background-size: cover;
      background-position: center center;
      height:70%;
  }
  .video_gallery .row iframe{
    transition: transform 1s;
    border-radius: 10px;
  }
  .video_gallery .row iframe:hover{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    transform: scale(1.1);
  }
   .carousel-inner img {
      width: 100%;
      height: 100%;
    }
  
    /*Second Carousel start*/
  
  .coustom_carousell .item img{
      height:160px;
      width:160px;
      border-radius: 50%;
      margin:0 auto;
  }
  .coustom_carousell .item:hover img{
      opacity: 0.8;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .fa {
    padding: 10px;
    font-size: 10px;
    width: 30px;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
    border-radius: 50%;
    transition: transform .6s;
  }
  .fa-facebook {
    background: #3B5998;
    color: white;
  
  }
  
  .fa-twitter {
    background: #55ACEE;
    color: white;
  }
  
  .fa-google {
    background: #dd4b39;
    color: white;
  }
  .fa-youtube {
    background: #dd4b39;
    color: white;
  }
  
  .fa-linkedin {
    background: #007bb5;
    color: white;
  }
  .fa:hover{
      color: #90CF53;
      opacity: 0.7;
      transform: scale(1.2);
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
<div class="feature-products feature-products_v2 pb-5">
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
                <div class="product borderless"><a class="product-img" href="shop_detail.html"><img src="{{asset('public/frontend/assets/images/img1.jpg')}}" alt=""></a>
                    <h5 class="product-type">Oranges</h5>
                    <h3 class="product-name">Pure Pineapple</h3>
                    <h3 class="product-price">$14.00 
                      <del>$35.00</del>
                    </h3>
                    <div class="product-select">
                      <button class="add-to-wishlist round-icon-btn hide"> <i class="icon_heart_alt"></i></button>
                      <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                      <button class="add-to-compare round-icon-btn hide"> <i class="fas fa-random"></i></button>
                      <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                    </div>
                  </div>
                </div>
             @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<!-- CEO Details area start -->
<section style="background-color:#EEEEEE;">
  <div class="container">
      <div class="secotionTitle text-center py-3">
          <h2 class="pt-3"><span style="font-family: 'Herr Von Muellerhoff', cursive; color:#90CF53; font-style: italic;">MR. Abdur Rahman </span> <br> <span style="letter-spacing: 10px;font-size: 20px;color:#222222;" >Chief Executive Director </span></h2>
      </div>
      <div class="row mt-2">
          <div class="col-sm-12 col-xs-12">
              <div class="row mb-5" style="position: relative;">
                  <div class="col-sm-4 col-sm-offset-2 col-xs-6 pt-3">
                          <img src="{{asset('public/frontend/assets/images/img1.jpg')}}" class="rounded" alt="R.M. Abdullah Al Foisal" title="R.M. Abdullah Al Foisal" class="img-responsive" style="height: 100%; width: 90%;">
                  </div>
                  <div class="col-sm-8 col-xs-6" style="position: absolute;left: 33%;">
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                          <p>Thank you for visiting us. <b>NutriLife Global Ltd.</b> has the potential to be one of the most exciting stories in recent MLM / network marketing history. NutriLife Global Ltd. believes that all the right elements are in place and the addition of more and more distributor leaders will give them a great deal of momentum. We will create success together at NutriLife Global Ltd only when we work as a team, when we see corporate and field as one entity working toward a common goal. We are your team. <b>We are here to support you.</b> Let’s go make it happen together! Those who join now are in at the right time. You are in position to be very successful with NutriLife Global Ltd.! So please come and join us. YOU WILL WIN!!!! <br>
                          Thank you. <br>
                          Warmest Regards,
                          <i class="fa fa-quote-right" aria-hidden="true"></i></p>
                              
                            <p> <b>MR. Abdul Rahman</b> </p>
                            <p><b> Chief Executive Director </b></p>
                            <p><b> NutriLife Global Ltd </b></p>

                              
                             
                              

                      </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- CEO Details area end -->






 <!-- video gallery Start-->
 <section class="">
  <div class="container py-5">
      <div class="our-farmer ">
        <h1 class="title green-underline text-center pb-4" style="font-size: 40px; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; color:#90CF53;">Our Video Gallery</h1>

      <div class="container text-center video_gallery">
         <div class="row pb-3">
        <div class="col-md-4 py-3 video_gallery">
          <iframe width="300" height="150" src="https://www.youtube.com/embed/0MN20GGoITk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-md-4 py-3">
           <iframe width="300" height="150" src="https://www.youtube.com/embed/0MN20GGoITk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-md-4 py-3">
           <iframe width="300" height="150" src="https://www.youtube.com/embed/0MN20GGoITk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>

      <div class="row pb-3">
        <div class="col-sm-6 col-md-4 py-3">
          <iframe width="300" height="150" src="https://www.youtube.com/embed/0MN20GGoITk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-sm-6 col-md-4 py-3">
           <iframe width="300" height="150" src="https://www.youtube.com/embed/0MN20GGoITk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-sm-6 col-md-4 py-3">
           <iframe width="300" height="150" src="https://www.youtube.com/embed/0MN20GGoITk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      </div>
        </div>
      </div>
    </div>
    </section>
<!-- video gallery end -->







<section class="achievers py-5 patternbg">

  <div class="container text-center">
      <h1 class="title green-underline text-center pb-2" style="font-size: 50px; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; color:#90CF53;">Team</h1>
      <h4 class="text-uppercase pb-3"  style="font-family: 'Herr Von Muellerhoff', cursive; font-size: 20px;letter-spacing: 10px;">Top Ten</h4>
  </div>

  <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="owl-carousel coustom_carousell">
          <div class="item">
              <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
              <div class="container py-2 text-center">
                  <h4 style="font-size: 15px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 10px;  color:#90CF53;">Sujon Kumer</h4>
                  <p class="" style="font-size: 12px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive;
                  ">CEO</p>
              </div>
              <div class="social_icon">
                  <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                  <a href="https://www.twitter.com" target="_blank" class="fa fa-twitter"></a>
                  <a href="https://www.google.com" target="_blank" class="fa fa-google"></a>
                  <a href="https://www.linkedin.com" target="_blank" class="fa fa-linkedin"></a>
              </div>
          </div>
          <div class="item">
              <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
              <div class="container py-2 text-center">
                  <h4 style="font-size: 15px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 10px;  color:#90CF53;">Sujon Kumer</h4>
                  <p class="" style="font-size: 12px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive;
                  ">CEO</p>
              </div>
              <div class="social_icon">
                  <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-google"></a>
                  <a href="#" class="fa fa-linkedin"></a>
              </div>
          </div>
          <div class="item">
              <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
              <div class="container py-2 text-center">
                  <h4 style="font-size: 15px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 10px;  color:#90CF53;">Sujon Kumer</h4>
                  <p class="" style="font-size: 12px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive;
                  ">CEO</p>
              </div>
              <div class="social_icon">
                  <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-google"></a>
                  <a href="#" class="fa fa-linkedin"></a>
              </div>
          </div>
          <div class="item">
              <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
              <div class="container py-2 text-center">
                  <h4 style="font-size: 15px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 10px;  color:#90CF53;">Sujon Kumer</h4>
                  <p class="" style="font-size: 12px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive;
                  ">CEO</p>
              </div>
              <div class="social_icon">
                  <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-google"></a>
                  <a href="#" class="fa fa-linkedin"></a>
              </div>
          </div>
          <div class="item">
              <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
              <div class="container py-2 text-center">
                  <h4 style="font-size: 15px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 10px;  color:#90CF53;">Sujon Kumer</h4>
                  <p class="" style="font-size: 12px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive;
                  ">CEO</p>
              </div>
              <div class="social_icon">
                  <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-google"></a>
                  <a href="#" class="fa fa-linkedin"></a>
              </div>
          </div>
          <div class="item">
              <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
              <div class="container py-2 text-center">
                  <h4 style="font-size: 15px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; padding-top: 10px;  color:#90CF53;">Sujon Kumer</h4>
                  <p class="" style="font-size: 12px; text-transform: uppercase; font-family: 'Herr Von Muellerhoff', cursive;
                  ">CEO</p>
              </div>
              <div class="social_icon">
                  <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-google"></a>
                  <a href="#" class="fa fa-linkedin"></a>
              </div>
          </div>
         
          </div>
      </div>
  </div>


</section>

  <!-- End feature-products-->


@endsection
@section('js')

@endsection

