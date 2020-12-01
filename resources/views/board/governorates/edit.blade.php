@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('governorates.edit_governorate_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('governorates.governorates') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('governorates.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('governorates.governorates') </a>
				<span class="breadcrumb-item active"> @lang('governorates.edit_governorate_details') </span>
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
				<h5 class="card-title"> @lang('governorates.edit_governorate_details')</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<form action="{{ route('governorates.update'  , ['governorate' => $governorate->id] ) }}" method="POST"  enctype="multipart/form-data" >
					@csrf
					@method('PATCH')
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label> @lang('governorates.name_ar') </label>
								<input type="text" name="name_ar" value="{{ $governorate->name_ar }}" class="form-control @error('name_ar') is-invalid @enderror " >
								@error('name_ar')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<label> @lang('governorates.name_en') </label>
								<input type="text" name="name_en" value="{{ $governorate->name_en }}" class="form-control @error('name_en') is-invalid @enderror ">
								@error('name_en')
								<label  class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label> @lang('governorates.country') </label>
									<select name="country_id" class="form-control select" data-fouc>
										
									@foreach ($countries as $country)
										<option value="{{ $country->id }}" {{ $country->id == $governorate->country_id ? 'selected="selected"' : '' }} > {{ $country['name_'.$lang] }} </option>
									@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>



					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<div class="form-check form-check-switchery mt-4">
									<label class="form-check-label">
										<input type="checkbox" name="active" class="form-check-input-switchery " {{ $governorate->isActive() ? 'checked' : '' }} data-fouc>
										@lang('governorates.active')
									</label>
								</div>
							</div>
						</div>
					</div>





			
					<div class="card-footer bg-light" >
						<button type="submit" class="btn btn-warning float-right ml-2"> @lang('governorates.edit') </button>
						<a href="{{ route('governorates.index') }}" class="btn btn-secondary "> @lang('governorates.back') </a>
					</div>
				</form>
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


		@if ($governorate->type == 'supergovernorate')
		$('input.permissions').each(function(){
			$(this).prop('disabled',true);
			$.uniform.update();
		});
		@endif

		$('select[name="type"]').on('select2:select', function(event) {
			
			var governorate_type = $(event.currentTarget).val();
			console.log(governorate_type);
			if (governorate_type == 'supergovernorate') {
				$('input.permissions').each(function(){
					console.log(governorate_type);
					$(this).prop('disabled',true);
					$.uniform.update();
				});
			} else {
				$('input.permissions').each(function(){
					console.log(governorate_type);
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