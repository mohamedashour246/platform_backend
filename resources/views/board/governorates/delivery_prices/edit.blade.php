
@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('governorates.edit_delivery_price_details')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('governorates.governorates') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('governorates.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('governorates.governorates') </a>
				<span class="breadcrumb-item active"> @lang('governorates.edit_delivery_price_details') </span>
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
				<h5 class="card-title"> @lang('governorates.edit_delivery_price_details') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('delivery_prices.update' , ['delivery_price' => $delivery_price->id ] ) }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">

					@csrf
					@method('PATCH')
					<div class="form-group">
						<div class="row">

							<div class="col-md-6">
								<label> @lang('governorates.governorate') </label>
								<input type="text" name="to_governorate_id" value="{{ optional($delivery_price->destinationGovernorate)
									['name_'.$lang] }}" readonly="readonly" class="form-control  ">
							</div>

							<div class="col-md-6">
								<label> @lang('governorates.delivery_price') </label>
								<input type="text" name="price" value="{{ $delivery_price->price }}" class="form-control @error('price') is-invalid @enderror " >
								@error('price')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>


						</div>
					</div>
			

				</div>

				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-warning float-right ml-2"> @lang('cities.edit') </button>
					<a href="{{ route('governorates.index') }}" class="btn btn-secondary "> @lang('cities.back') </a>
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
<script>
	$(function() {


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