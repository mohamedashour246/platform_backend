@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('customers.show_all_customers')
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
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('merchants.merchants') </a>
				<a href="{{ route('merchants.customers.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('customers.customers') </a>
				<span class="breadcrumb-item active"> @lang('markets.show_all_markets') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<livewire:merchants.customer.show-all-customers />

@endsection


@section('styles')


@endsection

@section('scripts')

<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/extensions/jquery_ui/touch.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_pages/components_collapsible.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
	$(function() {

	});
</script>
@endsection