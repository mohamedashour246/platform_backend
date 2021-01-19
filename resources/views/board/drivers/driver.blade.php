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
				<a href="{{ route('drivers.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('drivers.add_new_driver')  </a>
				<a href="{{ route('drivers.edit'  , ['driver' => $driver->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('drivers.edit_driver_details')  </a>
				<form action="{{ route('drivers.destroy'  , ['driver' => $driver->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button href="#" class="btn btn-danger "> <i class="icon-trash"></i> @lang('drivers.delete_driver') </button>
				</form>
			</div>
		</div>
	</div>



	<div class="col-md-12">
		<div class="row">
			<div class="col-sm-6 col-xl-2">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">0</h3>
							<span class="text-uppercase font-size-sm text-blue-600"> الرحلات الكاش </span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-2">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">0</h3>
							<span class="text-uppercase font-size-sm text-blue-600">  الرحلات الكى نت </span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-6 col-xl-2">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">0</h3>
							<span class="text-uppercase font-size-sm text-blue-600"> سعر التوصيل</span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-2">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">0</h3>
							<span class="text-uppercase font-size-sm text-blue-600"> ايراد السائق</span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-coin-dollar  icon-3x text-blue-400"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-2">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">0</h3>
							<span class="text-uppercase font-size-sm text-blue-600">  عدد الفواتير</span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-credit-card2   icon-3x text-blue-400"></i>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-6 col-xl-2">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">0</h3>
							<span class="text-uppercase font-size-sm text-blue-600"> عدد الرحلات </span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-car  icon-3x text-blue-400"></i>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>




	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('drivers.driver_details') {{ $driver->username }} </h5>
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
							<th class="font-weight-bold text-dark">@lang('drivers.code')</th>
							<td class="text-left"> {{ $driver->code }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('drivers.phone')</th>
							<td class="text-left"> {{ $driver->phone }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('drivers.username')</th>
							<td class="text-left"> {{ $driver->username }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('drivers.name')</th>
							<td class="text-left"> {{ $driver->name }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('drivers.working_start_time')</th>
							<td class="text-left"> {{ $driver->working_start_time->toTimeString() }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark">@lang('drivers.working_end_time')</th>
							<td class="text-left"> {{ $driver->working_end_time->toTimeString() }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('drivers.car_number')</th>
							<td class="text-left"> {{ $driver->car_number }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('drivers.country')</th>
							<td class="text-left"> {{ optional($driver->country)['name_'.$lang] }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('drivers.activation') </th>
							<td class="text-left">	
								@switch($driver->active)
								@case(1)
								<label  class="badge badge-success" > @lang('drivers.active') </label>
								@break
								@case(0)
								<label  class="badge badge-secondary" > @lang('drivers.inactive') </label>
								@break
								@endswitch
							</td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('drivers.bounce') </td>
							<td class="text-left"> {{ $driver->bounce }} </td>
						</tr>



						<tr>
							<th class="font-weight-bold text-dark"> @lang('drivers.activation') </th>
							<td class="text-left">	
								@switch($driver->available)
								@case(1)
								<label  class="badge badge-primary" > @lang('drivers.available') </label>
								@break
								@case(0)
								<label  class="badge badge-danger" > @lang('drivers.unavailable') </label>
								@break
								@endswitch
							</td>
						</tr>


						<tr>
							<td class="font-weight-bold text-dark"> @lang('drivers.created_at') </td>
							<td class="text-left"> {{ $driver->created_at->toFormattedDateString() }} - {{ $driver->created_at->diffForHumans() }} </td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('drivers.added_by') </td>
							<td class="text-left font-weight-bold"> <a href="{{ route('drivers.show'  , ['driver' => $driver->id] ) }}"> {{ optional($driver->admin)->username }} </a> </td>
						</tr>


						<tr>
							<td class="font-weight-bold text-dark"> @lang('drivers.notes') </td>
							<td class="text-left font-weight-bold"> {{ $driver->notes }} </td>
						</tr>



						<tr>
							<td class="font-weight-semibold">  @lang('drivers.current_profile_picture') </td>
							<td class="text-right text-muted">
								<img class="img-responsive img-thumbnail" width="300" height="300" src="{{ Storage::disk('s3')->url('drivers/'.$driver->image) }}" alt="">
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