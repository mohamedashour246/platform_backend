@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('drivers.driver_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('drivers.drivers') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('drivers.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('drivers.drivers') </a>
				<span class="breadcrumb-item active"> @lang('drivers.driver_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection


@section('content')

<div class="row">

	<div class="col-md-12 mb-3">
		<div class="header-elements ">
			<div class="float-right">

				{{-- <a href="{{ route('drivers.trips'  , ['driver' => $driver->id ] ) }}" class="btn btn-info ml-1"> <i class="icon-car"></i> @lang('drivers.driver_trips')  </a>
				<a href="{{ route('drivers.bills'  , ['driver' => $driver->id ] ) }}" class="btn btn-success ml-1"> <i class="icon-newspaper"></i> @lang('drivers.driver_bills')  </a> --}}
				<a href="{{ route('drivers.edit'  , ['driver' => $driver->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('drivers.edit_driver_details')  </a>
				<form action="{{ route('drivers.destroy'  , ['driver' => $driver->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button href="#" class="btn btn-danger "> <i class="icon-trash"></i> @lang('drivers.delete_driver') </button>
				</form>
			</div>
		</div>
	</div>


	<div class="row">
		@include('board.layout.messages')
		
		<div class="col-md-12">
			<div class="card card-body">
				<div class="media">
					<div class="mr-3">
						<a href="#">
							<img  src="{{ Storage::disk('s3')->url('drivers/'.$driver->image) }}" class=" img-thumbnail img-fluid "  width="200" height="200">
						</a>
					</div>
					<div class="media-body">
						<h6 class="mb-0"> {{ $driver->name }} </h6>

						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-popup="tooltip" title="@lang('drivers.phone')" data-toggle="modal" data-trigger="hover" data-target="#call" data-original-title="Call">  {{ $driver->phone }} <i class="icon-phone2"></i> </a>
							<a href="#" class="list-icons-item" data-popup="tooltip" title="@lang('drivers.code')" data-toggle="modal" data-trigger="hover" data-target="#chat" data-original-title="Chat"> {{ $driver->code }} <i class="icon-barcode2 "></i></a>
							<a href="#" class="list-icons-item" data-popup="tooltip" title="@lang('drivers.car_number')" data-toggle="modal" data-trigger="hover" data-target="#video" data-original-title="Video"> {{ $driver->car_number }} <i class="icon-car "></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card-header bg-transparent header-elements-inline">
						<span class="card-title font-weight-semibold"></span>

					</div>

					<table class="table table-borderless table-xs my-2">
						<tbody>
							<tr>
								<td> @lang('drivers.country') </td>
								<td class="text-right"> {{ optional($driver->country)['name_'.$lang] }} </td>
							</tr>
							<tr>
								<td class="font-weight-bold text-dark">@lang('drivers.working_start_time')</td>
								<td class="text-right"> {{ $driver->working_start_time->format('h:i:s A') }} </td>
							</tr>

							<tr>
								<td class="font-weight-bold text-dark">@lang('drivers.working_end_time')</td>
								<td class="text-right"> {{ $driver->working_end_time->format('h:i:s A') }} </td>
							</tr>

							<td class="font-weight-bold text-dark"> @lang('drivers.created_at') </td>
							<td class="text-right"> {{ $driver->created_at->toFormattedDateString() }} - {{ $driver->created_at->diffForHumans() }} </td>


						</tbody>
					</table>
				</div>
			</div>

		</div>

		<div class="col-md-12">
			<div class="row">
				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="media-body">
								<h3 class="font-weight-semibold mb-0"> {{ $total_cash_money }} دينار</h3>
								<span class="text-uppercase font-size-sm text-blue-600"> الرحلات الكاش </span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
							</div>
						</div>
					</div>
				</div>



				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="media-body">
								<h3 class="font-weight-semibold mb-0"> {{ $total_kent_money }} دينار</h3>
								<span class="text-uppercase font-size-sm text-blue-600">  الرحلات الكى نت </span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
							</div>
						</div>
					</div>
				</div>


				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="media-body">
								<h3 class="font-weight-semibold mb-0"> {{ $total_delivery_price }} دينار</h3>
								<span class="text-uppercase font-size-sm text-blue-600"> سعر التوصيل</span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="media-body">
								<h3 class="font-weight-semibold mb-0"> {{ $total_driver_income_today }} دينار</h3>
								<span class="text-uppercase font-size-sm text-blue-600"> ايراد السائق</span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="media-body">
								<h3 class="font-weight-semibold mb-0"> {{ $today_total_bills_count }} </h3>
								<a href="{{ route('drivers.bills'  , ['driver' => $driver->id ] ) }}"> <span class="text-uppercase font-size-sm text-blue-600">  عدد الفواتير</span> </a>

								
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-credit-card2   icon-3x text-blue-400"></i>
							</div>
						</div>
					</div>
				</div>


				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="media-body">
								<h3 class="font-weight-semibold mb-0"> {{ $today_total_trips_count }} </h3>
								<span class="text-uppercase font-size-sm text-blue-600"> @lang('drivers.today_trips_count') </span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-car  icon-3x text-blue-400"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="media-body">
								<h3 class="font-weight-semibold mb-0"> {{ $total_trips_count }} </h3>
								<a href="{{ route('drivers.trips'  , ['driver' => $driver->id ] ) }}"> <span class="text-uppercase font-size-sm text-blue-600"> @lang('drivers.total_trips_count') </span> </a>
							</div>
							<div class="ml-3 align-self-center">
								<i class="icon-car  icon-3x text-blue-400"></i>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		







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


		@if ($driver->type == 'superdriver')
		$('input.permissions').each(function(){
			$(this).prop('disabled',true);
			$.uniform.update();
		});
		@endif

		$('select[name="type"]').on('select2:select', function(event) {
			
			var driver_type = $(event.currentTarget).val();
			console.log(driver_type);
			if (driver_type == 'superdriver') {
				$('input.permissions').each(function(){
					console.log(driver_type);
					$(this).prop('disabled',true);
					$.uniform.update();
				});
			} else {
				$('input.permissions').each(function(){
					console.log(driver_type);
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