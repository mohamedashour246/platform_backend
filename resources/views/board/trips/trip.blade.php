@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
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
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('trips.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('trips.trips') </a>
				<span class="breadcrumb-item active"> @lang('trips.trip_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
{{-- 
	<div class="col-md-12 mb-3">
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
	</div>
 --}}



	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('trips.trip_details') {{ $trip->username }} </h5>
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
							<th class="font-weight-bold text-dark">@lang('trips.trip_code')</th>
							<td class="text-left"> {{ $trip->code }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.sender')</th>
							<td class="text-left"> 
								@if ($trip->sender_type == 'market')
								<a href="{{ route('markets.show' , ['market' => $trip->market_id ]  ) }}"> {{ optional($trip->market)->name }} </a>
								@else
								<a href="{{ route('customers.show' , ['customer' => $trip->market_id ]  ) }}"> {{ optional($trip->client)->name }} </a>
								@endif
							</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.driver')</th>
							<td class="text-left"> 
								<a href="{{ route('drivers.show'  , ['driver' => $trip->driver_id] ) }}"> {{ optional($trip->driver)->name }} </a>
							</td>
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
							<th class="font-weight-bold text-dark">@lang('trips.delivery_date_to_customer')</th>
							<td class="text-left"> {{ $trip->delivery_date_to_customer->toDayDateTimeString() }} | <span class="text-muted" > {{  $trip->delivery_date_to_customer->diffForHumans() }} </span> </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.receipt_date_from_market')</th>
							<td class="text-left"> {{ $trip->receipt_date_from_market->toDayDateTimeString() }} | <span class="text-muted">  {{ $trip->receipt_date_from_market->diffForHumans() }} </span> </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.notes')</th>
							<td class="text-left"> {{ $trip->notes }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.payment_method')</th>
							<td class="text-left"> {{ optional($trip->payment_method)['name_'.$lang] }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark">@lang('trips.payment_status')</th>
							<td class="text-left"> 
								@switch($trip->paid)
								@case(0)
								<span class="badge bg-danger" > @lang('trips.paid') </span>
								@break
								@case(1)
								<span class="badge bg-success" > @lang('trips.unpaid') </span>
								@break
								@endswitch
								
							</td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('trips.status') </td>
							<td class="text-left"><span class="badge" style="background-color: {{ optional($trip->status)->color }};color: white" > {{ optional($trip->status)['name_'.$lang] }} </span> </td>
						</tr>



						<tr>
							<td class="font-weight-bold text-dark"> @lang('trips.created_at') </td>
							<td class="text-left"> {{ $trip->created_at->toFormattedDateString() }} - {{ $trip->created_at->diffForHumans() }} </td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('trips.notes') </td>
							<td class="text-left font-weight-bold"> {{ $trip->notes }} </td>
						</tr>



						<tr>
							<td class="font-weight-semibold">  @lang('trips.order_image') </td>
							<td class="text-right text-muted">
								<img class="img-responsive img-thumbnail" width="300" height="300" src="{{ Storage::disk('s3')->url('trips/'.$trip->image) }}" alt="">
							</td>
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
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script>
	$(function() {
		// $("#firstname").attr("disabled", "disabled");


		@if ($trip->type == 'supertrip')
		$('input.permissions').each(function(){
			$(this).prop('disabled',true);
			$.uniform.update();
		});
		@endif

		$('select[name="type"]').on('select2:select', function(event) {
			
			var trip_type = $(event.currentTarget).val();
			console.log(trip_type);
			if (trip_type == 'supertrip') {
				$('input.permissions').each(function(){
					console.log(trip_type);
					$(this).prop('disabled',true);
					$.uniform.update();
				});
			} else {
				$('input.permissions').each(function(){
					console.log(trip_type);
					$(this).prop('disabled',false);
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