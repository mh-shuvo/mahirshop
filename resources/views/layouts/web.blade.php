<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- set the encoding of your site -->
		<meta charset="utf-8">
		<!-- set the viewport width and initial-scale on mobile devices -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> @yield('title')</title>
		<!-- All Style Link-->
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/animate.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/custom_bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/elegant.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/fontawesome.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/icomoon.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/scroll.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/scroll.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/slick.css')}}">

		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<style type="text/css">

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
		  
		    /*Second Carousel start*/
		    .owl-carousel .item{
		      padding:20px 0px;
		    }
		    .owl-carousel .item img{
		        height:202px;
		      width:160px;
		        border-radius: 50%;
		        transition: all .4s ease-in-out;
		        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		        margin:0 auto;
		    }
		    .owl-carousel .item:hover img{
		        opacity: 0.8;
		        transition: all .6s ease-in-out;
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
  
			.hide{
			display: none;
			}
			
			/* The alert message box */
			.alert {
			padding: 10px;
			background-color: #f44336; /* Red */
			color: white;
			margin-bottom: 15px;
			}
			.invalid-feedback {
			color: #f44336;
			margin-bottom: 2px;
			}
			
			/* The close button */
			.closebtn {
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
			}
			
			/* When moving the mouse over the close button */
			.closebtn:hover {
			color: black;
			} 
			
		</style>
		@yield('css')
	</head>
	<body>
		<!-- main container of all the page elements -->
		<div id="wrapper">
			<!-- Page Loader -->
			{{-- <div id="pre-loader" class="loader-container">
				<div class="loader">
					<img src="images/svg/rings.svg" alt="loader">
				</div>
			</div> --}}
			<!-- W1 start here -->
			<div class="w1">

<!-- Header section Start -->
<header>


	<!-- Top Header Start-->
	<div class="header-block d-flex align-items-center border-bottom">
	  <div class="ogami-container-fluid">
		<div class="row">
		  <div class="col-12 col-md-6">
			<div class="header-left d-flex flex-column flex-md-row align-items-center">
			  <p class="d-flex align-items-center"><i class="fas fa-envelope"></i>info.deercreative@gmail.com</p>
			  <p class="d-flex align-items-center"><i class="fas fa-phone"></i>+65 11.188.888</p>
			</div>
		  </div>
		  <div class="col-12 col-md-6">
			<div class="header-right d-flex flex-column flex-md-row justify-content-md-end justify-content-center align-items-center">

				<div class="social_icon d-flex;">
					<a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
					<a href="https://www.twitter.com" target="_blank" class="fa fa-twitter"></a>
					<a href="https://www.google.com" target="_blank" class="fa fa-google"></a>
					<a href="https://www.linkedin.com" target="_blank" class="fa fa-linkedin"></a>
				</div>
			  
			<div class="login d-flex"><a href="{{route('login')}}"><i class="fas fa-user"></i>Login</a></div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Top Header End-->


	<!-- Mobile Device-->
	{{-- <div id="mobile-menu">
	  <div class="container">
		<div class="row">
		  <div class="col-3">
			<div class="mobile-menu_block d-flex align-items-center"><a class="mobile-menu--control" href="#"><i class="fas fa-bars"></i></a>
			  <div id="ogami-mobile-menu">
				<button class="no-round-btn" id="mobile-menu--closebtn">Close menu</button>
				<div class="mobile-menu_items">
				  <ul class="mb-0 d-flex flex-column">
					<li class="toggleable"> <a class="menu-item active" href="index.html">Home</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
					  <ul class="sub-menu">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="homepage02.html">Homepage 2</a></li>
						<li><a href="homepage03.html">Homepage 3</a></li>
						<li><a href="homepage04.html">Homepage 4</a></li>
						<li><a href="homepage05.html">Homepage 5</a></li>
					  </ul>
					</li>
					<li class="toggleable"><a class="menu-item" href="shop_grid+list_3col.html">Shop</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
					  <ul class="sub-menu">
						<li><a href="shop_grid+list_fullwidth.html">Shop grid fullwidth</a></li>
						<li><a href="shop_grid+list_fullwidth.html">Shop list fullwidth</a></li>
						<li><a href="shop_grid+list_3col.html">shop grid 3 column</a></li>
						<li><a href="shop_grid+list_3col.html">shop list 3 column</a></li>
						<li><a href="shop_detail.html">shop detail</a></li>
						<li><a href="shop_detail_fullwidth.html">shop detail fullwidth</a></li>
						<li><a href="shop_checkout.html">checkout</a></li>
						<li><a href="shop_order_complete.html">order complete</a></li>
						<li><a href="shop_wishlist.html">wishlist</a></li>
						<li><a href="shop_compare.html">compare</a></li>
						<li><a href="shop_cart.html">cart</a></li>
					  </ul>
					</li>
					<li class="toggleable"> <a class="menu-item" href="blog_list_sidebar.html">Blog</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
					  <ul class="sub-menu">
						<li><a href="blog_list_sidebar.html">Blog List Sidebar</a></li>
						<li><a href="blog_grid_2col.html">Blog Grid 2 column</a></li>
						<li><a href="blog_grid_sidebar.html">Blog Grid sidebar</a></li>
						<li><a href="blog_masonry.html">Blog masonry</a></li>
						<li><a href="blog_grid_1col.html">Blog Grid 1 column sidebar</a></li>
						<li><a href="blog_detail_sidebar.html">Blog detail sidebar</a></li>
					  </ul>
					</li>
					<li class="toggleable"><a class="menu-item" href="#">Pages</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
					  <ul class="sub-menu">
						<li><a href="login.html">login</a></li>
						<li><a href="register.html">register</a></li>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="coming_soon.html">coming soon</a></li>
						<li><a href="about_us.html">about us</a></li>
						<li><a href="contact_us.html">contact us</a></li>
						<li><a href="404_error.html">404 error</a></li>
					  </ul>
					</li>
				  </ul>
				</div>
				<div class="mobile-login">
				  <h2>My account</h2><a href="login.html">Login</a><a href="register.html">Register</a>
				</div>
				<div class="mobile-social"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"> </i></a></div>
			  </div>
			  <div class="ogamin-mobile-menu_bg"></div>
			</div>
		  </div>
		  <div class="col-6">
			<div class="mobile-menu_logo text-center d-flex justify-content-center align-items-center"><a href=""><img src="assets/images/logo.png" alt=""></a></div>
		  </div>
		  <div class="col-3">
			<div class="mobile-product_function d-flex align-items-center justify-content-end"><a class="function-icon icon_heart_alt" href="wishlist.html"></a><a class="function-icon icon_bag_alt" href="shop_cart.html"></a></div>
		  </div>
		</div>
	  </div>
	</div> --}}
	<!-- Mobile Device-->


	<!-- Navigarion Bar Start-->
		<div class="row border-bottom">
			<div class="col-md-6 col-sm-12 py-4">
				<div class="logo pl-5">
				<a href="{{route('welcome')}}" style="font-size:25px; text-decoration:none; color: #88C74A;"><img src="#" alt=""><b>MaHiR sHoP</b></a>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 text-right py-4">
				<div class="d-flex text-right" style="float:right;">
					<a href="#" style="color:black; font-size:25px;">
						<i class="far fa-heart"></i>
					</a>
					<a href="#" style="color:black; font-size:25px;">
						<i class="fas fa-shopping-cart px-3"></i>
					</a>
					<a href="#" style="color:black; font-size: 18px; text-decoration:none; padding-top:5px; "><span>$150.00</span></a>
				</div>
			</div>
	</div>
	<nav class="navigation navigation_v2 d-flex align-items-center">
	  <div class="ogami-container-fluid">
		<div class="row align-items-xxl-center">

		  <div class="col-12 col-md-12 col-xl-6 col-xxxl-4 order-xl-3 order-xxxl-2">
			<div class="navigation-filter">
			  <div class="website-search_v2">
				<div class="row no-gutters">
				  <div class="col-0 col-md-3 col-lg-3 col-xl-4">
					<div class="filter-search">
					  <div class="categories-select d-flex align-items-center justify-content-around"><span>All Categories</span><i class="arrow_carrot-down"></i></div>
					  <div class="categories-select_box">
						<ul>
							@foreach ($categorys as $category )
								<li>
									<a class="department-link active" href="{{url('product/category/')}}/{{$category->id}}">{{ $category->category_name }}</a>
								</li>
							@endforeach
						</ul>
					  </div>
					</div>
				  </div>
				  <div class="col-8 col-md-7 col-lg-8 col-xl-7">
					<div class="search-input">
					  <input class="no-round-input no-border" type="text" placeholder="What do you need">
					</div>
				  </div>
				  <div class="col-4 col-md-2 col-lg-1 col-xl-1">
					<button class="no-round-btn"><i class="icon_search"></i></button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="col-12 pb-4 col-xl-6 col-xxxl-5 order-xl-4 order-xxxl-3">
			<div class="navgition-menu d-flex align-items-center justify-content-center justify-content-xl-center">
			  <ul class="mb-0">
				
				<li class="toggleable"><a class="menu-item active" href="{{route('welcome')}}">Home</a></li>
				<li class="toggleable"><a class="menu-item" href="{{route('shop')}}">Our Product</a></li>
				<li class="toggleable"><a class="menu-item" href="{{route('aboutus')}}">Aboutus</a></li>
				<li class="toggleable"><a class="menu-item" href="{{route('contactus')}}">Contactus</a></li>
				<li class="toggleable"><a class="menu-item" href="{{route('gallery')}}">Gallery</a></li>
				<li class="toggleable"><a class="menu-item" href="{{ route('achivers')}}">Achivers</a></li>
			  </ul>
			</div>
		  </div>
	
		</div>
	  </div>
	</nav>
	<!-- Navigation Bar End-->
  </header>
<!-- Header Seciton End-->

@yield('content')


<!-- logo area start -->
    <section class="achievers patternbg mt-5">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
              <div class="container text-center pt-3">
            <h1 class="title green-underline text-center pb-2" style="font-size: 30px; font-family: 'Herr Von Muellerhoff', cursive; text-transform: uppercase; color:#90CF53;">Our Brands</h1>
        </div>
              <div class="owl-carousel coustom_carousel_brand">
                @foreach(App\Brand::all() as $brand)
                <div class="item">
                    <img src="{{asset('public')}}/{{$brand->image}}">
                </div>
                @endforeach
                </div>
            </div>
        </div>

 
    </section>
<!-- logo area end -->

<!-- Footer Section Start -->
<footer>
	<div class="ogami-container-fluid">
		<div class="footer-v2_header">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 col-xl-3 text-sm-center text-lg-left">
						<div class="footer-logo">
							<h6 style="padding-top:13px ;font-family:Cera Pro Medium;"><strong>ADDRESS:</strong></h6>
					</div>
					<div class="footer-contact">
						<p>Address: <br> 60-49 Road 11378 New York</p>
						<p>Phone: <br> +65 11.188.888</p>
						<p>Email: <br> info.deercreative@gmail.com</p>

					</div>
              		<div class="social_icon">
                  		<a href="https://www.facebook.com" target="_blank" class="fa fa-facebook"></a>
                  		<a href="#" class="fa fa-twitter"></a>
                  		<a href="#" class="fa fa-google"></a>
                  		<a href="#" class="fa fa-linkedin"></a>
              		</div>
				</div>
					  <div class="col-lg-8 col-xl-9">
						<div class="row no-gutters justify-content-md-center justify-content-lg-between">
							  <div class="col-12 col-sm-4 col-lg-4 col-xl-2 col-xxl-3 text-sm-center text-lg-left">
								<div class="footer-quicklink">
									<h5>Infomation</h5>
									<a href="{{route('aboutus')}}">About us</a>
									<a href="{{route('checkout')}}">Check out</a>
									<a href="{{route('contactus')}}">Contact</a>
								</div>
							  </div>
							  <div class="col-12 col-sm-4 col-lg-4 col-xl-2 col-xxl-3 text-sm-center text-lg-left">
								<div class="footer-quicklink">
								<h5>My Account</h5>
								<a href="{{route('login')}}">My Account</a>
								<a href="{{route('contactus')}}">Contact</a>
								<a href="{{route('shopping.cart')}}">Shopping cart</a>
								<a href="{{route('shop')}}">Shop</a>
							</div>
							  </div>
							  <div class="col-12 col-sm-4 col-lg-4 col-xl-2 col-xxl-3 text-sm-center text-lg-left">
								<div class="footer-quicklink">
									<h5>Quick Shop</h5>
									<a href="{{route('aboutus')}}">About us</a>
									<a href="{{route('checkout')}}">Check out</a>
									<a href="{{route('contactus')}}">Contact</a>
								</div>
							  </div>
							  <div class="col-12 col-md-8 col-lg-8 col-xl-6 col-xxl-3 text-sm-center text-lg-left">
								<div class="newletter newletter_v2">
									<div class="newletter_text">
										<h5>Join Our Newsletter Now</h5>
										<p>Get E-mail updates about our latest shop and special offers.</p>
									</div>
									<div class="newletter_input">
										<input class="round-input" type="text" placeholder="Enter your email">
										<button>Subcribe</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="footer-credit">
		  <div class="text-center" style="font-family:Cera Pro Medium; font-size:20px;">
			<p>Copyright © 2019 <b> MahirShop </b> - All Rights Reserved.</p>  
		</div>
	</div>
</footer>
<!-- Footer Section End -->
@include('modal.quickview')
<!-- include jQuery -->
<script src="{{asset('public/frontend/assets/js/jquery.min.js')}}"></script>

<script src="{{ asset('public') }}/js/form.js" ></script>
<script src="{{ asset('public') }}/js/custom.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('public/frontend/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.easing.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/numscroller-1.0.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/vanilla-tilt.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/main.js')}}"></script>

<script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
  $('.coustom_carousell').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  autoplay: 1000,
  responsive:{
      0:{
        items:0
      },
      600:{
          items:1
      },
      1000:{
          items:3
      }
  }
});
</script>
	
