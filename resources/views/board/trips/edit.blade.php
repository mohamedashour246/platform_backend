@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('drivers.edit_driver_details')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('drivers.drivers') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('drivers.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('drivers.drivers') </a>
				<span class="breadcrumb-item active"> @lang('drivers.edit_driver_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('board.layout.messages')
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('drivers.edit_driver_details') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('drivers.update' , ['driver'  => $driver->id ]) }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf
					@method('PATCH')
					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('drivers.basic_data') </span> </legend>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('drivers.code') </label>
									<input type="text" name="code" value="{{ $driver->code }}" class="form-control @error('code') is-invalid @enderror " >
									@error('code')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('drivers.name') </label>
									<input type="text" name="driver_name" value="{{ $driver->name }}" class="form-control @error('name') is-invalid @enderror " >
									@error('name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('drivers.phone') </label>
									<input type="text" name="phone" value="{{ $driver->phone }}" class="form-control @error('phone') is-invalid @enderror " >
									@error('phone')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('drivers.profile_picture') </label>
									<input type="file" name="profile_picture" class="form-control form-input-styled @error('profile_picture') is-invalid @enderror">
									@error('profile_picture')
									<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('drivers.notes') </label>
									<input type="text" name="notes" value="{{ $driver->notes }}" class="form-control" >
								</div>
								<div class="col-md-4">
									<label> @lang('drivers.country') </label>
									<select name="country_id"  class="form-control select2" >
										@foreach ($countries as $country)
										<option value="{{ $country->id }}" {{ $driver->country_id == $country->id ? 'selected="selected"' : '' }} >{{ $country['name_'.$lang] }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('drivers.car_number') </label>
									<input type="text" name="car_number" value="{{ $driver->car_number }}" class="form-control @error('car_number') is-invalid @enderror " >
									@error('car_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label > @lang('drivers.working_start_time') </label>
									<div class="input-group ">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-alarm"></i></span>
										</span>
										<input type="text" name="working_start_time" value="{{ $driver->working_start_time }}" class="form-control @error('working_start_time')  is-invalid @enderror   pickatime">
									</div>
									@error('working_start_time')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label > @lang('drivers.working_end_time') </label>
									<div class="input-group ">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-alarm"></i></span>
										</span>
										<input type="text" name="working_end_time" value="{{ $driver->working_end_time }}" class="form-control @error('working_end_time')  is-invalid @enderror  pickatime" >
									</div>
									@error('working_end_time')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('drivers.bounce') </label>
									<input type="text" name="bounce" value="{{ $driver->bounce }}" class="form-control @error('bounce') is-invalid @enderror " >
									@error('bounce')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<div class="form-check form-check-switchery mt-4">
										<label class="form-check-label">
											<input type="checkbox" name="active" class="form-check-input-switchery" {{ $driver->isActive() ? 'checked' : '' }}  data-fouc>
											@lang('drivers.active')
										</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-check form-check-switchery mt-4">
										<label class="form-check-label">
											<input type="checkbox" name="active" class="form-check-input-switchery" {{ $driver->isAvailable() ? 'checked' : '' }}  data-fouc>
											@lang('drivers.available')
										</label>
									</div>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend>  <span class="text-primary">  @lang('drivers.system_data') </span> </legend>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('drivers.username') </label>
									<input type="text" name="username" value="{{ $driver->username }}" class="form-control @error('username') is-invalid @enderror " >
									@error('username')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('drivers.password') </label>
									<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
									@error('password')
									<label class="text-danger font-weight-bold "> {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('drivers.password_confirmation') </label>
									<input type="password"  name="password_confirmation" class="form-control">
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend  class="text-primary" > @lang('drivers.current_profile_picture') </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
								
									<img class="img-responsive img-thumbnail" src="{{ Storage::disk('s3')->url('drivers/'.$driver->image) }}" alt="">
								</div>
							</div>
						</div>
					</fieldset>



				</div>

				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-warning float-right ml-2"> @lang('drivers.edit') </button>
					<a href="{{ route('drivers.index') }}" class="btn btn-secondary "> @lang('drivers.back') </a>
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
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>

<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/anytime.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>

<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>

{{-- <script src="{{ asset('board_assets/global_assets/js/demo_pages/picker_date_rtl.js') }}"></script> --}}
<script>
	$(function() {

		   // Default functionality
		   $('.pickatime').pickatime({
		   	formatSubmit: 'HH:i'
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