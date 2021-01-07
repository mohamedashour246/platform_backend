@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('customers.edit_customer_details')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('customers.customers') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('merchants.customers.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('customers.customers') </a>
				<span class="breadcrumb-item active"> @lang('customers.edit_customer_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<!-- Account settings -->

		@include('merchants.layout.messages')
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('customers.edit_customer_details') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('merchants.customers.update'  , ['customer' => $customer->id ] ) }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf
					@method('PATCH')
					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('customers.customer_data') </span> </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label> @lang('customers.customer_name') </label>
									<input type="text" name="name" value="{{  $customer->name }}" class="form-control @error('name') is-invalid @enderror " >
									@error('name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.business_type') </label>
									<input type="text" name="business_type" value="{{  $customer->business_type }}" class="form-control @error('business_type') is-invalid @enderror " >
									@error('business_type')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.phone1') </label>
									<input type="text" name="phone1" value="{{  $customer->phone1 }}" class="form-control @error('phone1') is-invalid @enderror " >
									@error('phone1')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.phone2') </label>
									<input type="text" name="phone2" value="{{  $customer->phone2 }}" class="form-control @error('phone2') is-invalid @enderror " >
									@error('phone2')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label> @lang('customers.governorate') </label>
									<select name="governorate"  class="form-control select" required="required">
										<option value=""></option>
										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}" {{ $governorate->id == $customer->governorate_id ? 'selected="selected"' : '' }} > {{ $governorate['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('governorate')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-3">
									<label> @lang('customers.city') </label>
									<select name="city" id="city"  class="form-control select city" required="required">
										@foreach ($cities as $city)
										<option value="{{ $city->id }}" {{ $city->id == $customer->city_id ? 'selected="selected"' : '' }} > {{ $city['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('city_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.place_number') </label>
									<input type="text" name="place_number" value="{{ $customer->place_number }}" class="form-control @error('place_number') is-invalid @enderror " >
									@error('place_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.street_name') </label>
									<input type="text" name="street_name" value="{{ $customer->street_name }}" class="form-control @error('street_name') is-invalid @enderror " >
									@error('street_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">

								<div class="col-md-3">
									<label> @lang('customers.avenue_number') </label>
									<input type="text" name="avenue_number" value="{{  $customer->avenue_number }}" class="form-control @error('avenue_number') is-invalid @enderror " >
									@error('avenue_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-3">
									<label> @lang('customers.building_number') </label>
									<input type="text" name="building_number" value="{{  $customer->building_number }}" class="form-control @error('building_number') is-invalid @enderror " >
									@error('building_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>


								<div class="col-md-3">
									<label> @lang('customers.floor_number') </label>
									<input type="text" name="floor_number" value="{{  $customer->floor_number }}" class="form-control @error('floor_number') is-invalid @enderror " >
									@error('floor_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.apratment_number') </label>
									<input type="text" name="apratment_number" value="{{  $customer->apratment_number }}" class="form-control @error('apratment_number') is-invalid @enderror " >
									@error('apratment_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>


								<div class="col-md-3">
									<label> @lang('customers.building_type') </label>
									<select name="building_type"  class="form-control select" required="required">
										@foreach ($building_types as $building_type)
										<option value="{{ $building_type->id }}"  {{ $customer->building_type_id == $building_type->id ? 'selected="selected"' : '' }} > {{ $building_type['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('building_type')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" id="us3-address">
							{{-- <div class="map-container locationpicker-default"></div> --}}
							<div id="us3" class="map-container"></div>
							<input type="hidden" name="latitude" value="{{ $customer->latitude }}"  id="us3-lat" >
							<input type="hidden" name="longitude" value="{{ $customer->longitude }}" id="us3-lon" >
						</div>

					</fieldset>
				</div>
				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('customers.edit') </button>
					<a href="{{ route('merchants.customers.index') }}" class="btn btn-secondary "> @lang('customers.back') </a>
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
<script src="{{ asset('board_assets/global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/typeahead_addresspicker.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/autocomplete_addresspicker.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/location.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/ui/prism.min.js') }}"></script>

{{-- <script src="{{ asset('board_assets/global_assets/js/demo_pages/picker_location.js') }}"></script> --}}

<script>
	$(function() {


		$('#us3').locationpicker({
			location: {latitude: {{ $customer->latitude }}, longitude: {{ $customer->longitude }}},
			radius: 0,
			scrollwheel: true,
			draggable: true,
			// addressFormat : 'الكويت  محافظه الجهراء' ,
			inputBinding: {
				latitudeInput: $('#us3-lat'),
				longitudeInput: $('#us3-lon'),
				radiusInput: $('#us3-radius'),
				locationNameInput: $('#us3-address')
			},
			geodecoder: new google.maps.Geocoder({
				'address': "" + "محافظه الجهراء " + ", الكويت"
			}) ,
			enableAutocomplete: true,
			enableReverseGeocode : true ,
			onchanged: function(currentLocation, radius, isMarkerDropped) {
				console.log(currentLocation);
				$('input[name="latitude"]').val(currentLocation.latitude);
				$('input[name="longitude"]').val(currentLocation.longitude);
			}
		});



		$('.select').select2({
			minimumResultsForSearch: Infinity
		});



	});
</script>
@endsection