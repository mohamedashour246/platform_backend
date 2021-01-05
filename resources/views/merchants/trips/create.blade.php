@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('trips.add_new_trip')
@endsection
@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('trips.trips') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('merchants.merchants') </a>
				<a href="{{ route('merchants.trips.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('trips.trips') </a>
				<span class="breadcrumb-item active"> @lang('trips.add_new_trip') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">

		@include('merchants.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('trips.add_new_trip') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('merchants.trips.store') }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf

					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('trips.trip_basic_data') </span> </legend>

						<div class="form-group">
							<div class="row">

								<div class="col-md-4">
									<label> @lang('trips.branch') </label>
									<select name="branch_id"  class="form-control branch_id" >
										@foreach ($branches as $branch)
											<option value="{{ $branch->id }}"> {{ $branch->name }} </option>
										@endforeach
									</select>
									@error('market_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('trips.order_price') </label>
									<input type="text" name="order_price" value="{{ old('order_price') }}" class="form-control @error('order_price') is-invalid @enderror " >
									@error('order_price')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">

								<div class="col-md-4">
									<div class="row">
										<div class="col-md-9">
											<label> @lang('trips.receipt_date_from_market') </label>
											<input type="text" name="receipt_date_from_market" class="form-control @error('receipt_date_from_market') is-invalid @enderror" id="pickadate1"
											value="{{ old('receipt_date_from_market') }}">
											@error('receipt_date_from_market')
											<label class="text-danger font-weight-bold " > {{ $message }} </label>
											@enderror
										</div>
										<div class="col-md-3">
											<label> @lang('trips.time') </label>
											<input type="text" name="receipt_time_from_market" class="form-control @error('receipt_date_from_market') is-invalid @enderror" id="pickatime1"
											value="{{ old('receipt_date_from_market') }}">
											@error('receipt_date_from_market')
											<label class="text-danger font-weight-bold " > {{ $message }} </label>
											@enderror
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-9">
											<label> @lang('trips.delivery_date_to_customer') </label>
											<input type="text" name="delivery_date_to_customer" class="form-control @error('delivery_date_to_customer') is-invalid @enderror" id="pickadate" 	value="{{ old('delivery_date_to_customer') }}" >
											@error('delivery_date_to_customer')
											<label class="text-danger font-weight-bold " > {{ $message }} </label>
											@enderror
										</div>
										<div class="col-md-3">
											<label> @lang('trips.time') </label>
											<input type="text" name="delivery_time_to_customer" class="form-control @error('delivery_date_to_customer') is-invalid @enderror" id="pickatime" 	value="{{ old('delivery_date_to_customer') }}" >
											@error('delivery_date_to_customer')
											<label class="text-danger font-weight-bold " > {{ $message }} </label>
											@enderror
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<label> @lang('trips.payment_method') </label>
									<select name="payment_method_id"  class="form-control payment_method_id" >
										@foreach ($payment_methods as $payment_method)
										<option value="{{ $payment_method->id }}">{{ $payment_method['name_'.$lang] }}</option>
										@endforeach
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

							</div>
						</div>

					</fieldset>


					<fieldset>
						<legend class="font-weight-bold"><span class="text-primary"> @lang('trips.order_items') </span> <button class="btn btn-primary btn-sm ml-1 add_more_items"> <i class="icon-plus3 " ></i></button> </legend>
						<div class="form-group items">
							<div class="row first_item">
								<div class="col-md-4">
									<label> @lang('trips.item_name') </label>
									<input type="text" name="item_name[]" value="{{ old('item_name.*') }}" class="name form-control @error('order_price') is-invalid @enderror " >
									@error('item_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('trips.item_quantity') </label>
									<input type="text" name="quantity[]" value="{{ old('quantity.*') }}" class="quantity form-control @error('order_price') is-invalid @enderror " >
									@error('price')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<button class="btn btn-danger btn-sm mt-4 cancel_item"  > @lang('trips.cancel_item')  </button>
								</div>
							</div>
						</div>
					</fieldset>




					<fieldset>
						<legend>  <span class="text-primary">  @lang('trips.customers') </span> </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label>@lang('trips.choose_customers') </label>
									<select name="customers[]" multiple="multiple" class="form-control customers" >
										<option value=""> اختر المستلم </option>
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-2">
									<a href="" class="add_new_customar mt-4 btn btn-sm btn-primary"> <i class="icon-plus3 " ></i> @lang('trips.add_new_customer') </a>
								</div>

							</div>
						</div>
					</fieldset>
				</div>
				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('trips.add') </button>
					<a href="{{ route('trips.index') }}" class="btn btn-secondary "> @lang('trips.back') </a>
				</div>
			</form>
		</div>
		<!-- /account settings -->
	</div>
</div>

@endsection

@include('merchants.trips.add-customer-modal')

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
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&callback=initMap&libraries=&v=weekly"
	defer></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{--
<script type="text/javascript"
src="//maps.googleapis.com/maps/api/js?region=SA&language={{$lang}}&key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&libraries=places">
</script>
--}}
<script>

	$(document).ready(function() {



		$('#pickatime1').pickatime({
		});
		$('#pickatime').pickatime({
		});
		$('#pickadate').pickadate({
			min: true ,
			format: 'yyyy-mm-dd',
		});
		$('#pickadate1').pickadate({
			min: true ,
			format: 'yyyy-mm-dd',

		});

		$('a.add_new_customar').on('click', function(event) {
			event.preventDefault();
			$('#add_new_customar_modal').modal('show');
		});

		$('button[name="save_customer"]').on('click',  function(event) {
			event.preventDefault();
			customer_name = $('input[name="customer_name"]').val();
			phone1 = $('input[name="phone1"]').val();
			phone2 = $('input[name="phone2"]').val();
			governorate = $('select.governorate').val();
			city = $('select.city').val();
			building_type_id = $('select[name="building_type_id"]').val();
			place_number = $('input[name="place_number"]').val();
			street_name = $('input[name="street_name"]').val();
			avenue_number = $('input[name="avenue_number"]').val();
			building_number = $('input[name="building_number"]').val();
			floor_number = $('input[name="floor_number"]').val();
			apratment_number = $('input[name="apratment_number"]').val();
			latitude = $('input[name="latitude"]').val();
			longitude = $('input[name="longitude"]').val();
			$.ajax({
				url: '{{ route("customers.store") }}',
				placeholder : 'اختر المستلمين',
				type: 'POST',
				dataType: 'json',
				data: { _token:"{{ csrf_token() }}" , customer_name:customer_name , phone2:phone2 , phone1:phone1 , governorate:governorate , city:city, place_number:place_number , street_name:street_name , avenue_number:avenue_number , building_number:building_number, floor_number:floor_number , apratment_number:apratment_number , latitude:latitude , longitude:longitude  , building_type_id:building_type_id},
			})
			.done(function(data) {
				if (data.status == 'success') {
					$('#add_new_customar_modal').modal('hide');
					Swal.fire({
						icon: data.status,
						text: data.msg,
						showConfirmButton: false,
						timer: 1500
					})
				} else {
					Swal.fire({
						icon: data.status,
						text: data.msg,
						showConfirmButton: false,
						timer: 1500
					});
				}
			});
		});

		$('.customers').select2({
			placeholder: "اختر المستلم",
			minimumInputLength:3,
			ajax: {
				url: '/Merchant/ajax/search_customers',
				dataType: 'json',
				type: 'GET' ,
				data: function (params) {
					var queryParameters = {
						q: params.term ,
					}
					return queryParameters;
				},
				delay: 500,
				processResults: function (data) {
					return {
						results:  $.map(data.data, function (item) {
							return {
								text: item.text,
								id: item.id
							}
						})
					};
				},
				cache: true
			}
		});


		$('select[name="city"]').select2({
			placeholder: "اختر المدينه",
			minimumInputLength:2,
			ajax: {
				url: '/Board/search_in_cities',
				dataType: 'json',
				type: 'GET' ,
				data: function (params) {
					var queryParameters = {
						q: params.term ,
					}
					return queryParameters;
				},
				delay: 500,
				processResults: function (data) {
					return {
						results:  $.map(data.data, function (item) {
							return {
								text: item.text,
								id: item.id
							}
						})
					};
				},
				cache: true
			}
		});

	});




// function initMap() {
// 			map = new google.maps.Map(document.getElementById("map"), {
// 				center: { lat: 29.393343, lng: 47.567417 },
// 				zoom: 11,
// 				address: 'الكويت - Capital Governorate - المنصورية'
// 			});
// 		}

function initMap() {
	const map = new google.maps.Map(document.getElementById("map"), {
		zoom: 11,
		center: { lat: 29.393343, lng: 47.567417 },
	});
	const geocoder = new google.maps.Geocoder();

	geocodeAddress(geocoder, map);

}

function geocodeAddress(geocoder, resultsMap) {
	const address = "الكويت - كبد";
	geocoder.geocode({ address: address }, (results, status) => {
		if (status === "OK") {
			resultsMap.setCenter(results[0].geometry.location);
			new google.maps.Marker({
				map: resultsMap,
				position: results[0].geometry.location,
				draggable:true,
			});
		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
	});
}



$(function() {






		// var myLatlng = new google.maps.LatLng(29.393343,47.567417);

		// var myOptions = {
		// 	zoom: 12,
		// 	center: myLatlng,
		// 	mapTypeId: google.maps.MapTypeId.ROADMAP ,
		// 	address: 'الكوييت - محافظة العاصمة'
		// }

		// var map = new google.maps.Map(document.getElementById("map"), myOptions);

		// addMarker(myLatlng, 'برجاء سحب العلامه للمكان المطلوب', map);

		// map.addListener('click',function(event) {
		// 	addMarker(event.latLng, 'Click Generated Marker', map);
		// });


		// function handleEvent(event) {
		// 	document.getElementById('lat').value = event.latLng.lat();
		// 	document.getElementById('lng').value = event.latLng.lng();
		// }

		// function addMarker(latlng,title,map) {
		// 	var marker = new google.maps.Marker({
		// 		position: latlng,
		// 		map: map,
		// 		title: title,
		// 		draggable:true
		// 	});

		// 	marker.addListener('drag', handleEvent);
		// 	marker.addListener('dragend', handleEvent);
		// }



		$('button.add_more_items').on('click',  function(event) {
			event.preventDefault();
			item = $('div.first_item').clone();
			item.find('input.quantity').val('');
			item.find('input.name').val('');
			item.removeClass('first_item');
			$('.items').children().last().after(item);

		});


		$(document).on('click', 'button.cancel_item', function(event) {
			event.preventDefault();
			//we need first to count the number ot items showen to user
			items_count = $('.items').children().length;

			if (items_count != 1) {
				$(this).parent().parent().remove();
			}
		});

		  // Date and time
		  // $('#delivery_date_to_customer').AnyTime_picker({
		  // 	format: '%Y-%m-%d %H',
		  // 	formatSubmit: 'yyyy/mm/dd' ,
		  // });
		  // $('#receipt_date_from_market').AnyTime_picker({
		  // 	format: '%Y-%m-%d %H',
		  // 	formatSubmit: 'yyyy/mm/dd' ,
		  // });

		  var market_id = null;




		  $('.branch_id').select2({
		  	placeholder: "اختر الفرع",
		  });






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






		});
	</script>

	@endsection