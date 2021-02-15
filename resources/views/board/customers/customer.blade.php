@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('customers.customer_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('customers.customers') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('customers.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('customers.customers') </a>
				<span class="breadcrumb-item active"> @lang('customers.customer_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">

	<div class="col-md-12">
		@include('board.layout.messages')
	</div>

{{--
	<div class="col-md-12 mb-3">
		<div class="header-elements ">
			<div class="float-right">
				<a href="{{ route('customers.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('customers.add_new_customer')  </a>
				<a href="{{ route('customers.edit'  , ['customer' => $customer->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('customers.edit_customer_details')  </a>
				<form action="{{ route('customers.destroy'  , ['customer' => $customer->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger "> <i class="icon-trash"></i> @lang('customers.delete_customer') </button>
				</form>
			</div>
		</div>
	</div>

 --}}


	<div class="col-md-12">
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('customers.customer_details') :  {{ $customer->name }} </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<table class="table  table-xs border-top-0 my-2">
					<tbody>
						<tr>
							<th class="font-weight-bold text-dark">@lang('customers.customer_name')</th>
							<td class="text-left"> {{ $customer->name }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.business_type') </th>
							<td class="text-left">	{{ $customer->business_type }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.phone1') </th>
							<td class="text-left">	{{ $customer->phone1 }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.phone2') </th>
							<td class="text-left">	{{ $customer->phone2 }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.governorate') </th>
							<td class="text-left">	{{ optional($customer->governorate)['name_'.$lang] }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.city') </th>
							<td class="text-left">	{{ optional($customer->city)['name_'.$lang] }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.place_number') </th>
							<td class="text-left">	{{ $customer->place_number }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.street_name') </th>
							<td class="text-left">	{{ $customer->street_name }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.avenue_number') </th>
							<td class="text-left">	{{ $customer->avenue_number }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.building_number') </th>
							<td class="text-left">	{{ $customer->building_number }}	</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.building_number') </th>
							<td class="text-left">	{{ $customer->building_number }}	</td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.floor_number') </th>
							<td class="text-left">	{{ $customer->floor_number }}	</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.apratment_number') </th>
							<td class="text-left">	{{ $customer->apratment_number }}	</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.building_type') </th>
							<td class="text-left">	{{ optional($customer->building_type)['name_'.$lang] }}	</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('customers.added_by') </th>
							<td class="text-left">	{{ optional($customer->user)->name }}	</td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('customers.created_at') </td>
							<td class="text-left"> {{ $customer->created_at->toFormattedDateString() }} - {{ $customer->created_at->diffForHumans() }} </td>
						</tr>
						<tr>

							<td colspan="5">
								<div class="map-container locationpicker-default"></div>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&amp;libraries=places"></script>


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
				latitude: {{ $customer->latitude }} ,
				longitude: {{ $customer->longitude }}
			}
		});
	});
</script>
@endsection