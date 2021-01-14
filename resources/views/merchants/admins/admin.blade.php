@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('admins.admin_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('admins.admins') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('merchants.admins.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admins.admins') </a>
				<span class="breadcrumb-item active"> @lang('admins.admin_details') </span>
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
				<a href="{{ route('merchants.admins.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('admins.add_new_admin')  </a>
				<a href="{{ route('merchants.admins.edit'  , ['admin' => $admin->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('admins.edit_admin_details')  </a>

			</div>
		</div>
	</div>




	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('admins.admin_details') {{ $admin->username }} </h5>
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
							<th class="font-weight-bold text-dark">@lang('admins.name')</th>
							<td class="text-left"> {{ $admin->name }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('admins.phone')</th>
							<td class="text-left"> {{ $admin->phone }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('admins.address')</th>
							<td class="text-left"> {{ $admin->address }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('admins.username')</th>
							<td class="text-left"> {{ $admin->username }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark">@lang('admins.trips_daily_count')</th>
							<td class="text-left"> {{ $admin->trips()->whereDay('created_at'  , Carbon\Carbon::today() )->count() }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark">@lang('admins.all_trips_count')</th>
							<td class="text-left"> {{ $admin->trips()->count() }} </td>
						</tr>


						<tr>
							<th class="font-weight-bold text-dark"> @lang('admins.email') </th>
							<td class="text-left">	{{ $admin->email }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('admins.activation') </th>
							<td class="text-left">
								@switch($admin->active)
								@case(1)
								<label  class="badge badge-success" > @lang('admins.active') </label>
								@break
								@case(0)
								<label  class="badge badge-secondary" > @lang('admins.inactive') </label>
								@break
								@endswitch
							</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('admins.type') </th>
							<td class="text-left">
								<span class="badge badge-primary"> {{ optional($admin->type)['name_'.$lang] }} </span>
							</td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('admins.created_at') </td>
							<td class="text-left"> {{ $admin->created_at->toFormattedDateString() }} - {{ $admin->created_at->diffForHumans() }} </td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('admins.notes') </td>
							<td class="text-left font-weight-bold"> {{ $admin->notes }} </td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('admins.permissions') </td>
							<td class="text-left font-weight-bold">
								<ul class="list-unstyled">
									@foreach ($admin->permissions as $permission)
									<li> <i class="icon-star-full2 text-warning-300"></i> {{ $permission->permission['description_'.$lang] }} </li>
									@endforeach
								</ul>

							</td>
						</tr>

						<tr>
							<td class="font-weight-semibold">  @lang('admins.current_profile_picture') </td>
							<td class="text-right text-muted">
								<img class="img-responsive img-thumbnail" width="300" height="300" src="{{ Storage::disk('s3')->url('merchants/'.$admin->image) }}" alt="">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer bg-white d-flex justify-content-between align-items-center">
				<button type="button" class="btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400"> المشرفين </button>
				<a  href="{{ route('merchants.admins.edit'  , ['admin' => $admin->id ] ) }}" class="btn bg-warning">تعديل</a>
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


		@if ($admin->type == 'superadmin')
		$('input.permissions').each(function(){
			$(this).prop('disabled',true);
			$.uniform.update();
		});
		@endif

		$('select[name="type"]').on('select2:select', function(event) {

			var admin_type = $(event.currentTarget).val();
			console.log(admin_type);
			if (admin_type == 'superadmin') {
				$('input.permissions').each(function(){
					console.log(admin_type);
					$(this).prop('disabled',true);
					$.uniform.update();
				});
			} else {
				$('input.permissions').each(function(){
					console.log(admin_type);
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