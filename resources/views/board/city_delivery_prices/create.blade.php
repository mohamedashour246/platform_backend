@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('city_delivery_prices.city_delivery_prices')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('city_delivery_prices.city_delivery_prices') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('city_delivery_prices.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('city_delivery_prices.city_delivery_prices') </a>
				<span class="breadcrumb-item active"> @lang('city_delivery_prices.add_delivery_price_to_city') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('city_delivery_prices.add_delivery_price_to_city') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('city_delivery_prices.store') }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">

					@csrf
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label> @lang('city_delivery_prices.from_governorate') </label>
									<select name="from_governorate_id" class="form-control select from" data-fouc>
										<option value=""></option>

										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}">{{ $governorate['name_'.$lang] }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label> @lang('city_delivery_prices.to_governorate') </label>
									<select name="to_governorate_id" class="form-control select to" data-fouc>
										<option value=""></option>

										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}">{{ $governorate['name_'.$lang] }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">


							<div class="col-md-4">
								<div class="form-group">
									<label> @lang('city_delivery_prices.from_city') </label>
									<select name="from_city" class="form-control from_city" >
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label> @lang('city_delivery_prices.to_city') </label>
									<select name="to_city" class="form-control to_city" >
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<label> @lang('city_delivery_prices.delivery_price') </label>
								<input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror " >
								@error('price')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>


						</div>
					</div>


				</div>

				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('cities.add') </button>
					<a href="{{ route('city_delivery_prices.index') }}" class="btn btn-secondary "> @lang('cities.back') </a>
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

<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script>
	$(function() {
		


		$('.from , .to , .from_city , .to_city').select2();



		$('select[name="from_governorate_id"]').on('change',  function(event) {
			event.preventDefault();
			governorate_id = $(this).val();
			$.ajax({
				url: '{{ url("/Board/get_governorate_cities") }}',
				type: 'GET',
				dataType: 'html',
				data: {governorate_id:governorate_id},
			})
			.done(function(data) {
				$('select[name="from_city"]').select2('destroy');
				$('select[name="from_city"]').find('option').remove();
				$('select[name="from_city"]').append(data);
				$('select[name="from_city"]').select2();
			});
		});

		$('select[name="from_city"]').on('change',  function(event) {
			to_governorate_id = $('select[name="to_governorate_id"]').select2().val();
			from_governorate_id = $('select[name="from_governorate_id"]').select2().val();
			from_city = $(this).val();
			$.ajax({
				url: '{{ url('Board/get_cities_we_can_set_price_to_it') }}',
				type: 'GET',
				dataType: 'html',
				data: {to_governorate_id : to_governorate_id , from_governorate_id: from_governorate_id, from_city:from_city},
			})
			.done(function(data) {
				$('select[name="to_city"]').select2('destroy');
				$('select[name="to_city"]').find('option').remove();
				$('select[name="to_city"]').append(data);
				$('select[name="to_city"]').select2();
			});
		});

	});
</script>
@endsection