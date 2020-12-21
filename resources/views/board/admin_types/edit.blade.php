@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('admin_types.edit_admin_type_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('admin_types.admin_types') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('admin_types.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admin_types.admin_types') </a>
				<span class="breadcrumb-item active"> @lang('admin_types.edit_admin_type_details') </span>
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
				<h5 class="card-title"> @lang('admin_types.edit_admin_type_details')</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<form action="{{ route('admin_types.update'  , ['admin_type' => $admin_type->id] ) }}" method="POST"  enctype="multipart/form-data" >
					@csrf
					@method('PATCH')
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label> @lang('admin_types.name_ar') </label>
								<input type="text" name="name_ar" value="{{ $admin_type->name_ar }}" class="form-control @error('name_ar') is-invalid @enderror " >
								@error('name_ar')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>

							<div class="col-md-4">
								<label> @lang('admin_types.name_en') </label>
								<input type="text" name="name_en" value="{{ $admin_type->name_en }}" class="form-control @error('name_en') is-invalid @enderror ">
								@error('name_en')
								<label  class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
							<div class="col-md-4">
								<div class="form-check form-check-switchery mt-4">
									<label class="form-check-label">
										<input type="checkbox" name="active" class="form-check-input-switchery " {{ $admin_type->isActive() ? 'checked' : '' }} data-fouc>
										@lang('admin_types.active')
									</label>
								</div>
							</div>
						</div>
					</div>






			
					<div class="card-footer bg-light" >
						<button type="submit" class="btn btn-warning float-right ml-2"> @lang('admin_types.edit') </button>
						<a href="{{ route('admin_types.index') }}" class="btn btn-secondary "> @lang('admin_types.back') </a>
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