@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('profile.profile')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('admins.admins') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('merchants.merchants') </a>
				<a href="{{ route('merchants.admins.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admins.admins') </a>
				<span class="breadcrumb-item active"> @lang('admins.add_new_admin') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('admins.add_new_admin') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('merchants.admins.store') }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label> @lang('admins.name') </label>
								<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror " >
								@error('name')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
							<div class="col-md-4">
								<label> @lang('admins.phone') </label>
								<input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror " >
								@error('phone')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
							<div class="col-md-4">
								<label> @lang('admins.email') </label>
								<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror ">
								@error('email')
								<label  class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label> @lang('admins.username') </label>
								<input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror " >
								@error('username')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<label> @lang('admins.password') </label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
								@error('password')
								<label class="text-danger font-weight-bold "> {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<label> @lang('admins.password_confirmation') </label>
								<input type="password"  name="password_confirmation" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">

							<div class="col-md-4">
								<label> @lang('admins.address') </label>
								<input type="text" name="address" value="{{ old('address') }}" class="form-control form-input-styled @error('address') is-invalid @enderror">
								@error('address')
								<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<label> @lang('admins.notes') </label>
								<input type="text" name="notes" value="{{ old('notes') }}" class="form-control form-input-styled @error('address') is-invalid @enderror">

							</div>




						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label> @lang('admins.profile_picture') </label>
								<input type="file" name="profile_picture" class="form-control form-input-styled @error('profile_picture') is-invalid @enderror">
								@error('profile_picture')
								<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<label> @lang('admins.type') </label>
								<select name="type"  class="form-control" required="required">
									@foreach ($types as $type)
										<option value="{{ $type->id }}"> {{ $type['name_'.$lang] }} </option>
									@endforeach
								</select>
								@error('type')
								<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<div class="form-check form-check-switchery">
									<label class="form-check-label">
										<input type="checkbox" name="active" class="form-check-input-switchery" checked data-fouc>
										@lang('admins.active')
									</label>
								</div>
							</div>


						</div>
					</div>

					@error('permissions')

					<div class="alert alert-warning alert-styled-left alert-dismissible">
						<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
						@lang('admins.permissions_required')
					</div>

					@enderror

					<div class="form-group">
						<div class="row">
							@foreach ($groups as $group)
							<div class="col-md-4">
								<label>{{ $group['name_'.$lang ] }}</label>
								@foreach ($group->permissions as $permission)
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-input-styled permissions"  data-fouc>
										{{ $permission['description_'.$lang ] }}
									</label>
								</div>
								@endforeach
							</div>
							@endforeach
						</div>
					</div>




				</div>

				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('admins.add') </button>
					<a href="{{ route('merchants.admins.index') }}" class="btn btn-secondary "> @lang('admins.back') </a>
				</div>
			</form>
		</div>
		<!-- /account settings -->
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
<script>
	$(function() {




		$('.form-input-styled').uniform({
			fileButtonClass: 'action btn bg-primary'
		});


		var _componentSwitchery = function() {
			if (typeof Switchery == 'undefined') {
				console.warn('Warning - switchery.min.js is not loaded.');
				return;
			}


			var elems = Array.prototype.slice.call(document.querySelectorAll('.form-check-input-switchery'));
			elems.forEach(function(html) {
				var switchery = new Switchery(html);
			});

			var primary = document.querySelector('.form-check-input-switchery-primary');
			var switchery = new Switchery(primary, { color: '#2196F3' });
		};
    // Bootstrap switch
    var _componentBootstrapSwitch = function() {
    	if (!$().bootstrapSwitch) {
    		console.warn('Warning - switch.min.js is not loaded.');
    		return;
    	}

        // Initialize
        $('.form-check-input-switch').bootstrapSwitch();
    };
    _componentSwitchery();


});
</script>
@endsection