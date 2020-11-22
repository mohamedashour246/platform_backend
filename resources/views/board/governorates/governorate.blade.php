@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('governorates.governorate_details')
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
				<span class="breadcrumb-item active"> @lang('governorates.governorate_details') </span>
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
				<a href="{{ route('governorates.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('governorates.add_new_governorate')  </a>
				<a href="{{ route('governorates.edit'  , ['governorate' => $governorate->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('governorates.edit_governorate_details')  </a>
				<form action="{{ route('governorates.destroy'  , ['governorate' => $governorate->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button href="#" class="btn btn-danger "> <i class="icon-trash"></i> @lang('governorates.delete_governorate') </button>
				</form>
			</div>
		</div>
	</div>




	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('governorates.governorate_details') {{ $governorate->username }} </h5>
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
							<th class="font-weight-bold text-dark">@lang('governorates.username')</th>
							<td class="text-left"> {{ $governorate->username }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('governorates.email') </th>
							<td class="text-left">	{{ $governorate->email }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('governorates.activation') </th>
							<td class="text-left">	
								@switch($governorate->active)
								@case(1)
								<label  class="badge badge-success" > @lang('governorates.active') </label>
								@break
								@case(0)
								<label  class="badge badge-secondary" > @lang('governorates.inactive') </label>
								@break
								@endswitch
							</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('governorates.type') </th>
							<td class="text-left">	
								@switch($governorate->type)
								@case('governorate')
								<label  class="badge badge-primary" > @lang('governorates.governorate') </label>
								@break
								@case('supergovernorate')
								<label  class="badge badge-primary" > @lang('governorates.supergovernorate') </label>
								@break
								@endswitch
							</td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('governorates.created_at') </td>
							<td class="text-left"> {{ $governorate->created_at->toFormattedDateString() }} - {{ $governorate->created_at->diffForHumans() }} </td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('governorates.added_by') </td>
							<td class="text-left font-weight-bold"> <a href="{{ route('governorates.show'  , ['governorate' => $governorate->id] ) }}"> {{ optional($governorate->addedBy)->username }} </a> </td>
						</tr>


						<tr>
							<td class="font-weight-bold text-dark"> @lang('governorates.notes') </td>
							<td class="text-left font-weight-bold"> {{ $governorate->notes }} </td>
						</tr>


						<tr>
							<td class="font-weight-semibold">  @lang('governorates.current_profile_picture') </td>
							<td class="text-right text-muted">
								<img class="img-responsive img-thumbnail" width="300" height="300" src="{{ Storage::disk('s3')->url('governorates/'.$governorate->image) }}" alt="">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer bg-white d-flex justify-content-between align-items-center">
				<button type="button" class="btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400"> المشرفين </button>
				<a  href="{{ route('governorates.edit'  , ['governorate' => $governorate->id ] ) }}" class="btn bg-warning">تعديل</a>
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