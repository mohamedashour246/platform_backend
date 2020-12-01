@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('cities.city_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('cities.cities') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('cities.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('cities.cities') </a>
				<span class="breadcrumb-item active"> @lang('cities.city_details') </span>
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
				<a href="{{ route('cities.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('cities.add_new_city')  </a>
				<a href="{{ route('cities.edit'  , ['city' => $city->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('cities.edit_city_details')  </a>
				<form action="{{ route('cities.destroy'  , ['city' => $city->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button href="#" class="btn btn-danger "> <i class="icon-trash"></i> @lang('cities.delete_city') </button>
				</form>
			</div>
		</div>
	</div>




	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('cities.city_details') {{ $city->username }} </h5>
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
							<th class="font-weight-bold text-dark">@lang('cities.name_en')</th>
							<td class="text-left"> {{ $city->name_en }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('cities.name_ar')</th>
							<td class="text-left"> {{ $city->name_ar }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('cities.price_within_city') </th>
							<td class="text-left">	{{ $city->price_within_city }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('cities.price_outside_city') </th>
							<td class="text-left">	{{ $city->price_outside_city }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('cities.activation') </th>
							<td class="text-left">	
								@switch($city->active)
								@case(1)
								<label  class="badge badge-success" > @lang('cities.active') </label>
								@break
								@case(0)
								<label  class="badge badge-secondary" > @lang('cities.inactive') </label>
								@break
								@endswitch
							</td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('cities.created_at') </td>
							<td class="text-left"> {{ $city->created_at->toFormattedDateString() }} - {{ $city->created_at->diffForHumans() }} </td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('cities.added_by') </td>
							<td class="text-left font-weight-bold"> <a href="{{ route('admins.show'  , ['admin' => $city->admin_id] ) }}"> {{ optional($city->admin)->username }} </a> </td>
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


		@if ($city->type == 'supercity')
		$('input.permissions').each(function(){
			$(this).prop('disabled',true);
			$.uniform.update();
		});
		@endif

		$('select[name="type"]').on('select2:select', function(event) {
			
			var city_type = $(event.currentTarget).val();
			console.log(city_type);
			if (city_type == 'supercity') {
				$('input.permissions').each(function(){
					console.log(city_type);
					$(this).prop('disabled',true);
					$.uniform.update();
				});
			} else {
				$('input.permissions').each(function(){
					console.log(city_type);
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