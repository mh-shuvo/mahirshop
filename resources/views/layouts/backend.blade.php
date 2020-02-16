<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
		<title>MahirShop | @yield('title')</title>
		<!-- Custom CSS -->
		<link href="{{asset('public/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
		<link href="{{asset('public/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
		<!-- Custom CSS -->
		<link href="{{asset('public/assets/dist/css/style.min.css')}}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/sweetalert/sweetalert.css')}}">
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
		<style>
			.hide{
			display: none;
			}
		</style>
        @yield('css')
	</head>
    <body>
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper">
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			<header class="topbar">
				<nav class="navbar top-navbar navbar-expand-md navbar-dark">
					<div class="navbar-header">
						<!-- This is for the sidebar toggle which is visible on mobile only -->
						<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
							<i class="ti-menu ti-close"></i>
						</a>
						<!-- ============================================================== -->
						<!-- Logo -->
						<!-- ============================================================== -->
						<div class="navbar-brand">
							<a href="{{route('home')}}" class="logo">
								<!-- Logo icon -->
								<b class="logo-icon">
									<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
									<!-- Dark Logo icon -->
									<img src="{{asset('public/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
									<!-- Light Logo icon -->
								</b>
								<!--End Logo icon -->
								<!-- Logo text -->
								<span class="logo-text text-white">
									<!-- dark Logo text -->
									<img src="{{asset('public/frontend/assets/images/logo.png')}}"  style="height: 20%; width: 20%;" alt="logo" />
									<!-- Light Logo text -->
									MahirShop
								</span>
							</a>
							<a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
								<i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
							</a>
						</div>
						<!-- ============================================================== -->
						<!-- End Logo -->
						<!-- ============================================================== -->
						<!-- ============================================================== -->
						<!-- Toggle which is visible on mobile only -->
						<!-- ============================================================== -->
						<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<i class="ti-more"></i>
						</a>
					</div>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<div class="navbar-collapse collapse" id="navbarSupportedContent">
						<!-- ============================================================== -->
						<!-- toggle and nav items -->
						<!-- ============================================================== -->
						<ul class="navbar-nav float-left mr-auto">
							<!-- <li class="nav-item d-none d-md-block">
								<a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
								</a>
							</li> -->
							<!-- ============================================================== -->
							<!-- Search -->
							<!-- ============================================================== -->
							<li class="nav-item search-box">
								<a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-magnify font-20 mr-1"></i>
										<div class="ml-1 d-none d-sm-block">
											<span>Search</span>
										</div>
									</div>
								</a>
								<form class="app-search position-absolute">
									<input type="text" class="form-control" placeholder="Search &amp; enter">
									<a class="srh-btn">
										<i class="ti-close"></i>
									</a>
								</form>
							</li>
						</ul>
						<!-- ============================================================== -->
						<!-- Right side toggle and nav items -->
						<!-- ============================================================== -->
						<ul class="navbar-nav float-right">
							
							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="{{asset('public/upload/user')}}/{{Auth::User()->profile_picture}}" alt="user" class="rounded-circle" width="40">
									<span class="m-l-5 font-medium d-none d-sm-inline-block">{{Auth::User()->name}} <i class="mdi mdi-chevron-down"></i></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
									<span class="with-arrow">
										<span class="bg-primary"></span>
									</span>
									<div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
										<div class="">
											<img src="{{asset('public/upload/user')}}/{{Auth::User()->profile_picture}}" alt="User" class="rounded-circle" width="60">
										</div>
										<div class="m-l-10">
											<h4 class="m-b-0">{{Auth::User()->name}}</h4>
											<p class=" m-b-0">{{Auth::User()->email}}</p>
										</div>
									</div>
									<div class="profile-dis scrollable">
										<a class="dropdown-item" href="{{route('profile')}}">
										<i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
										
										<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										<i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
										</form>
										<div class="dropdown-divider"></div>
									</div>
									
								</div>
							</li>
							<!-- ============================================================== -->
							<!-- User profile and search -->
							<!-- ============================================================== -->
						</ul>
					</div>
				</nav>
			</header>
			<!-- ============================================================== -->
			<!-- End Topbar header -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			<aside class="left-sidebar">
				<!-- Sidebar scroll-->
				<div class="scroll-sidebar">
					<!-- Sidebar navigation-->
					<nav class="sidebar-nav">
						<ul id="sidebarnav">
							<li class="sidebar-item">
								<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.index')}}" aria-expanded="false">
									<i class="mdi mdi-cube-send"></i>
									<span class="hide-menu">Dashboard</span>
								</a>
							</li>
							@hasanyrole('admin|user')
							<li class="sidebar-item">
								<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.superadmin.member.create')}}" aria-expanded="false">
									<i class="mdi mdi-cube-send"></i>
									<span class="hide-menu">New Member</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.team')}}" aria-expanded="false">
									<i class="mdi mdi-cube-send"></i>
									<span class="hide-menu">My Team</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.designation')}}" aria-expanded="false">
									<i class="mdi mdi-cube-send"></i>
									<span class="hide-menu">Designation List</span>
								</a>
							</li>
							
							@hasanyrole('admin')
							<li class="sidebar-item">
								<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
									<i class="mdi mdi-av-timer"></i>
									<span class="hide-menu">Ecommerce </span>
									
								</a>
								<ul aria-expanded="false" class="collapse  first-level">
									<li class="sidebar-item">
										<a href="{{route('admin.product.create')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Add Product </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.product')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Product List </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.brand.index')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Brand </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.category.index')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Category </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.unit.index')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Unit </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.banner')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Banner </span>
										</a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
									<i class="mdi mdi-av-timer"></i>
									<span class="hide-menu">Superadmin </span>
									
								</a>
								<ul aria-expanded="false" class="collapse  first-level">
									<li class="sidebar-item">
										<a href="{{route('admin.superadmin.member')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Member </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.superadmin.topup')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Topup </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.delars')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Dealer </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.superadmin.users')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Users </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.superadmin.report')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Income Report </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.superadmin.withdrow')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> withdrow </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('packages')}}" aria-expanded="false">
											<i class="mdi mdi-cube-send"></i>
											<span class="hide-menu">Package</span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.sales')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Sales Report </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.transaction')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Transaction Report </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.transfered')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Transfered Report </span>
										</a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
									<i class="mdi mdi-av-timer"></i>
									<span class="hide-menu">Gallery </span>
									
								</a>
								<ul aria-expanded="false" class="collapse  first-level">
									<li class="sidebar-item">
										<a href="{{route('category.gallery.index')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Add Gallery Category </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('gallery.index')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Add Gallery </span>
										</a>
									</li>
									
								</ul>
							</li>
							@endhasanyrole
							@endhasanyrole
							<li class="sidebar-item">
								<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.topup')}}" aria-expanded="false">
									<i class="mdi mdi-cube-send"></i>
									<span class="hide-menu">Topup</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.withdrow')}}" aria-expanded="false">
									<i class="mdi mdi-cube-send"></i>
									<span class="hide-menu">Withdraw</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
									<i class="mdi mdi-av-timer"></i>
									<span class="hide-menu">Report </span>
									
								</a>
								<ul aria-expanded="false" class="collapse  first-level">
									
									
									<li class="sidebar-item">
										<a href="{{route('admin.report.sponsor_income')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Sponsor Income </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.matching_income')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Matching Income </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.club_achiver')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Club Income </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.generation')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Generation Income </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.stockiest_income')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Dealer Income </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.stockiest_sponsor_income')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Dealer Sponsor Income </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.daily_cash_back')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Daily CashBack Income </span>
										</a>
									</li>
									<li class="sidebar-item">
										<a href="{{route('admin.report.signup')}}" class="sidebar-link">
											<i class="mdi mdi-adjust"></i>
											<span class="hide-menu"> Signup Report </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
					<!-- End Sidebar navigation -->
				</div>
				<!-- End Sidebar scroll-->
			</aside>
			<!-- ============================================================== -->
			<!-- End Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Page wrapper  -->
			<!-- ============================================================== -->
			<div class="page-wrapper">
				<!-- ============================================================== -->
				<!-- Bread crumb and right sidebar toggle -->
				<!-- ============================================================== -->
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-5 align-self-center">
							<h4 class="page-title">@yield('title')
							</div>
							<div class="col-7 align-self-center">
								<div class="d-flex align-items-center justify-content-end">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="{{route('home')}}">Home</a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
										</ol>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<!-- ============================================================== -->
					<!-- End Bread crumb and right sidebar toggle -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- Container fluid  -->
					<!-- ============================================================== -->
					<div class="container-fluid">
						@yield('content')
					</div>
					<!-- ============================================================== -->
					<!-- End Container fluid  -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- footer -->
					<!-- ============================================================== -->
					<footer class="footer text-center">
						All Rights Reserved by MahirShop. Designed and Developed by
						<a href="https://quickoutsourceit.com">Quick Outsource IT</a>.
					</footer>
					<!-- ============================================================== -->
					<!-- End footer -->
					<!-- ============================================================== -->
				</div>
				<!-- ============================================================== -->
				<!-- End Page wrapper  -->
				<!-- ============================================================== -->
			</div>
			<!-- ============================================================== -->
			<!-- End Wrapper -->
			<!-- All Jquery -->
			<!-- ============================================================== -->
			<script src="{{asset('public/assets/libs/jquery/dist/jquery.min.js')}}"></script>
			<!-- Bootstrap tether Core JavaScript -->
			<script src="{{asset('public/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
			<script src="{{asset('public/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
			<!-- apps -->
			<script src="{{asset('public/assets/dist/js/app.min.js')}}"></script>
			<script src="{{asset('public/assets/dist/js/app.init.js')}}"></script>
			<script src="{{asset('public/assets/dist/js/app-style-switcher.js')}}"></script>
			<!-- slimscrollbar scrollbar JavaScript -->
			<script src="{{asset('public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
			<script src="{{asset('public/assets/extra-libs/sparkline/sparkline.js')}}"></script>
			<!--Wave Effects -->
			<script src="{{asset('public/assets/dist/js/waves.js')}}"></script>
			<!--Menu sidebar -->
			<script src="{{asset('public/assets/dist/js/sidebarmenu.js')}}"></script>
			<!--Custom JavaScript -->
			<script src="{{asset('public/assets/dist/js/custom.min.js')}}"></script>
			<!--This page JavaScript -->
			<script src="{{asset('public/assets/dist/js/pages/dashboards/dashboard1.js')}}"></script>
			<!-- DataTables -->
			<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="{{asset('public/sweetalert/sweetalert.min.js')}}"></script>
			<script src="{{ asset('public') }}/js/form.js" ></script>
			<script src="{{ asset('public') }}/js/custom.js" ></script>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
			<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.0/js.cookie.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					usernameCheck = function(element,elementStatus){
						element.ajaxSubmit({
							error: formError,
							method: 'post',
							dataType: 'json',
							data : {
								username : element.val()
							},
							url : '{{route('admin.member_check')}}',
							success: function (responseText) {
								$(elementStatus).html('');
								element.removeClass( "form-control-success" );
								element.removeClass( "form-control-danger" );
								if(responseText.status == 'success'){
									element.addClass( "form-control-success" );
									$(elementStatus).html(responseText.message);
									}else if(responseText.status == 'errors'){
									element.addClass( "form-control-danger" );
									$(elementStatus).html(responseText.message);
								}
							}
						});
					};
				});
			</script>
			@yield('js')
		</body>
	</html>
