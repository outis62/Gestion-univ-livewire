<!doctype html>
<html lang="fr" dir="ltr">
  <head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/assets/images/brand/logo.png')}}" />
		<title>{{config('app.name')}}</title>

		<link href="{{asset('assets/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets/assets/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/assets/css/skin-modes.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/assets/css/dark-style.css')}}" rel="stylesheet"/>

		<link href="{{asset('assets/assets/plugins/single-page/css/main.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('assets/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<link href="{{asset('assets/assets/css/icons.css')}}" rel="stylesheet"/>

		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/assets/colors/color1.css')}}" />

	</head>

	<body class="app sidebar-mini">

		<div class="login-img">

			<div id="global-loader">
				<img src="{{asset('assets/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
			</div>

			<div class="page">
				<div class="">
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                                @csrf
								<span class="login100-form-title">
									<img src="{{asset('assets/assets/images/brand/logo.png')}}"/>
								</span>
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
									<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Renseigner votre e-mail" @old('email')>
                                    @error('email')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Renseigner votre mot de passe" @old('password')>
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
									</span>
                                    @error('password')
                                    <div class="form-text invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="text-right pt-1">
									<p class="mb-0"><a href="javascript:void(0)" class="text-danger ml-1">Mot de passe oublié?</a></p>
								</div>
								<div class="container-login100-form-btn">
                                    <button class="login100-form-btn btn-primary" type="submit">Se Connecter</button>
								</div>
								<div class="text-center pt-3">
									<p class="text-dark mb-0">Vous n'avez pas un compte?<a href="{{route('register')}}" class="text-primary ml-1">S'inscrire</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{asset('assets/assets/js/jquery-3.4.1.min.js')}}"></script>
		<script src="{{asset('assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/assets/js/jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets/assets/js/circle-progress.min.js')}}"></script>
		<script src="{{asset('assets/assets/plugins/rating/jquery.rating-stars.js')}}"></script>
		<script src="{{asset('assets/assets/iconfonts/eva.min.js')}}"></script>
		<script src="{{asset('assets/assets/plugins/input-mask/jquery.mask.min.js')}}"></script>
		<script src="{{asset('assets/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
		<script src="{{asset('assets/assets/js/custom.js')}}"></script>

	</body>
</html>
