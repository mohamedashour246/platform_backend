@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
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
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('admins.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admins.admins') </a>
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
			<div class="card-header header-elements-inline">
				<h5 class="card-title"> @lang('admins.add_new_admin') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<form action="{{ route('admins.store') }}" method="POST"  enctype="multipart/form-data" >
					@csrf
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label> @lang('admins.username') </label>
								<input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror " >
								@error('username')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-6">
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
							<div class="col-md-6">
								<label> @lang('admins.password') </label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
								@error('password')
								<label class="text-danger font-weight-bold "> {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-6">
								<label> @lang('admins.password_confirmation') </label>
								<input type="password"  name="password_confirmation" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label> @lang('admins.profile_picture') </label>
								<input type="file" name="profile_picture" class="form-control form-input-styled @error('profile_picture') is-invalid @enderror">
								@error('profile_picture')
								<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-6">
								<label> @lang('admins.notes') </label>
								<textarea  name="notes"  class="form-control" rows="2" >{{ old('notes') }}</textarea>
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="form-check form-check-switchery">
									<label class="form-check-label">
										<input type="checkbox" name="active" class="form-check-input-switchery" checked data-fouc>
										@lang('admins.active')
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label> @lang('admins.type') </label>
									<select name="type" class="form-control select" data-fouc>
										<option value="admin"> @lang('admins.admin') </option>
										<option value="superadmin">@lang('admins.super_admin')</option>
									</select>
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



					<div class="text-right">
						<button type="submit" class="btn btn-primary"> @lang('admins.add') </button>
					</div>
				</form>
			</div>
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
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script>
	$(function() {
		// $("#firstname").attr("disabled", "disabled");

		$('select[name="type"]').on('select2:select', function(event) {
			
			var admin_type = $(event.currentTarget).val();
			console.log(admin_type);
			if (admin_type == 'superadmin') {
				$('input.permissions').each(function(){
					console.log(admin_type);
					$(this).prop('checked',true);
					$.uniform.update();
				});
			} else {
				$('input.permissions').each(function(){
					console.log(admin_type);
					$(this).prop('checked',false);
					$.uniform.update();
				});
			}
		});


		$('.select').select2({
			minimumResultsForSearch: Infinity
		});

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