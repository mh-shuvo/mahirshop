
@extends('layouts.web')
@section('title','About')
@section('css')

@endsection
@section('content')
	
<div class="container">
    <div class="row">
              <!-- End header-->
      <div class="ogami-breadcrumb">
        <div class="container">
          <ul>
          <li> <a class="breadcrumb-link" href="{{route('welcome')}}"> <i class="fas fa-home"></i>Home</a></li>
          <li> <a class="breadcrumb-link active" href="{{route(('aboutus'))}}">About us</a></li>
          </ul>
        </div>
      </div>

      <!-- End breadcrumb-->
      {{-- <div class="about-us">
        <div class="container">
          <div class="our-story">
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="our-story_text">
                  <h1 class="title green-underline">The Story About Us</h1>
                  <p>Tyna Giang's integrated agro-forestry farming model is the first project in Vietnam to achieve the highest ranking in the "100 projects to combat climate change" by the Ministry of Environment, Energy and Sea. France organized in 2016 ...</p>
                  <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Neque porro quisquam est, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</p>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="our-story_video"><img src="assets/images/pages/video_play.png" alt="play video"><a class="play-btn" href="https://www.youtube.com/watch?v=7e90gBu4pas" target="_blank"><i class="fas fa-play"></i></a></div>
              </div>
            </div>
          </div>
          <div class="our-number">
            <div class="row">
              <div class="col-md-4">
                <div class="our-number_block">
                  <div class="our-number_icon"><img src="assets/images/pages/about_us_icon_1.png" alt="icon"></div>
                  <div class="our-number_info">
                    <h1 class="nummber-increase"><span class="numscroller" data-min="1" data-max="100" data-delay="5" data-increment="10">100</span>%</h1>
                    <p>Happy Clients</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="our-number_block">
                  <div class="our-number_icon"><img src="assets/images/pages/about_us_icon_2.png" alt="icon"></div>
                  <div class="our-number_info">
                    <h1 class="nummber-increase"><span class="numscroller" data-min="1" data-max="142" data-delay="5" data-increment="10">142</span></h1>
                    <p>Our Engineer</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="our-number_block">
                  <div class="our-number_icon"><img src="assets/images/pages/about_us_icon_3.png" alt="icon"></div>
                  <div class="our-number_info">
                    <h1 class="nummber-increase">+<span class="numscroller" data-min="1" data-max="16" data-delay="5" data-increment="10">16</span></h1>
                    <p>Our Farm</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="full-fluid">
          <div class="why-choose-us">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-4 align-self-end">
                  <div class="wcu_img"><img src="assets/images/pages/wcu_img.png" alt="image"></div>
                </div>
                <div class="col-sm-10 col-md-8">
                  <div class="wcu-wrapper">
                    <div class="row">
                      <div class="col-12">
                        <h1 class="title green-underline">Why Choose Us</h1>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="wcu-block">
                              <div class="wcu_icon">
                                <div class="icon-detail"><img src="assets/images/homepage01/dow_icon_1.png" alt=""></div>
                              </div>
                              <div class="wcu_intro">
                                <h5>Eat Healthier</h5>
                                <p>Modi tempora incidunt ut labore dolore magnam aliquam</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="wcu-block">
                              <div class="wcu_icon">
                                <div class="icon-detail"><img src="assets/images/homepage01/dow_icon_2.png" alt=""></div>
                              </div>
                              <div class="wcu_intro">
                                <h5>We Have Brands</h5>
                                <p>Modi tempora incidunt ut labore dolore magnam aliquam</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="wcu-block">
                              <div class="wcu_icon">
                                <div class="icon-detail"><img src="assets/images/homepage01/dow_icon_3.png" alt=""></div>
                              </div>
                              <div class="wcu_intro">
                                <h5>Fresh And Clean Products</h5>
                                <p>Modi tempora incidunt ut labore dolore magnam aliquam</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="wcu-block">
                              <div class="wcu_icon">
                                <div class="icon-detail"><img src="assets/images/homepage01/dow_icon_4.png" alt=""></div>
                              </div>
                              <div class="wcu_intro">
                                <h5>Modern Process</h5>
                                <p>Modi tempora incidunt ut labore dolore magnam aliquam</p>
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
        <div class="container">
          <div class="our-farmer">
            <h1 class="title green-underline">We are farmer</h1>
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="our-farmer-block our-farmer-block--1">
                  <div class="farmer-img"><img src="assets/images/pages/farmer_1.png" alt="farmer"></div>
                  <div class="farmer-contact_wrapper">
                    <div class="farmer-contact">
                      <h2>Katie Harrison</h2>
                      <h5>BARBER</h5>
                      <div class="farmer-social"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="our-farmer-block our-farmer-block--2">
                  <div class="farmer-img"><img src="assets/images/pages/farmer_2.png" alt="farmer"></div>
                  <div class="farmer-contact_wrapper">
                    <div class="farmer-contact">
                      <h2>Katie Harrison</h2>
                      <h5>BARBER</h5>
                      <div class="farmer-social"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="our-farmer-block our-farmer-block--3">
                  <div class="farmer-img"><img src="assets/images/pages/farmer_3.png" alt="farmer"></div>
                  <div class="farmer-contact_wrapper">
                    <div class="farmer-contact">
                      <h2>Katie Harrison</h2>
                      <h5>BARBER</h5>
                      <div class="farmer-social"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="our-farmer-block our-farmer-block--4">
                  <div class="farmer-img"><img src="assets/images/pages/farmer_1.png" alt="farmer"></div>
                  <div class="farmer-contact_wrapper">
                    <div class="farmer-contact">
                      <h2>Katie Harrison</h2>
                      <h5>BARBER</h5>
                      <div class="farmer-social"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- End about us-->
      {{-- <div class="partner">
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
      </div> --}}
      <!-- End partner-->
    </div>

    </div>
    <div class="aboutus" style="height:200px; background-color: #F0F0F0; padding-top:80px; ">
      <div class="">
        <h1 class="text-center">About Us</h1>
      </div>

    </div>
    <div class="container pb-5">
      <div class="text-center">
        <h1 class="py-5" style="color:#88c74a;">At A Glance</h1>
        <p class="pb-5" style="lin-height:5px;  letter-spacing: 1px;">Welcome to MahirShop Global Ltd. MahirShop Global Ltd. was founded in 2020 and revolutionized the business model known as direct selling. MahirShop Global Ltd. is dedicated to produce supplements that support immune system health, body transformation, and general wellness. Achieve your healthy lifestyle goals with MahirShop Global Ltd. products to help you to lead a healthy life. We strongly believe, after having our products the result will exceed your expectations.</p>
      </div>
    </div>

	
@endsection
@section('js')

@endsection