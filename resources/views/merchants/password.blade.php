@extends('merchants.layout.master')

@section('title')
@lang('board.home')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('profile.profile') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<span class="breadcrumb-item active"> @lang('profile.profile') </span>
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
				<div class="card-body bg-indigo-400 text-center card-img-top">
					<div class="card-img-actions d-inline-block mb-3">
						<img class="img-fluid rounded-circle" src="{{ Storage::disk('s3')->url('merchants/'.$merchant->image) }}" width="170" height="170" alt="">
					</div>

					<h6 class="font-weight-semibold mb-0">{{ $merchant->username }}</h6>
					<span class="d-block opacity-75"> welcome </span>
				</div>
			</div>
			<!-- /navigation -->

		</div>
		<!-- /sidebar content -->

	</div>
	<!-- /left sidebar component -->


	<!-- Right content -->
	<div class="tab-content w-100">

		@include('board.layout.messages')
		<div class="tab-pane fade active show" >

			<div class="card">
				<div class="card-header  bg-dark header-elements-inline">
					<h5 class="card-title"> @lang('profile.change_password') </h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>

				<div class="card-body">
					<form action="{{ route('merchants.password.update') }}"  method="POST">

						@csrf
						@method('PATCH')

						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('profile.new_password') </label>
									<input type="password" name="password" class="form-control  ">
									@error('password')
									<label class="text-danger is-invalid"> {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-6">
									<label> @lang('profile.repeat_password') </label>
									<input type="password" name="password_confirmation" class="form-control">
								</div>
							</div>
						</div>


						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label> @lang('profile.current_password') </label>
									<input type="password" name="current_password"  class="form-control">
									@error('current_password')
									<label class="text-danger is-invalid"> {{ $message }} </label>
									@enderror
								</div>

							</div>
						</div>


						<div class="text-right">
							<button type="submit" class="btn btn-warning"> @lang('profile.edit') </button>
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