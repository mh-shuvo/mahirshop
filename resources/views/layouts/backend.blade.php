<!doctype html>
<html lang="en">
    <head>
        <title>MahirShop | @yield('title')</title>
	    <meta charset="UTF-8">
	    <meta name="description" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	    <link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico" />

	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">

	    <!-- STYLESHEETS -->
	    <style type="text/css">
	            [fuse-cloak],
	            .fuse-cloak {
	                display: none !important;
	            }
	        </style>

	    <!-- Icons.css -->
	    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/icons/fuse-icon-font/style.css')}}">
	    <!-- Animate.css -->
	    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/node_modules/animate.css/animate.min.css')}}">
	    <!-- PNotify -->
	    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/node_modules/pnotify/dist/PNotifyBrightTheme.css')}}">
	    <!-- Nvd3 - D3 Charts -->
	    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/node_modules/nvd3/build/nv.d3.min.css')}}"/>
	    <!-- Perfect Scrollbar -->
	    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}"/>
	    <!-- Fuse Html -->
	    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/fuse-html/fuse-html.min.css')}}"/>
	    <!-- Main CSS -->
	    <link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/main.css')}}">
	    <!-- / STYLESHEETS -->
		<style>
			.hide{
			display: none;
			}
		</style>
        @yield('css')
	</head>
    <body class="layout layout-vertical layout-left-navigation layout-above-toolbar layout-above-footer">
    <main>
        <nav id="toolbar" class="bg-white">

            <div class="row no-gutters align-items-center flex-nowrap">

                <div class="col"></div>

                <div class="col-auto">

                    <div class="row no-gutters align-items-center justify-content-end">

                        <div class="user-menu-button dropdown">

                            <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar-wrapper">
                                    <img class="avatar" src="{{asset('public/upload/user')}}/{{Auth::user()->profile_picture}}">
                                    <i class="status text-green icon-checkbox-marked-circle s-4"></i>
                                </div>
                                <span class="username mx-3 d-none d-md-block">{{Auth::user()->name}}</span>
                            </div>

                            <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">

                                <a class="dropdown-item" href="{{route('profile')}}">
                                    <div class="row no-gutters align-items-center flex-nowrap">
                                        <i class="icon-account"></i>
                                        <span class="px-3">My Profile</span>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                                    <div class="row no-gutters align-items-center flex-nowrap">
                                        <i class="icon-logout"></i>
                                        <span class="px-3">Logout</span>
                                    </div>
                                </a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="wrapper">
            <aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
                <div class="aside-content bg-primary-700 text-auto">

                    <div class="aside-toolbar">

                        <div class="logo">
                            <span class="logo-icon">MS</span>
                            <span class="logo-text">MahirShop</span>
                        </div>

                        <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                            <i class="icon icon-backburger"></i>
                        </button>

                    </div>

                    <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                    	<li class="nav-item">
                            <a class="nav-link ripple active" href="{{route('admin.index')}}" data-url="{{route('admin.index')}}">

                                  <i class="icon s-4 icon-tile-four"></i>


                                <span>Dashboards</span>
                            </a>
                        </li>

                        <li class="nav-item" role="tab" id="heading-dashboards">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-dashboards" href="#" aria-expanded="false" aria-controls="collapse-dashboards">

                                <i class="icon s-4 icon-tile-four"></i>

                                <span>Superadmin</span>
                            </a>
                            <ul id="collapse-dashboards" class='collapse' role="tabpanel" aria-labelledby="heading-dashboards" data-children=".nav-item">
                                <li class="nav-item">
									<a class="nav-link" href="{{route('admin.superadmin.member')}}">
										<span class="nav-main-link-name">Member</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.superadmin.topup')}}">
										<span class="nav-main-link-name">Topup</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.delars')}}">
										<span class="nav-main-link-name">Delers</span>
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.superadmin.users')}}">
										<span class="nav-main-link-name">Users</span>
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.superadmin.report')}}">
										<span class="nav-main-link-name">Income Report</span>
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.superadmin.withdrow')}}">
										<span class="nav-main-link-name">Withdraw</span>
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.report.sales')}}">
										<span class="nav-main-link-name">Sales Report</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.report.transaction')}}">
										<span class="nav-main-link-name">Transaction Report</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('admin.report.transfered')}}">
										<span class="nav-main-link-name">Transfered Report</span>
									</a>
								</li>

                            </ul>
                        </li>
                    </ul>
                </div>

            </aside>
          <div class="content-wrapper">
               <div class="content custom-scrollbar">

                    <div class="page-layout blank p-6 custom-scrollbar">
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<h2>@yield('title')</h2>
                    		</div>
                    	</div>
                        
	                    @yield('content')

                    </div>
                    

                </div>
        </div>
    </main>

		<!-- JAVASCRIPT -->
	    <!-- jQuery -->
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
	    <!-- Mobile Detect -->
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/mobile-detect/mobile-detect.min.js')}}"></script>
	    <!-- Perfect Scrollbar -->
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
	    <!-- Popper.js -->
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
	    <!-- Bootstrap -->
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	    <!-- Nvd3 - D3 Charts -->
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/d3/d3.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/nvd3/build/nv.d3.min.js')}}"></script>
	    <!-- Data tables -->
	    {{-- <script type="text/javascript" src="{{asset('public/assets/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script> --}}
	    {{-- <script type="text/javascript" src="{{asset('public/assets/node_modules/datatables-responsive/js/dataTables.responsive.js')}}"></script> --}}
	    <!-- PNotify -->
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotify.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyStyleMaterial.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyButtons.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyCallbacks.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyMobile.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyHistory.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyDesktop.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyConfirm.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/pnotify/dist/iife/PNotifyReference.js')}}"></script>
	    <!-- Fuse Html -->
	    <script type="text/javascript" src="{{asset('public/assets/fuse-html/fuse-html.min.js')}}"></script>
	    <!-- Main JS -->
	    <script type="text/javascript" src="{{asset('public/assets/js/main.js')}}"></script>
	     <script type="text/javascript" src="{{asset('public/assets/js/apps/dashboard/project.js')}}"></script>
		<!-- DataTables -->
		<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
		
		<script type="text/javascript" src="{{asset('public/sweetalert/sweetalert.min.js')}}"></script>
		
		<script src="{{ asset('public') }}/js/form.js" ></script>
		<script src="{{ asset('public') }}/js/custom.js" ></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
