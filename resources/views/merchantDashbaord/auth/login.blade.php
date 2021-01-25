<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/lang.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('board_assets/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script src="{{ asset('board_assets/rtl/assets/js/app.js') }}"></script>
	<!-- /theme JS files -->

</head>

<body>



	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" action="{{ route('merchantDashbaord.login') }}" method="POST" >


					@include('board.layout.messages')

					@csrf
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-store2  icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">تسجيل الدخول الى لوحه تحكم المتجر </h5>
								<span class="d-block text-muted"> من فضلك قم بادخال بيانات الدخول </span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="username" class="form-control @error('username') is-invalid @enderror " placeholder="اسم المستخدم">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								@error('username')
								<label  class="text-danger" for="username">{{ $errors->first('username') }}</label>
								@enderror
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control @error('username') is-invalid @enderror" placeholder="كلمة لمرور">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								@error('username')
								<label  class="text-danger" for="username">{{ $errors->first('password') }}</label>
								@enderror
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> دخول <i class="icon-circle-left2 ml-2"></i></button>
							</div>

							<div class="text-center">
								<a href="login_password_recover.html">هل نسيت كلمة المرور</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

			@include('merchantDashbaord.layout.footer')

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
