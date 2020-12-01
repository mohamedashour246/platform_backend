@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
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
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('trips.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('trips.trips') </a>
				<span class="breadcrumb-item active"> @lang('trips.add_new_trip') </span>
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
				<h5 class="card-title"> @lang('trips.add_new_trip') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('trips.store') }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf

					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('trips.trip_basic_data') </span> </legend>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('trips.market') </label>
									<select name="market_id"  class="form-control market_id" >
									</select>
									@error('market_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('trips.branch') </label>
									<select name="branch_id"  class="form-control branch_id" >
										<option value=""></option>
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
									<label> @lang('trips.delivery_date_to_customer') </label>
									<input type="text" name="delivery_date_to_customer" class="form-control @error('delivery_date_to_customer') is-invalid @enderror" id="delivery_date_to_customer" 	value="{{ old('delivery_date_to_customer') }}" >
									@error('delivery_date_to_customer')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('trips.receipt_date_from_market') </label>
									<input type="text" name="receipt_date_from_market" class="form-control @error('receipt_date_from_market') is-invalid @enderror" id="receipt_date_from_market" 
									value="{{ old('receipt_date_from_market') }}">
									@error('receipt_date_from_market')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
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
						<div class="form-group">
							<div class="row">
								{{-- <div class="col-md-4">
									<label> @lang('trips.bounce') </label>
									<input type="text" name="bounce" value="{{ old('bounce') }}" class="form-control @error('bounce') is-invalid @enderror " >
									@error('bounce')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div> --}}
								<div class="col-md-4">
									<div class="form-check form-check-switchery mt-4">
										<label class="form-check-label">
											<input type="checkbox" name="collect_the_amount" class="form-check-input-switchery" checked data-fouc>
											@lang('trips.collect_the_amount')
										</label>
									</div>
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
						<legend>  <span class="text-primary">  @lang('trips.customer_address_details') </span> </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label> @lang('trips.customer_name') </label>
									<input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control @error('customer_name') is-invalid @enderror " >
									@error('customer_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('trips.phone1') </label>
									<input type="text" name="phone1" value="{{ old('phone1') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('phone1')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('trips.phone2') </label>
									<input type="text" name="phone2" value="{{ old('phone2') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('phone2')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('trips.governorate') </label>
									<select name="governorate"  class="form-control governorate select" >
										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}">{{ $governorate['name_'.$lang] }}</option>
										@endforeach
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label> @lang('trips.city') </label>
									<select name="city"  class="form-control city select" >
										@foreach ($cities as $city)
										<option value="{{ $city->id }}">{{ $city['name_'.$lang] }}</option>
										@endforeach
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-3">
									<label> @lang('trips.place_number') </label>
									<input type="text" name="place_number" value="{{ old('place_number') }}" class="form-control @error('customer_name') is-invalid @enderror " >
									@error('place_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('trips.street_name') </label>
									<input type="text" name="street_name" value="{{ old('street_name') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('street_name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('trips.avenue_number') </label>
									<input type="text" name="avenue_number" value="{{ old('avenue_number') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('avenue_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label> @lang('trips.building_types') </label>
									<select name="building_type_id"  class="form-control building_types select" >
										@foreach ($building_types as $building_type)
										<option value="{{ $building_type->id }}">{{ $building_type['name_'.$lang] }}</option>
										@endforeach
									</select>
									@error('payment_method_id')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>					
								<div class="col-md-3">
									<label> @lang('trips.building_number') </label>
									<input type="text" name="building_number" value="{{ old('building_number') }}" class="form-control @error('customer_name') is-invalid @enderror " >
									@error('building_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('trips.floor_number') </label>
									<input type="text" name="floor_number" value="{{ old('floor_number') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('floor_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-3">
									<label> @lang('trips.apratment_number') </label>
									<input type="text" name="apratment_number" value="{{ old('apratment_number') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('apratment_number')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
					</fieldset>


					<fieldset>
						<legend>  <span class="text-primary">  @lang('trips.customer_address_on_map') </span> </legend>

						<div class="row">
							<div class="col-md-12">
								<div id="map" style="width: 100%; height: 400px;"></div>
								<input type="hidden" id='lat'  name="latitude" value="" >
								<input type="hidden" id='lng'  name="longitude"  value="" >
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
<script type="text/javascript"
src="//maps.googleapis.com/maps/api/js?region=SA&language={{$lang}}&key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&libraries=places">
</script>

<script>



	$(function() {



			var myLatlng = new google.maps.LatLng(29.393343,47.567417);

			var myOptions = {
				zoom: 12,
				center: myLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}

			var map = new google.maps.Map(document.getElementById("map"), myOptions);

			addMarker(myLatlng, 'برجاء سحب العلامه للمكان المطلوب', map);

			map.addListener('click',function(event) {
				addMarker(event.latLng, 'Click Generated Marker', map);
			});
		

		function handleEvent(event) {
			document.getElementById('lat').value = event.latLng.lat();
			document.getElementById('lng').value = event.latLng.lng();
		}

		function addMarker(latlng,title,map) {
			var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				title: title,
				draggable:true
			});

			marker.addListener('drag', handleEvent);
			marker.addListener('dragend', handleEvent);
		}



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
		  $('#delivery_date_to_customer').AnyTime_picker({
		  	format: '%Y-%m-%d %H',
		  	formatSubmit: 'yyyy/mm/dd' , 
		  });
		  $('#receipt_date_from_market').AnyTime_picker({
		  	format: '%Y-%m-%d %H',
		  	formatSubmit: 'yyyy/mm/dd' , 
		  });

		  var market_id = null;

		  $('.market_id').on('change',  function(event) {
		  	event.preventDefault();
		  	market_id = $(this).val();
		  	$('.branch_id').val('').change();
		  });

		  $('.market_id').select2({
		  	placeholder: "اختر المتجر",
		  	ajax: {
		  		url: '/Board/ajax/search_markets',
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
		  				results:  $.map(data, function (item) {
		  					return {
		  						text: item.name +  ' ' + item.name ,
		  						id: item.id
		  					}
		  				})
		  			};
		  		},
		  		cache: true
		  	}
		  });


		  $('.branch_id').select2({
		  	placeholder: "اختر الفرع",
		  	ajax: {
		  		url: '/Board/ajax/search_branches',
		  		dataType: 'json',
		  		type: 'GET' ,
		  		data: function (params) {
		  			var queryParameters = {
		  				q: params.term ,
		  				market_id : market_id , 
		  			}
		  			return queryParameters;
		  		},
		  		delay: 500,
		  		processResults: function (data) {
		  			return {
		  				results:  $.map(data, function (item) {
		  					return {
		  						text: item.name +  ' ' + item.name ,
		  						id: item.id
		  					}
		  				})
		  			};
		  		},
		  		cache: true
		  	}
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