<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand wmin-0 mr-5">
			<a href="{{ route('board.index') }}" class="d-inline-block">
				<img src="{{ asset('board_assets/logo.png') }}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">


				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-bell3"></i>
			{{-- 			<span class="d-md-none ml-2">Activity</span> --}}
						<span class="badge badge-mark border-orange-400 ml-auto ml-md-0">  </span>
					</a>

					<div class="dropdown-menu dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold"> التنبيهات </span>

						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-purple-300 rounded-round btn-icon"><i class="icon-truck"></i></a>
									</div>

									<div class="media-body">
										 هناك تنبيه جديد من الاداره بضروره التواصل معهم
										<div class="font-size-sm text-muted mt-1"> منذو اربع دقائق</div>
									</div>
								</li>

								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-warning-400 rounded-round btn-icon"><i class="icon-comment"></i></a>
									</div>

									<div class="media-body">
										 تم توصيل طلب التوصيل الخاص بك رقم #909483948 بنجاح
										<div class="font-size-sm text-muted mt-1"> منذو خمس ايام </div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3">
										<a href="#" class="btn bg-warning-400 rounded-round btn-icon"><i class="icon-comment"></i></a>
									</div>
									<div class="media-body">
										 تم توصيل طلب التوصيل الخاص بك رقم #999998888 بنجاح
										<div class="font-size-sm text-muted mt-1"> منذو 9 دقائق </div>
									</div>
								</li>
							</ul>
						</div>
						<div class="dropdown-content-footer bg-light">
							<a href="{{ url('/notificaions') }}" class="text-grey mr-auto">  الاطلاع على جميع التنبيهات </a>
						</div>
					</div>
				</li>
			</ul>

			<span class="badge bg-success-400 badge-pill ml-md-3 mr-md-auto"> Online Now </span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">

					@php
					$lang = App::getLocale();
					@endphp

					@if ($lang == 'en')
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('board_assets/global_assets/images/lang/gb.png') }}" class="img-flag mr-2" alt="">
						English
					</a>
					@else
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('board_assets/global_assets/images/lang/ar.png') }}" class="img-flag mr-2" alt="">
						اللغه العربيه
					</a>
					@endif

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{ url('Merchant/language/en') }}" class="dropdown-item english"><img src="{{ asset('board_assets/global_assets/images/lang/gb.png') }}" class="img-flag"> English </a>
						<a href="{{ url('Merchant/language/ar') }}" class="dropdown-item ukrainian"><img src="{{ asset('board_assets/global_assets/images/lang/ar.png') }}" class="img-flag" > اللغه العربيه </a>
					</div>
				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{ Storage::disk('s3')->url('merchants/'.Auth::guard('merchant')->user()->image) }}" class="rounded-circle mr-2" height="34" alt="">
						<span>{{ Auth::guard('merchant')->user()->username }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{ route('merchants.profile.edit') }}" class="dropdown-item"><i class="icon-user-plus"></i> الملف الشخصى </a>
						<a href="{{ route('merchants.password.edit') }}" class="dropdown-item"><i class="icon-cog5"></i> تغير كلمة المرور </a>
						<a href="{{ route('merchants.logout') }}" class="dropdown-item"><i class="icon-switch2"></i>  تسجيل الخروج </a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

