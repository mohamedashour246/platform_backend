@php
$lang = session()->get('locale');
@endphp

<div class="navbar navbar-expand-md navbar-dark" style="background-color: #1abc9c !important;" >
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
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>


		</ul>

		<span class="badge bg-success-400 badge-pill ml-md-3 mr-md-auto">online</span>

		<ul class="navbar-nav">


			<li class="nav-item dropdown">
				<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
					<i class="icon-bell3"></i>
					<span class="d-md-none ml-2"> notifications </span>
					<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0"> 
						{{ App\Models\AdminNotification::where('admin_id' , Auth::guard('admin')->id())->where('seen'  , 0 )->count() }} 
						</span>
				</a>

				<div class="dropdown-menu dropdown-content dropdown-menu-right wmin-md-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold"> التنبيهات </span>

					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">

							@php

							$my_notifications = App\Models\AdminNotification::where('admin_id' , Auth::guard('admin')->id() )->latest()->take(10)->get();

							@endphp

							@foreach ($my_notifications as $notification)
							<li class="media">
								<div class="mr-3">
									<a href="#" class="btn bg-success-300 rounded-round btn-icon"><i class="icon-bell3"></i></a>
								</div>

								<div class="media-body">
									{{ $notification['title_'.$lang] }}
									<div class="font-size-sm text-muted mt-1"> {{ $notification->created_at->diffForHumans() }} </div>
								</div>
							</li>
							@endforeach



						</ul>
					</div>
					<div class="dropdown-content-footer bg-light">
						<a href="{{ url('/Board/notifications') }}" class="text-grey mr-auto">  الاطلاع على جميع التنبيهات </a>
					</div>
				</div>
			</li>

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
					<a href="{{ url('Board/language/en') }}" class="dropdown-item english"><img src="{{ asset('board_assets/global_assets/images/lang/gb.png') }}" class="img-flag"> English </a>
					<a href="{{ url('Board/language/ar') }}" class="dropdown-item ukrainian"><img src="{{ asset('board_assets/global_assets/images/lang/ar.png') }}" class="img-flag" > اللغه العربيه </a>
				</div>
			</li>

			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="{{ Storage::disk('s3')->url('admins/'.Auth::guard('admin')->user()->image) }}" class="rounded-circle mr-2" height="34" alt="">
					<span>{{ Auth::guard('admin')->user()->username }}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="{{ route('board.profile') }}" class="dropdown-item"><i class="icon-user-plus"></i> الملف الشخصى </a>
					<a href="{{ route('profile.password.edit') }}" class="dropdown-item"><i class="icon-cog5"></i> تغير كلمة المرور </a>
					<a href="{{ route('board.logout') }}" class="dropdown-item"><i class="icon-switch2"></i>  تسجيل الخروج </a>
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- /main navbar -->

