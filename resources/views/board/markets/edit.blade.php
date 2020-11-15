@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('markets.edit_market_details')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('markets.markets') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('markets.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('markets.markets') </a>
				<span class="breadcrumb-item active"> @lang('markets.edit_market_details') </span>
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
				<h5 class="card-title"> @lang('markets.edit_market_details') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('markets.update'  , ['market' => $market->id ] ) }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf
					@method('PATCH')
					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('markets.market_data') </span> </legend>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.name') </label>
									<input type="text" name="market_name" value="{{ $market->name }}" class="form-control @error('name') is-invalid @enderror " >
									@error('name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('markets.phones') </label>
									<input type="text" name="phones" value="{{ $market->phones }}" class="form-control @error('phones') is-invalid @enderror " >
									@error('phones')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('markets.address') </label>
									<input type="text" name="address" value="{{ $market->address }}" class="form-control @error('address') is-invalid @enderror " >
									@error('address')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
						

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.logo') </label>
									<input type="file" name="logo" class="form-control form-input-styled @error('logo') is-invalid @enderror">
									@error('logo')
									<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('markets.notes') </label>
									<input type="text" name="notes" value="{{ $market->notes }}" class="form-control" >
								</div>
								<div class="col-md-4">
									<div class="form-check form-check-switchery mt-4">
										<label class="form-check-label">
											<input type="checkbox" name="active" class="form-check-input-switchery" 
											{{ $market->isActive() ? 'checked' : '' }}>
											@lang('markets.active')
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.attach_files') </label>
									<input type="file" name="files[]" multiple="multiple" class="form-control form-input-styled @error('logo') is-invalid @enderror">
									@error('logo')
									<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
									@enderror

									<p class="text-warning"> @lang('markets.files_type_allowed') </p>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.current_market_logo') </label>
									<img class="img-thumbnail img-responsive" src="{{ Storage::disk('s3')->url('markets/'.$market->logo) }}" alt="">
								</div>
							</div>
						</div>
					</fieldset>

				</div>

				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-warning float-right ml-2"> @lang('markets.edit') </button>
					<a href="{{ route('markets.index') }}" class="btn btn-secondary "> @lang('markets.back') </a>
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

{{-- <script src="{{ asset('board_assets/global_assets/js/demo_pages/picker_date_rtl.js') }}"></script> --}}
<script>
	$(function() {

		   // Default functionality
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