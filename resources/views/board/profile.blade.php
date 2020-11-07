@extends('board.layout.master')

@section('title')
@lang('board.home')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('board.board') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<span class="breadcrumb-item active"> @lang('board.home') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<!-- Inner container -->
<div class="d-md-flex align-items-md-start">

	<!-- Left sidebar component -->
	<div class="sidebar  sidebar-light sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

		<!-- Sidebar content -->
		<div class="sidebar-content">

			<!-- Navigation -->
			<div class="card ">
				<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{ asset('board_assets/global_assets/images/backgrounds/panel_bg.png') }}); background-size: contain;">
					<div class="card-img-actions d-inline-block mb-3">
						<img class="img-fluid rounded-circle" src="{{ asset('board_assets/global_assets/images/placeholders/placeholder.jpg') }}" width="170" height="170" alt="">
					</div>

					<h6 class="font-weight-semibold mb-0">{{ $admin->username }}</h6>
					<span class="d-block opacity-75"> مدير النظام </span>
				</div>

				<div class="card-body p-0">
					<ul class="nav nav-sidebar mb-2">

						<li class="nav-item">
							<a href="#profile" class="nav-link" data-toggle="tab">
								<i class="icon-user"></i>
								@lang('profile.information')
							</a>
						</li>
						<li class="nav-item">
							<a href="#schedule" class="nav-link" data-toggle="tab">
								<i class="icon-key"></i>
								@lang('profile.change_password')
							</a>
						</li>
						<li class="nav-item-divider"></li>
						<li class="nav-item">
							<a href="{{ url('/Board/logout') }}" class="nav-link" data-toggle="tab">
								<i class="icon-switch2"></i>
								@lang('board.logout')
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- /navigation -->

		</div>
		<!-- /sidebar content -->

	</div>
	<!-- /left sidebar component -->


	<!-- Right content -->
	<div class="tab-content w-100">
		<div class="tab-pane fade active show" id="profile">

				@include('board.layout.messages')
			
			<!-- Profile info -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title"> @lang('profile.information') </h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					
					<form action="{{ route('board.profile.update') }}" method="POST" >
						@csrf
						@method('PATCH')
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('profile.username') </label>
									<input type="text" name="username" value="{{ $admin->username }}" class="form-control @error('username') is-invalid @enderror ">
									@error('username')
									<label class="text-danger is-invalid"> {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-6">
									<label>  @lang('profile.email') </label>
									<input type="text" name="email" value="{{ $admin->email }}" class="form-control @error('email') is-invalid @enderror ">
									@error('email')
									<label class="text-danger is-invalid"> {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('profile.profile_picture') </label>
									<input type="file" name="profile_picture" class="form-input-styled @error('profile_picture') is-invalid @enderror " data-fouc>
									@error('profile_picture')
									<label class="text-danger is-invalid"> {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary"> @lang('profile.save') </button>
						</div>
					</form>
				</div>
			</div>
			<!-- /profile info -->



		</div>

		<div class="tab-pane fade" id="schedule">
			<!-- Account settings -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Account settings</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>

				<div class="card-body">
					<form action="#">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Username</label>
									<input type="text" value="Kopyov" readonly="readonly" class="form-control">
								</div>

								<div class="col-md-6">
									<label>Current password</label>
									<input type="password" value="password" readonly="readonly" class="form-control">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>New password</label>
									<input type="password" placeholder="Enter new password" class="form-control">
								</div>

								<div class="col-md-6">
									<label>Repeat password</label>
									<input type="password" placeholder="Repeat new password" class="form-control">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Profile visibility</label>

									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" name="visibility" class="form-input-styled" checked data-fouc>
											Visible to everyone
										</label>
									</div>

									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" name="visibility" class="form-input-styled" data-fouc>
											Visible to friends only
										</label>
									</div>

									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" name="visibility" class="form-input-styled" data-fouc>
											Visible to my connections only
										</label>
									</div>

									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" name="visibility" class="form-input-styled" data-fouc>
											Visible to my colleagues only
										</label>
									</div>
								</div>

								<div class="col-md-6">
									<label>Notifications</label>

									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-input-styled" checked data-fouc>
											Password expiration notification
										</label>
									</div>

									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-input-styled" checked data-fouc>
											New message notification
										</label>
									</div>

									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-input-styled" checked data-fouc>
											New task notification
										</label>
									</div>

									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-input-styled">
											New contact request notification
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="text-right">
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /account settings -->


		</div>


	</div>
	<!-- /right content -->

</div>
<!-- /inner container -->

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_pages/user_pages_profile_tabbed.js') }}"></script>
@endsection