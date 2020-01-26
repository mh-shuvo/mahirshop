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
      background-image: url(public/frontend/assets/images/pattern-1.jpg);
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
      height:202px;
      width:160px;
      border-radius: 50%;
      margin:0 auto;
      transition: all .4s ease-in-out;
  }
  .coustom_carousell .item:hover img{
      opacity: 0.8;
      transition: all .6s ease-in-out;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

.product_cat_carousel .pro_cat_div{
  border: 5px solid #90CF53;
  height: 250px;
  width: 200px;
  border-radius: 50%;

}
.product_cat_carousel .item .pro_cat_div{
  transition: all .6s ease-in-out;
  background-color: rgba(144, 207, 83, 0.3);
}
.product_cat_carousel .item .pro_cat_div:hover{
  opacity: 0.8;
  transition: all .4s ease-in-out;
  background-color: rgba(144, 207, 83, 0.7);
}
.product_cat_carousel .item .pro_cat_div div{
  transition: all .4s ease-in-out;
}
.product_cat_carousel .item .pro_cat_div:hover div{
  transform: scale(1.1);
  transition: all .4s ease-in-out;
}

  }
  </style>
@endsection
@section('content')


<!-- Slider start -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
    
  <div class="carousel-inner">
    @foreach($banners as $banner)
    <div class="carousel-item active">
      <img src="{{asset('public')}}/{{$banner->banner_image}}" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>{{$banner->banner_name}}</h3>
        <p>{{$banner->banner_des}}</p>
      </div>   
    </div>
    @endforeach
  </div>
      
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<!-- slider  -->

    <!-- mt main slider end here -->
    <div class="feature-products feature-products_v2 pb-5">
        <div class="ogami-container-fluid">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="title mx-auto" style="color: #88C74A;">Featured Product</h1>
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
                    <div class="product borderless"><a class="product-img" href="shop_detail.html"><img src="{{asset('public')}}/{{$product->product_image}}" alt=""></a>
                        <h5 class="product-type">{{$product->category->category_name}}</h5>
                        <h3 class="product-name">{{$product->product_name}}</h3>
                        <h3 class="product-price">{{$product->product_discount_price}} TK 
                          <del>{{$product->product_base_price}} TK</del>
                        </h3>
                        <div class="product-select">
                          <button class="add-to-wishlist round-icon-btn hide"> <i class="icon_heart_alt"></i></button>
                          <button class="add-to-cart round-icon-btn hide">  <i class="icon_bag_alt"></i></button>
                          <button class="add-to-compare round-icon-btn hide"> <i class="fas fa-random"></i></button>
                          <button class="quickview round-icon-btn" data-id="{{$product->id}}"> <i class="far fa-eye"></i>
                          </button>
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
              <h2 class="pt-3"><span style="color:#90CF53;">MR. Abdur Rahman </span> <br> <span style="letter-spacing: 10px;font-size: 20px; color:#222222;" >Chief Executive Director </span></h2>
          </div>
          <div class="row mt-2">
              <div class="col-sm-12 col-xs-12">
                  <div class="row mb-5" style="position: relative;">
                      <div class="col-sm-4 col-sm-offset-2 col-xs-6 pt-3">
                              <img src="{{asset('public/frontend/assets/images/img1.jpg')}}" class="rounded" alt="R.M. Abdullah Al Foisal" title="R.M. Abdullah Al Foisal" class="img-responsive" style="height: 100%; width: 90%;">
                      </div>
                      <div class="col-sm-8 col-xs-6">
                              <i class="fa fa-quote-left" aria-hidden="true"></i>
                              <p>Thank you for visiting us. <b>MahirShop Global Ltd.</b> has the potential to be one of the most exciting stories in recent MLM / network marketing history. MahirShop Global Ltd. believes that all the right elements are in place and the addition of more and more distributor leaders will give them a great deal of momentum. We will create success together at MahirShop Global Ltd only when we work as a team, when we see corporate and field as one entity working toward a common goal. We are your team. <b>We are here to support you.</b> Let’s go make it happen together! Those who join now are in at the right time. You are in position to be very successful with MahirShop Global Ltd.! So please come and join us. YOU WILL WIN!!!! <br>
                              Thank you. <br>
                              Warmest Regards,
                              <i class="fa fa-quote-right" aria-hidden="true"></i></p>
                                  
                                <p> <b>MR. Abdul Rahman</b> </p>
                                <p><b> Chief Executive Director </b></p>
                                <p><b> MahirShop Global Ltd </b></p>

                                  
                                 
                                  

                          </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- CEO Details area end -->

    <!-- Product by categoryt area start -->
    <section class="achievers my-5 pb-5 patternbg">

        <div class="container text-center py-4">
            <h1 class="title green-underline text-center pb-2" style="font-size: 30px; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; color:#EEEEEE;">Product</h1>
            <h4 class="text-uppercase pb-3"  style="font-family: 'Herr Von Muellerhoff', cursive; font-size: 20px;letter-spacing: 10px; color: #EEEEEE;">CATEGORIES</h4>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
              <div class="owl-carousel product_cat_carousel">
              @foreach(App\Category::where('category_status','Active')->get() as $category)
                @php
                  $totalProduct = count($category->Product);
                @endphp
              <div class="item">
                    <div class="container text-center pro_cat_div" style="background-attachment: fixed; width: 55%;
                      background-size: cover; background-position: center center; background-image: url('{{asset("public")}}/{{$category->image}}')">
                      <div class="my-4" style="height: 30%; width: 36%; margin: 0 auto;  background-color: #fff; border-radius: 50%; color:#90CF53;">
                      <h3 class="" style="line-height: 270%;">{{$totalProduct}}</h3>
                      </div>
                    <div class="pt-3 text-uppercase">

                      <span style="color:#90CF53; padding: 5px 10px; border-radius: 20px; background-color: #fff">{{$category->category_name}}</span>
                    </div>
                    </div>
                </div>
              
              @endforeach
              </div>
            </div>
        </div>

 
    </section>
