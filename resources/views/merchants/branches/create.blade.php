@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('branches.add_new_branch')
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
				<span class="breadcrumb-item active"> @lang('branches.add_new_branch') </span>
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
				<h5 class="card-title"> @lang('branches.add_new_branch') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('merchants.branches.store') }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf
					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('branches.branch_data') </span> </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('branches.branch_name') </label>
									<input type="text" name="branch_name" value="{{ old('branch_name') }}" class="form-control @error('branch_name') is-invalid @enderror " >
									@error('branch_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('branches.phones') </label>
									<input type="text" name="phones" value="{{ old('phones') }}" class="form-control @error('phones') is-invalid @enderror " >
									@error('phones')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('branches.governorate') </label>
									<select name="governorate_id"  class="form-control " required="required">
										<option value=""></option>
										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}"> {{ $governorate['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('governorate')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>


						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label> @lang('branches.city') </label>
									<select name="city_id"  class="form-control city" required="required">
										<option value=""></option>
									</select>
									@error('city_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.place_number') </label>
									<input type="text" name="place_number" value="{{ old('place_number') }}" class="form-control @error('place_number') is-invalid @enderror " >
									@error('place_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.street_name') </label>
									<input type="text" name="street_name" value="{{ old('street_name') }}" class="form-control @error('street_name') is-invalid @enderror " >
									@error('street_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.avenue_number') </label>
									<input type="text" name="avenue_number" value="{{ old('avenue_number') }}" class="form-control @error('avenue_number') is-invalid @enderror " >
									@error('avenue_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">

								<div class="col-md-3">
									<label> @lang('customers.building_number') </label>
									<input type="text" name="building_number" value="{{ old('building_number') }}" class="form-control @error('building_number') is-invalid @enderror " >
									@error('building_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>


								<div class="col-md-3">
									<label> @lang('customers.floor_number') </label>
									<input type="text" name="floor_number" value="{{ old('floor_number') }}" class="form-control @error('floor_number') is-invalid @enderror " >
									@error('floor_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.apratment_number') </label>
									<input type="text" name="apratment_number" value="{{ old('apratment_number') }}" class="form-control @error('apratment_number') is-invalid @enderror " >
									@error('apratment_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('customers.building_type') </label>
									<select name="building_type"  class="form-control select" required="required">
										@foreach ($building_types as $building_type)
										<option value="{{ $building_type->id }}"> {{ $building_type['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('building_type')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>

						<div class="form-group">


							<div id="map" style="width: 100%; height: 400px;" ></div>
							<input type="hidden" name="latitude" value=""  id="latitude" >
							<input type="hidden" name="longitude" value="" id="longitude" >
						</div>

					</fieldset>
				</div>
				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('branches.add') </button>
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
{{-- <script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/typeahead_addresspicker.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/autocomplete_addresspicker.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/location.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/ui/prism.min.js') }}"></script> --}}
{{-- <script src="{{ asset('board_assets/global_assets/js/demo_pages/picker_location.js') }}"></script> --}}

<script>
	$(function() {







		var geocoder;
		var map;
		var address = "";
		var country = "الكويت";
		var governorate = '';
		var city = '';
		var street_name = '';
		var avenue_number = '';
		var place_number = '';
		var building_number = '';

		function initialize(address , zome ) {
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(29.378586, 47.990341);
			var myOptions = {
				zoom: zome,
				center: latlng,
				mapTypeControl: true,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
				},
				navigationControl: true,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("map"), myOptions);
			if (geocoder) {
				geocoder.geocode({
					'address': address
				}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
							map.setCenter(results[0].geometry.location);

							var infowindow = new google.maps.InfoWindow({
								content: '<b>' + address + '</b>',
								size: new google.maps.Size(150, 50)
							});

							var marker = new google.maps.Marker({
								position: results[0].geometry.location,
								map: map,
								title: address ,
								draggable: true,
								animation: google.maps.Animation.DROP,

							});
							var lat = results[0].geometry.location.lat();
							var lng = results[0].geometry.location.lng();
							$('input[name="longitude"]').val(lng);
							$('input[name="latitude"]').val(lat);
							google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map, marker);
							});
							google.maps.event.addListener(marker, 'dragend', function (event) {
								document.getElementById("latitude").value = this.getPosition().lat();
								document.getElementById("longitude").value = this.getPosition().lng();
							});

						} else {
							alert("No results found");
						}
					} else {
						alert("Geocode was not successful for the following reason: " + status);
					}
				});
			}
		}
		initialize( country , 11);
		$('.select').select2({
			minimumResultsForSearch: Infinity
		});


		$('select[name="governorate_id"]').on('change',  function(event) {
			event.preventDefault();
			governorate_id = $(this).find('option:selected').val();
			governorate = $(this).find('option:selected').text();
			address = country + ' - ' + governorate ;
			initialize(address , 15);

			$.ajax({
				url: '{{ url("/Merchant/get_governorate_cities") }}',
				type: 'GET',
				dataType: 'html',
				data: {governorate:governorate_id},
			})
			.done(function(data) {
				$('select.city').empty();
				$('select.city').append(data);
			});
		});


		$('select[name="city_id"]').on('change',  function(event) {
			event.preventDefault();
			city = $(this).find('option:selected').text();
			address = country + ' - ' + governorate + ' - ' + city;
			initialize(address , 16);
		});




		$('input[name="place_number"]').on('change',  function(event) {
			event.preventDefault();
			place_number = $(this).val();
			address = country + ' - ' + governorate + ' - ' + city + ' - قطعه  ' + place_number;
			initialize(address , 17);
		});


		$('input[name="street_name"]').on('change',  function(event) {
			event.preventDefault();
			street_name = $(this).val();
			address = country + ' - ' + governorate + ' - ' + city + ' - قطعه  ' + place_number + ' - شارع ' + street_name;
			initialize(address , 18);
		});



		$('input[name="avenue_number"]').on('change',  function(event) {
			event.preventDefault();
			avenue_number = $(this).val();
			address = country + ' - ' + governorate + ' - ' + city + ' - قطعه  ' + place_number + ' - شارع ' + street_name + ' - جاده ' + avenue_number ;
			initialize(address , 19);
		});


		$('input[name="building_number"]').on('change',  function(event) {
			event.preventDefault();
			building_number = $(this).val();
			address = country + ' - ' + governorate + ' - ' + city + ' - قطعه  ' + place_number + ' - شارع ' + street_name + ' - جاده ' + avenue_number + ' - مبنى ' + building_number ;
			initialize(address , 20);
		});




	});
</script>
@endsection