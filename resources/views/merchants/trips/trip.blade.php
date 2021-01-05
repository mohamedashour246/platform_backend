@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('trips.trip_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('trips.trips') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('merchants.trips.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('trips.trips') </a>
				<span class="breadcrumb-item active"> @lang('trips.trip_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">

	{{-- <div class="col-md-12 mb-3">
		<div class="header-elements ">
			<div class="float-right">
				<a href="{{ route('trips.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('trips.add_new_trip')  </a>
				<a href="{{ route('trips.edit'  , ['trip' => $trip->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('trips.edit_trip_details')  </a>
				<form action="{{ route('trips.destroy'  , ['trip' => $trip->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button href="#" class="btn btn-danger "> <i class="icon-trash"></i> @lang('trips.delete_trip') </button>
				</form>
			</div>
		</div>
	</div> --}}




	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('trips.customer_address_details')  </h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered  table-xs  my-2">
					<tbody>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.trip_code')</th>
							<td class="text-left"> {{ $trip->code }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.market')</th>
							<td class="text-left"> {{ optional($trip->market)->name }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.branch')</th>
							<td class="text-left"> {{ optional($trip->branch)->name }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.order_price')</th>
							<td class="text-left"> {{ $trip->order_price }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.delivery_price')</th>
							<td class="text-left"> {{ $trip->delivery_price }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.payment_method')</th>
							<td class="text-left"> {{ optional($trip->payment_method)['name_'.$lang] }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.receipt_date_from_market')</th>
							<td class="text-left"> {{ $trip->receipt_date_from_market->toDayDateTimeString() }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.delivery_date_to_customer')</th>
							<td class="text-left"> {{ $trip->delivery_date_to_customer->toDayDateTimeString() }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.notes')</th>
							<td class="text-left"> {{ $trip->notes }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.status') </th>
							<td class="text-left">
								<label  class="badge badge-success" > قيد التنفيذ </label>
							</td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('trips.created_at') </td>
							<td class="text-left"> {{ $trip->created_at->toFormattedDateString() }} - {{ $trip->created_at->diffForHumans() }} </td>
						</tr>
						<tr>
							<td class="font-weight-semibold">  @lang('trips.image') </td>
							<td class="text-right text-muted">
								<img class="img-responsive img-thumbnail" width="300" height="300" src="{{ Storage::disk('s3')->url('trips/'.$trip->image) }}" alt="">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('trips.customer_address_details')  </h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered  table-xs  my-2">
					<tbody>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.customer_name') </th>
							<td class="text-left"> {{ optional($trip->address)->name }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.phone1') </th>
							<td class="text-left"> {{ optional($trip->address)->phone1 }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.phone2') </th>
							<td class="text-left"> {{ optional($trip->address)->phone2 }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.governorate') </th>
							<td class="text-left"> {{ optional(optional($trip->address)->governorate)['name_'.$lang] }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.city') </th>
							<td class="text-left"> {{ optional(optional($trip->address)->city)['name_'.$lang] }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.street_name') </th>
							<td class="text-left"> {{ optional($trip->address)->street_name }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.building_type') </th>
							<td class="text-left"> {{ optional(optional($trip->address)->building_type)['name_'.$lang] }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.floor_number') </th>
							<td class="text-left"> {{ optional($trip->address)->floor_number }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.apratment_number') </th>
							<td class="text-left"> {{ optional($trip->address)->apratment_number }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.building_number') </th>
							<td class="text-left"> {{ optional($trip->address)->building_number }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.avenue_number') </th>
							<td class="text-left"> {{ optional($trip->address)->avenue_number }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.place_number') </th>
							<td class="text-left"> {{ optional($trip->address)->place_number }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('trips.customer_address_on_map') </th>
							<td><div class="map-container locationpicker-default"></div></td>
						</tr>


					</tbody>
				</table>
			</div>
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
            draggable: false,
            zoom: 10 ,
            location: {
                latitude: {{ $trip->address->latitude }} ,
                longitude: {{ $trip->address->longitude }}
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