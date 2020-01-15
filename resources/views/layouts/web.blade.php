<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- set the encoding of your site -->
		<meta charset="utf-8">
		<!-- set the viewport width and initial-scale on mobile devices -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> @yield('title')</title>
		<!-- include the site stylesheet -->
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700' rel='stylesheet' type='text/css'>


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
		<style type="text/css">
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
			  <div class="social-link d-flex"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"> </i></a></div>
			  <div class="language">
				<div class="selected-language"><img src="assets/images/homepage01/usa.jpg" alt="">English<i class="arrow_carrot-down"></i>
				  <ul class="list-language">
					<li><img src="assets/images/homepage01/usa.jpg" alt="">English</li>
					<li><img src="assets/images/homepage01/usa.jpg" alt="">Spain</li>
					<li><img src="assets/images/homepage01/usa.jpg" alt="">Japan</li>
				  </ul>
				</div>
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
	<nav class="navigation navigation_v2 d-flex align-items-center">
	  <div class="ogami-container-fluid">
		<div class="row align-items-xxl-center">
		<div class="col-12 col-xl-6 col-xxxl-1 text-lg-center text-xl-left order-xl-1 order-xxxl-1"><a style="font-size:25px; color:green; text-decoration:none;" class="logo" href="{{route('welcome')}}"><img src="" alt="">MAHIR SHOP</a></div>
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
						<li><a href="{{$category->id}}">{{$category->category_name}}</a></li>
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
		  <div class="col-8 col-xl-6 col-xxxl-5 order-xl-4 order-xxxl-3">
			<div class="navgition-menu d-flex align-items-center justify-content-center justify-content-xl-center">
			  <ul class="mb-0">
				
				<li class="toggleable"><a class="menu-item active" href="{{route('welcome')}}">Home</a></li>
				<li class="toggleable"><a class="menu-item" href="{{route('shop')}}">Our Product</a></li>
				<li class="toggleable"><a class="menu-item" href="{{route('aboutus')}}">Aboutus</a></li>
				<li class="toggleable"><a class="menu-item" href="{{route('contactus')}}">Contactus</a></li>
			  </ul>
			</div>
		  </div>
		  <div class="col-4 col-xl-6 col-xxxl-2 order-xl-2 order-xxxl-4">
			<div class="product-function d-flex align-items-center justify-content-center justify-content-xl-end">
			  <div id="wishlist"><a class="function-icon icon_heart_alt" href=""></a></div>
			  <div id="cart"><a class="function-icon icon_bag_alt" href=""><span>$150.00			</span></a></div>
			</div>
		  </div>
		</div>
	  </div>
	</nav>
	<!-- Navigation Bar End-->
  </header>
<!-- Header Seciton End-->

@yield('content')



<!-- Footer Section Start -->
<footer>
	<div class="ogami-container-fluid">
		<div class="footer-v2_header">
			<div class="row">
				<div class="col-12 col-lg-4 col-xl-3 text-sm-center text-lg-left">
					<div class="footer-logo"><img src="assets/images/logo.png" alt="">
				</div>
				<div class="footer-contact">
					<p>Address: 60-49 Road 11378 New York</p>
					<p>Phone: +65 11.188.888</p>
					<p>Email: info.deercreative@gmail.com</p>
				</div>
				<div class="footer-social">
					<a class="round-icon-btn" href=""><i class="fab fa-facebook-f"> </i></a><a class="round-icon-btn" href=""><i class="fa fa-twitter"></i></a><a class="round-icon-btn" href=""><i class="fab fa-invision"> </i></a><a class="round-icon-btn" href=""><i class="fab fa-pinterest-p"></i></a></div>
				  </div>
				  <div class="col-lg-8 col-xl-9">
					<div class="row no-gutters justify-content-md-center justify-content-lg-between">
						  <div class="col-12 col-sm-4 col-lg-4 col-xl-2 col-xxl-3 text-sm-center text-lg-left">
							<div class="footer-quicklink">
								<h5>Infomation</h5><a href="about_us.html">About us</a><a href="checkout.html">Check out</a><a href="contact.html">Contact</a><a href="about_us.html">Service</a>
							</div>
						  </div>
						  <div class="col-12 col-sm-4 col-lg-4 col-xl-2 col-xxl-3 text-sm-center text-lg-left">
							<div class="footer-quicklink">
							<h5>My Account</h5><a href="{{route('login')}}">My Account</a><a href="contact.html">Contact</a><a href="shop_cart.html">Shopping cart</a><a href="shop_grid+list_3col.html">Shop</a>
							</div>
						  </div>
						  <div class="col-12 col-sm-4 col-lg-4 col-xl-2 col-xxl-3 text-sm-center text-lg-left">
							<div class="footer-quicklink">
								<h5>Quick Shop</h5><a href="about_us.html">About us</a><a href="checkout.html">Check out</a><a href="contact.html">Contact</a><a href="about_us.html">Service</a>
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
	<div class="footer-credit">
		  <div class="ogami-container-fluid">
			<div class="footer-creadit_block d-flex flex-column flex-md-row justify-content-start 				justify-content-md-between align-items-baseline align-items-md-center">
				  <p class="author">Copyright © 2019 Ogami - All Rights Reserved.</p>
				  <img class="payment-method" src="assets/images/payment.png" alt="">
			</div>
		</div>
	</div>
</footer>
<!-- Footer Section End -->

</div><!-- W1 end here -->
	<span id="back-top" class="fa fa-arrow-up"></span>
</div>
<!-- include jQuery -->
<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<!-- include jQuery -->
<script src="{{asset('public/frontend/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('public/sweetalert/sweetalert.min.js')}}"></script>
<!-- include jQuery -->
<script src="{{asset('public/frontend/js/jquery.main.js')}}"></script>
<script src="{{ asset('public') }}/js/form.js" ></script>
<script src="{{ asset('public') }}/js/custom.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('public/frontend/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.easing.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/parallax.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/numscroller-1.0.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/vanilla-tilt.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/main.js')}}"></script>
<script>
  var sence = document.getElementById('img-block')
  var parallaxInstance = new Parallax(sence, {
      hoverOnly: true,
  });
</script>
<script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
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
		
		
	</script>
	@yield('js')
</body>
</html>	