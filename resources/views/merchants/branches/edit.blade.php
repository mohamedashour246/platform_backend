@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('branches.edit_branch_details')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('branches.branches') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('merchants.branches.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('branches.branches') </a>
				<span class="breadcrumb-item active"> @lang('branches.edit_branch_details') </span>
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
				<h5 class="card-title"> @lang('branches.edit_branch_details') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('merchants.branches.update'  , ['branch' => $branch->id ] ) }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf
					@method('PATCH')
					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('branches.branch_data') </span> </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('branches.branch_name') </label>
									<input type="text" name="branch_name" value="{{  $branch->name }}" class="form-control @error('branch_name') is-invalid @enderror " >
									@error('branch_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('branches.phones') </label>
									<input type="text" name="phones" value="{{  $branch->phones }}" class="form-control @error('phones') is-invalid @enderror " >
									@error('phones')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('branches.address') </label>
									<input type="text" name="address" value="{{  $branch->address }}" class="form-control @error('address') is-invalid @enderror " >
									@error('address')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>


						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('branches.governorate') </label>
									<select name="governorate_id"  class="form-control select" required="required">

										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}" {{ $branch->governorate_id == $governorate->id ? 'selected="selected"' : '' }} > {{ $governorate['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('governorate')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('branches.governorate') </label>
									<select name="city_id"  class="form-control select city" required="required">
										@foreach ($cities as $city)
											<option value="{{ $city->id }}" {{ $branch->city_id == $city->id ? 'selected="selected"' : '' }} > {{ $city['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('city_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

							</div>
						</div>

						<div class="form-group">
							<div class="map-container locationpicker-default"></div>
							<input type="hidden" name="latitude" value="{{ $branch->latitude }}" >
							<input type="hidden" name="longitude" value="{{ $branch->longitude }}" >
						</div>

					</fieldset>
				</div>
				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('branches.edit') </button>
					<a href="{{ route('merchants.branches.index') }}" class="btn btn-secondary "> @lang('branches.back') </a>
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
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&amp;libraries=places"></script>

<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/typeahead_addresspicker.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/autocomplete_addresspicker.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/location.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/ui/prism.min.js') }}"></script>
{{-- <script src="{{ asset('board_assets/global_assets/js/demo_pages/picker_location.js') }}"></script> --}}

<script>
	$(function() {


        $('.locationpicker-default').locationpicker({
            radius: 150,
            scrollwheel: false,
            draggable: true,
            zoom: 10 ,
            location: {
                latitude: {{ $branch->latitude }} ,
                longitude: {{ $branch->longitude }}
            },
            onchanged: function(currentLocation, radius, isMarkerDropped) {
            	$('input[name="latitude"]').val(currentLocation.latitude);
            	$('input[name="longitude"]').val(currentLocation.longitude);
            },
        });



		$('.select').select2({
			minimumResultsForSearch: Infinity
		});



});
</script>
@endsection