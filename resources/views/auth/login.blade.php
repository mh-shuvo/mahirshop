<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		
        <title>Me | Login</title>
		
        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="Syllo System Ltd.">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
	</head>
    <body id="login">
        <div class="layout layout-vertical layout-left-navigation layout-above-toolbar layout-above-footer">
			<main>
				<div class="wrapper">
					
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8">

                            <div class="logo bg-secondary">
                                <span>MS</span>
                            </div>

                            <div class="title mt-4 mb-8">Log in to your account</div>

                            <form action="{{route('login') }}" method="POST">
                            	@csrf
                                <div class="form-group mb-4">
										<input id="username" type="text" class="form-control form-control-alt text-default form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
										@error('username')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
										<label for="username">Username</label>
									</div>
									<div class="form-group mb-4">
										<input id="password" type="password" class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
										<label for="password">Password</label>
									</div>

                                <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                                    <div class="form-check remember-me mb-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-label="Remember Me" />
                                            <span class="checkbox-icon"></span>
                                            <span class="form-check-description">Remember Me</span>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                                    LOG IN
                                </button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
				</div>
			</main>
		</div>
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
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
	    <script type="text/javascript" src="{{asset('public/assets/node_modules/datatables-responsive/js/dataTables.responsive.js')}}"></script>
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
		
		<script src="{{ asset('public') }}/js/form.js" ></script>
		<script src="{{ asset('public') }}/js/custom.js" ></script>

</body>
</html>
