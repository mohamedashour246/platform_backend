@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('push_notifications.push_notification_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('push_notifications.send_new_push_notification') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('push_notifications.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('push_notifications.push_notifications') </a>
				<span class="breadcrumb-item active"> @lang('push_notifications.push_notification_details') </span>
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
				<a href="{{ route('push_notifications.create') }}" class="btn btn-primary ml-1"> <i class="icon-plus3"></i> @lang('push_notifications.send_new_push_notification')  </a>
			</div>
		</div>
	</div>




	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title">  </h5>
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
							<th class="font-weight-bold text-dark">@lang('push_notifications.title_ar')</th>
							<td class="text-left"> {{ $push_notification->title_ar }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('push_notifications.title_en')</th>
							<td class="text-left"> {{ $push_notification->title_en }} </td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark">@lang('push_notifications.content_en')</th>
							<td class="text-left"> {{ $push_notification->content_en }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('push_notifications.content_ar')</th>
							<td class="text-left"> {{ $push_notification->content_ar }} </td>
						</tr>
					
						<tr>
							<td class="font-weight-bold text-dark"> @lang('push_notifications.created_at') </td>
							<td class="text-left"> {{ $push_notification->created_at->toFormattedDateString() }} - {{ $push_notification->created_at->diffForHumans() }} </td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('push_notifications.send_by') </td>
							<td class="text-left font-weight-bold"> <a href="{{ route('admins.show'  , ['admin' => $push_notification->admin_id] ) }}"> {{ optional($push_notification->admin)->name }} </a> </td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('push_notifications.drivers') </td>
							<td class="text-left">
								@php
									$drivers = App\Models\Driver::find(json_decode($push_notification->drivers));
								@endphp
								@foreach ($drivers as $driver)
									<a href="{{ route('drivers.show'  , ['driver' => $driver->id ] ) }}">
							               <img src="{{ Storage::disk('s3')->url('drivers/'.$driver->image) }}" class="rounded-circle" alt="" width="36" height="36">
						            </a>
								@endforeach
							</td>
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


		@if ($push_notification->type == 'superpush_notification')
		$('input.permissions').each(function(){
			$(this).prop('disabled',true);
			$.uniform.update();
		});
		@endif

		$('select[name="type"]').on('select2:select', function(event) {
			
			var push_notification_type = $(event.currentTarget).val();
			console.log(push_notification_type);
			if (push_notification_type == 'superpush_notification') {
				$('input.permissions').each(function(){
					console.log(push_notification_type);
					$(this).prop('disabled',true);
					$.uniform.update();
				});
			} else {
				$('input.permissions').each(function(){
					console.log(push_notification_type);
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