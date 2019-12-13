<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		
        <title>Me | Login</title>
		
        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="Syllo System Ltd.">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
        <link rel="shortcut icon" href="{{asset('public/backend/assets/media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/backend/assets/media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/backend/assets/media/favicons/apple-touch-icon-180x180.png')}}">
        <!-- END Icons -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('public/backend/assets/css/oneui.min.css')}}">
	</head>
    <body>
        <div id="page-container">
			
            <!-- Main Container -->
            <main id="main-container">
				
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('{{asset("public/backend/assets/media/photos/photo6@2x.jpg")}}');">
				<div class="hero-static bg-white-95">
				<div class="content">
				<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-4">
				<!-- Sign In Block -->
				<div class="block block-themed block-fx-shadow mb-0">
					<div class="block-header">
						<h3 class="block-title">Sign In</h3>
						<div class="block-options">
							<a class="btn-block-option font-size-sm" href="op_auth_reminder.html">Forgot Password?</a>
							
						</div>
					</div>
					<div class="block-content">
						<div class="p-sm-3 px-lg-4 py-lg-5">
							<h1 class="mb-2">MeGlobal Ltd.</h1>
							<p>Welcome, please login.</p>
							<form class="js-validation-signin" action="{{route('login') }}" method="POST">
								@csrf
								<div class="py-3">
									<div class="form-group">
										<input id="username" type="text" class="form-control form-control-alt form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
										@error('username')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group">
										<input id="password" type="password" class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
											<label class="custom-control-label font-w400" for="remember">{{ __('Remember Me') }}</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6 col-xl-5">
										<button type="submit" class="btn btn-block btn-primary">
											<i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
										</button>
									</div>
								</div>
							</form>
							<!-- END Sign In Form -->
						</div>
					</div>
				</div>
				<!-- END Sign In Block -->
			</div>
		</div>
	</div>
	<div class="content content-full font-size-sm text-muted text-center">
		<strong>MeGlobal</strong> &copy; <span data-toggle="year-copy">2019</span>
	</div>
</div>
</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
<script src="{{asset('public/backend/assets/js/oneui.core.min.js')}}"></script>
<script src="{{asset('public/backend/assets/js/oneui.app.min.js')}}"></script>

<script src="{{asset('public/backend/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- Page JS Code -->
<script src="{{asset('public/backend/assets/js/pages/op_auth_signin.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('public') }}/js/form.js" ></script>
<script src="{{ asset('public') }}/js/custom.js" ></script>

</body>
</html>
