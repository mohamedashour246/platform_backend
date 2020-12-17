@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('drivers.driver_reports')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('drivers.drivers') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('drivers.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('drivers.drivers') </a>
				<span class="breadcrumb-item active"> @lang('drivers.driver_reports') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x text-success-400"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0 "> {{ $cashe }} </h3>
					<span class="text-uppercase font-size-xl text-dark"> الرحلات الكاش </span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x text-success-400"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0"> {{ $kent }} </h3>
					<span class="text-uppercase font-size-xl text-dark">  الرحلات الكى نت </span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x text-success-400"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0"> {{ $delivery_total_price }} </h3>
					<span class="text-uppercase font-size-xl text-dark">سعر التوصيل</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x text-success-400"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0"> {{ $driver_erad }} </h3>
					<span class="text-uppercase font-size-xl text-dark"> اايراد السائق </span>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('drivers.driver_reports') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('drivers.reports') }}" method="get"  enctype="multipart/form-data" >
				<div class="card-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label > @lang('drivers.date_from') </label>
								<div class="input-group ">
									<span class="input-group-prepend">
										<span class="input-group-text"><i class="icon-alarm"></i></span>
									</span>
									<input type="date" name="dateFrom" value="{{ request()->input('dateFrom') }}" class="form-control pickadate">
								</div>						
							</div>
							<div class="col-md-3">
								<label > @lang('drivers.date_to') </label>
								<div class="input-group ">
									<span class="input-group-prepend">
										<span class="input-group-text"><i class="icon-alarm"></i></span>
									</span>
									<input type="date" name="dateTo" value="{{ request()->input('dateTo') }}" class="form-control pickadate1" >
								</div>
							</div>
							<div class="col-md-3">
								<label>@lang('trips.choose_drivers') </label>
								<select  name="driver"  class="form-control drivers">
								</select>
							</div>
							<div class="col-md-3">
								<label>@lang('trips.payment_method') </label>
								<select  name="payment_method"  class="form-control payment_method">
									<option value="all"> الكل </option>
									@foreach ($payment_methods as $payment_method)
									<option value="{{ $payment_method }}"> {{ $payment_method['name_'.$lang] }} </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer bg-light" >
					<button type="submit" name="btn_active" value="view" class="btn btn-primary float-right ml-2"> مشاهده </button>
					<button type="submit" name="btn_active" value="excel" class="btn btn-primary float-right ml-2"> excel </button>
					<button type="submit" name="btn_active" value="pdf" class="btn btn-primary float-right ml-2">pdf </button>
					<a href="{{ route('drivers.index') }}" class="btn btn-secondary "> @lang('drivers.back') </a>
				</div>
			</form>
		</div>
	</div>
</div>


@foreach ($trips as $trip)
{{ $trip->id }}
@endforeach

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script>
	$(document).ready(function() {

		$('.pickadate').pickadate({
			format: 'yyyy-mm-dd',
		});
		$('.pickadate1').pickadate({
			format: 'yyyy-mm-dd',
		});
		$('.drivers').select2({
			minimumInputLength:3,
			ajax: {
				url: '/Board/ajax/search_drivers',
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

</script>
@endsection