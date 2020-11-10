@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('profile.profile')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('admins.admins') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('admins.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admins.admins') </a>
				<span class="breadcrumb-item active"> @lang('admins.add_new_admin') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
	 	<livewire:admins />
	</div>
</div>

@endsection


@section('styles')
  @livewireStyles

@endsection

@section('scripts')
  @livewireScripts
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
{{-- <script src="{{ asset('board_assets/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_pages/datatables_responsive.js') }}"></script> --}}
<script>
	$(function() {
		// $("#firstname").attr("disabled", "disabled");

		// $('select[name="type"]').on('select2:select', function(event) {
			
		// 	var admin_type = $(event.currentTarget).val();
		// 	console.log(admin_type);
		// 	if (admin_type == 'superadmin') {
		// 		$('input.permissions').each(function(){
		// 			console.log(admin_type);
		// 			$(this).prop('checked',true);
		// 			$.uniform.update();
		// 		});
		// 	} else {
		// 		$('input.permissions').each(function(){
		// 			console.log(admin_type);
		// 			$(this).prop('checked',false);
		// 			$.uniform.update();
		// 		});
		// 	}
		// });


		// $('.select').select2({
		// 	minimumResultsForSearch: Infinity
		// });

		// $('.form-input-styled').uniform({
		// 	fileButtonClass: 'action btn bg-primary'
		// });


		// var _componentSwitchery = function() {
		// 	if (typeof Switchery == 'undefined') {
		// 		console.warn('Warning - switchery.min.js is not loaded.');
		// 		return;
		// 	}


		// 	var elems = Array.prototype.slice.call(document.querySelectorAll('.form-check-input-switchery'));
		// 	elems.forEach(function(html) {
		// 		var switchery = new Switchery(html);
		// 	});

		// 	var primary = document.querySelector('.form-check-input-switchery-primary');
		// 	var switchery = new Switchery(primary, { color: '#2196F3' });
		// };
  //   // Bootstrap switch
  //   var _componentBootstrapSwitch = function() {
  //   	if (!$().bootstrapSwitch) {
  //   		console.warn('Warning - switch.min.js is not loaded.');
  //   		return;
  //   	}

  //       // Initialize
  //       $('.form-check-input-switch').bootstrapSwitch();
  //   };
  //   _componentSwitchery();



});
</script>
@endsection