@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('markets.add_new_market')
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
				<span class="breadcrumb-item active"> @lang('markets.add_new_market') </span>
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
				<h5 class="card-title"> @lang('markets.add_new_market') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('markets.store') }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">
					@csrf

					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('markets.market_data') </span> </legend>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.name') </label>
									<input type="text" name="market_name" value="{{ old('market_name') }}" class="form-control @error('name') is-invalid @enderror " >
									@error('name')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('markets.phones') </label>
									<input type="text" name="phones" value="{{ old('phones') }}" class="form-control @error('phones') is-invalid @enderror " >
									@error('phones')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
								<div class="col-md-4">
									<label> @lang('markets.address') </label>
									<input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror " >
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
									<input type="text" name="notes" value="{{ old('notes') }}" class="form-control" >
								</div>
								<div class="col-md-4">
									<div class="form-check form-check-switchery mt-4">
										<label class="form-check-label">
											<input type="checkbox" name="active" class="form-check-input-switchery" checked data-fouc>
											@lang('markets.active')
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.contract_image') </label>
									<input type="file" name="contract_image" class="form-control form-input-styled @error('contract_image') is-invalid @enderror">
									@error('contract_image')
									<label class="text-danger font-weight-bold " for=""> {{ $message }} </label>
									@enderror
									
								</div>

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
					</fieldset>	
					<fieldset>
						<legend>  <span class="text-primary">  @lang('markets.martket_admin_login') </span> </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.username') </label>
									<input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror " >
									@error('username')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('markets.password') </label>
									<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
									@error('password')
									<label class="text-danger font-weight-bold "> {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('markets.password_confirmation') </label>
									<input type="password"  name="password_confirmation" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.phone') </label>
									<input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror " >
									@error('phone')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('markets.email') </label>
									<input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
									@error('email')
									<label class="text-danger font-weight-bold "> {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
					</fieldset>



				</div>

				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('markets.add') </button>
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