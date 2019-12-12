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
		<!-- include the site stylesheet -->
		<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.css')}}">
		<!-- include the site stylesheet -->
		<link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
		<!-- include the site stylesheet -->
		<link rel="stylesheet" href="{{asset('public/frontend/css/icon-fonts.css')}}">
		<!-- include the site stylesheet -->
		<link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">
		<!-- include the site stylesheet -->
		<link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/sweetalert/sweetalert.css')}}">
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
			<div id="pre-loader" class="loader-container">
				<div class="loader">
					<img src="images/svg/rings.svg" alt="loader">
				</div>
			</div>
			<!-- W1 start here -->
			<div class="w1">
				<!-- mt header style4 start here -->
				<header id="mt-header" class="style4">
					<!-- mt bottom bar start here -->
					<div class="mt-bottom-bar">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<!-- mt logo start here -->
									<div class="mt-logo"><a href="#"><img src="{{asset('public/logo/logo_w.png')}}" style="height:50px;" alt="MeGlobal"></a></div>
									<!-- mt icon list start here -->
									<ul class="mt-icon-list">
										<li class="hidden-lg hidden-md">
											<a href="#" class="bar-opener mobile-toggle">
												<span class="bar"></span>
												<span class="bar small"></span>
												<span class="bar"></span>
											</a>
										</li>
										<!--li><a href="#" class="icon-magnifier"></a></li-->
										<li class="drop">
											<a href="#" class="cart-opener">
												<span class="icon-handbag"></span>
												<span class="num cartCount">@if(Session::has('cart')){{ count(Session::get('cart'))}}@else 0 @endif</span>
											</a>
											<!-- mt drop start here -->
											<div class="mt-drop">
												<!-- mt drop sub start here -->
												<div class="mt-drop-sub">
													<!-- mt side widget start here -->
													<div class="mt-side-widget tt-cart-content">
														<div class="tt-cart-list">
															@if(Session::has('cart'))
															<?php 
																$cardData = Session::get('cart'); 
															?>
															@foreach( $cardData as $value)
															
															<!-- cart row start here -->
															<div class="cart-row tt-item cart_check{{$value['product_id']}}" data-product_id="{{$value['product_id']}}" cart_check="{{$value['product_id']}}" id="tt-item{{$value['product_id']}}"
															>
																
																<div class="mt-h tt-item-descriptions">
																	
																	<span class="mt-h-title tt-title"id="tt-title{{$value['product_id']}}">{{$value['product_name']}}</span>
																	
																	<span class="price tt-price" id="tt-price{{$value['product_id']}}"> {{$value['product_price']}}</span>
																	<span class="mt-h-title">Qty: <span class="tt-quantity" id="tt-quantity{{$value['product_id']}}">{{$value['product_qty']}}</span></span>
																</div>
																<a href="javascript:void(0)" data-product_id="{{$value['product_id']}}" class="close fa fa-times removeCartProduct"></a>
															</div><!-- cart row end here -->
															
															@endforeach
															@endif
														</div>						
														<?php 
															$subPriceTotal = 0;
															$subPointTotal = 0;
														?>
														@if(Session::has('cart_total'))
														<?php 
															$cardTotalData = Session::get('cart_total');
															$subPriceTotal = $cardTotalData['price_subtotal'];
															$subPointTotal = $cardTotalData['price_subtotal'];
														?>
														@endif
														<!-- cart row total start here -->
														<div class="cart-row-total">
															<span class="mt-total tt-cart-total-title">Sub Total</span>
															<span class="mt-total-txt tt-cart-total-price"> {{$subPriceTotal}}</span>
														</div>
														<!-- cart row total end here -->
														<div class="cart-btn-row">
															<a href="{{route('shopping.cart')}}" class="btn-type2">VIEW CART</a>
															<a href="{{route('checkout')}}" class="btn-type3">CHECKOUT</a>
														</div>
													</div><!-- mt side widget end here -->
												</div>
												<!-- mt drop sub end here -->
											</div><!-- mt drop end here -->
											<span class="mt-mdropover"></span>
										</li>
										@guest
										<li>
											<a href="#" class="bar-opener side-opener">
												<span class="bar"></span>
												<span class="bar small"></span>
												<span class="bar"></span>
											</a>
										</li>
										@endguest
									</ul><!-- mt icon list end here -->
									<!-- navigation start here -->
									<nav id="nav">
										<ul>
											<li>
												<a href="{{route('welcome')}}">HOME <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
											</li>
											
											<li>
											<a href="{{route('shop')}}">shop</i></a>
										</li>
										<li>
											<a href="{{route('aboutus')}}">About Us</a>
										</li>
										<li>
											<a href="{{route('contactus')}}">Contact Us</a>
										</li>
										@guest
										<li>
											<a href="{{route('login')}}">Login</a>
										</li>
										@else
										<li>
											<a href="{{route('admin.index')}}">Dashboard</a>
										</li>
										@endguest
										
									</ul>
								</nav>
								<!-- mt icon list end here -->
							</div>
						</div>
					</div>
				</div>
				<!-- mt bottom bar end here -->
				<span class="mt-side-over"></span>
			</header><!-- mt header style4 end here -->
			<!-- mt side menu start here -->
			<div class="mt-side-menu">
				<!-- mt holder start here -->
				<div class="mt-holder">
					<a href="#" class="side-close"><span></span><span></span></a>
					<strong class="mt-side-title">MY ACCOUNT</strong>
					<!-- mt side widget start here -->
					<div class="mt-side-widget">
						<header>
							<span class="mt-side-subtitle">SIGN IN</span>
							<p>Welcome back! Sign in to Your Account</p>
						</header>
						<form class="js-validation-signin" action="{{route('login') }}" method="POST">
							@csrf
							<fieldset>
								<input id="username" type="text" class="input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="off" autofocus>
								@error('username')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
								<input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required placeholder="Password"  autocomplete="off">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
								<div class="box">
									<span class="left"><input type="checkbox" class="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<label class="check1" for="remember">{{ __('Remember Me') }}</label></span>
									<a href="#" class="help">Help?</a>
								</div>
								<button type="submit" class="btn-type1">Login</button>
							</fieldset>
						</form>
					</div>
				</div>
				<!-- mt holder end here -->
			</div><!-- mt side menu end here -->
			<!-- mt search popup start here -->
			<div class="mt-search-popup">
				<div class="mt-holder">
					<a href="#" class="search-close"><span></span><span></span></a>
					<div class="mt-frame">
						<form action="#">
							<fieldset>
								<input type="text" placeholder="Search...">
								<span class="icon-microphone"></span>
								<button class="icon-magnifier" type="submit"></button>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- mt search popup end here -->
			<!-- mt main slider start here -->
			
			@yield('content')
			
			<!-- mt main end here -->
			<!-- footer of the Page -->
			<footer id="mt-footer" class="style1 wow fadeInUp" data-wow-delay="0.4s">
				<!-- Footer Holder of the Page -->
				{{--<div class="footer-holder dark">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomsm">
								<!-- F Widget About of the Page -->
								<div class="f-widget-about">
									<div class="logo">
										<a href="index.html"><img src="images/logo.png" alt="Schon"></a>
									</div>
									<p>Exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<!-- Social Network of the Page -->
									<ul class="list-unstyled social-network">
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
									</ul>
									<!-- Social Network of the Page end -->
								</div>
								<!-- F Widget About of the Page end -->
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomsm">
								<div class="f-widget-news">
									<h3 class="f-widget-heading">Twitter</h3>
									<div class="news-articles">
										<div class="news-column">
											<i class="fa fa-twitter"></i>
											<div class="txt-box">
												<p>Laboris nisi ut <a href="#">#schön</a> aliquip econse- <br>quat. <a href="#">https://t.co/vreNJ9nEDt</a></p>
											</div>
										</div>
										<div class="news-column">
											<i class="fa fa-twitter"></i>
											<div class="txt-box">
												<p>Ficia deserunt mollit anim id est labo- <br>rum. incididunt ut labore et dolore <br><a href="#">https://t.co/vreNJ9nEDt</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomxs">
								<!-- Footer Tabs of the Page -->
								<div class="f-widget-tabs">
									<h3 class="f-widget-heading">Product Tags</h3>
									<ul class="list-unstyled tabs">
										<li><a href="#">Sofas</a></li>
										<li><a href="#">Armchairs</a></li>
										<li><a href="#">Living</a></li>
										<li><a href="#">Bedroom</a></li>
										<li><a href="#">Lighting</a></li>
										<li><a href="#">Tables</a></li>
										<li><a href="#">Pouf</a></li>
										<li><a href="#">Wood</a></li>
										<li><a href="#">Office</a></li>
										<li><a href="#">Outdoor</a></li>
										<li><a href="#">Kitchen</a></li>
										<li><a href="#">Stools</a></li>
										<li><a href="#">Footstools</a></li>
										<li><a href="#">Desks</a></li>
									</ul>
								</div>
								<!-- Footer Tabs of the Page -->
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 text-right">
								<!-- F Widget About of the Page -->
								<div class="f-widget-about">
									<h3 class="f-widget-heading">Information</h3>
									<ul class="list-unstyled address-list align-right">
										<li><i class="fa fa-map-marker"></i><address>Connaugt Road Central Suite 18B, 148 <br>New Yankee</address></li>
										<li><i class="fa fa-phone"></i><a href="tel:15553332211">+1 (555) 333 22 11</a></li>
										<li><i class="fa fa-envelope-o"></i><a href="mailto:&#105;&#110;&#102;&#111;&#064;&#115;&#099;&#104;&#111;&#110;&#046;&#099;&#104;&#097;&#105;&#114;">&#105;&#110;&#102;&#111;&#064;&#115;&#099;&#104;&#111;&#110;&#046;&#099;&#104;&#097;&#105;&#114;</a></li>
									</ul>
								</div>
								<!-- F Widget About of the Page end -->
							</div>
						</div>
					</div>
				</div>--}}
				<!-- Footer Holder of the Page end -->
				<!-- Footer Area of the Page -->
				<div class="footer-area">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<p>© <a href="index.html">ME Global LTD.</a> - All rights Reserved</p>
							</div>
							<div class="col-xs-12 col-sm-6 text-right">
								<div class="bank-card">
									<img src="images/bank-card.png" alt="bank-card">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer Area of the Page end -->
			</footer><!-- footer of the Page end -->
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