<!-- product by category area end -->


 <!-- video gallery start -->
    <section class="video_section">
          <div class="container py-5">
              <div class="our-farmer ">
                <h1 class="title green-underline text-center pb-4" style="font-size: 30px; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; color:#000;">Our Video Gallery</h1>

              <div class="container text-center video_gallery">
               <div class="row pb-3">
                @foreach(App\Gallery::where('type','video')->where('status','Active')->get() as $video)
                @php
                  $fetch = explode('/',$video->image);
                  $videoId = $fetch['3'];
                @endphp
                <div class="col-md-6 col-sm-6 col-lg-4 py-3 video_gallery">
                <iframe width="270" height="150" src="https://www.youtube.com/embed/{{$videoId}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              @endforeach
              </div>
              </div>
                </div>
              </div>
          </section>
<!-- video gallery start -->

    <!-- top ten section start -->
    <section class="achievers patternbg my-5">

      <div class="container text-center py-3">
          <h1 class="text-center" style="font-size: 40px; text-transform: uppercase; color:#EEEEEE;">Team</h1>
          <h4 class="text-uppercase"  style="font-size: 30px;letter-spacing: 10px; color:#EEEEEE;">Top Ten</h4>
      </div>

      <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <div class="owl-carousel coustom_carousell">
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center" style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center "  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px; " class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
             
              </div>
          </div>
      </div>


    </section>
    <!-- top ten section end -->

    <!-- our project director area start -->
    <section class="achievers patternbg pt-3 my-5">

      <div class="container text-center">
          <h1 class="text-center" style="font-size: 40px; text-transform: uppercase; color:#EEEEEE;">Our Project Director</h1>
      </div>

      <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <div class="owl-carousel coustom_carousell">
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
              <div class="item">
                  <img src="{{asset('public/frontend/assets/images/img1.jpg')}}">
                  <div class="container py-2 text-center"  style="color: #EEEEEE;">
                    <h4 style="font-size: 25px; text-transform: uppercase;  text-transform: uppercase; padding-top: 10px;" class="py-2">Mr. Abdur Rahman</h4>
                    <p class="" style="font-size: 20px; text-transform: uppercase;
                    ">CEO</p>
                </div>
              </div>
             
              </div>
          </div>
      </div>


    </section>
    <!-- our project direct end -->




@endsection
@section('js')

@endsection