<script>
  $('.coustom_carousel_brand').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  autoplay: 1000,
  responsive:{
      0:{
        items:0
      },
      600:{
          items:1
      },
      1000:{
          items:5
      }
  }
});
</script>
<script>
  $('.product_cat_carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  autoplay: 1000,
  responsive:{
      0:{
        items:0
      },
      600:{
          items:1
      },
      1000:{
          items:3
      }
  }
});
</script>
<script>
  $('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  autoplay: 1000,
  responsive:{
      0:{
        items:0
      },
      600:{
          items:1
      },
      1000:{
          items:3
      },
      1500:{
          items:5
      }
  }
});
</script>		
	<script type="text/javascript">
		$(document).on('click','.removeCartProduct',function(){
			let id = $(this).data('product_id');
			$(this).ajaxSubmit({
				data: { "product_id": id, "product_cart_remove": id },
				dataType: 'json',
				method: 'GET',
				url: "{{route('product.cart.update')}}",
				success: function (responseText) {
					$('.cart_check'+responseText.product_id).remove();
					cartUpdate(responseText);
				}
			});
		});
		
		$(document).on('click','.tt-btn-addtocart',function(){
			let id = $(this).data('product_id');
			$(this).ajaxSubmit({
				data: { "product_id": id },
				dataType: 'json',
				method: 'GET',
				url: "{{route('product.cart.update')}}",
				success: function (responseText) {
					cartUpdate(responseText);
				}
			});
		});
		
		function cartUpdate(data){
			if(data.status == 'success'){
				if($('.cart_check'+data.product_id).attr('cart_check') == data.product_id){
					$('#tt-quantity'+data.product_id).html(data.product_qty);
					$('#tt-price'+data.product_id).html(data.product_price);
					}else{
					var html = '<div class="cart-row tt-item cart_check'+data.product_id+'" data-product_id="tt-item'+data.product_id+'" cart_check="'+data.product_id+'">'+
					'    <div class="mt-h tt-item-descriptions">'+
					'        <span class="mt-h-title tt-title" id="tt-title'+data.product_id+'">'+data.product_name+'</span>'+
					'        <span class="price tt-price" id="tt-price'+data.product_id+'"> '+data.product_price+'</span>'+
					'        <span class="mt-h-title">Qty: <span class="tt-quantity" id="tt-quantity'+data.product_qty+'">'+data.product_qty+'</span></span>'+
					'    <a href="javascript:void(0)" data-product_id="'+data.product_id+'" class="close fa fa-times removeCartProduct"></a>'+
					'</div>';
					
					$(".tt-cart-content .tt-cart-list").append(html);
				}
			}
			$('.cartCount').html($('.tt-cart-list').find('.cart-row').length);
			$(".tt-cart-total-price").html(data.price_subtotal)
		}

		$(document).on('click', '.quickview', function(event) {
			$('#productView').modal('toggle');
		});
		
	</script>
	@yield('js')
</body>
</html>	