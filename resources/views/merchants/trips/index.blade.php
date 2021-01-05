@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('trips.show_all_trips')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('trips.trips') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('merchants.trips.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('trips.trips') </a>
				<span class="breadcrumb-item active"> @lang('trips.show_all_trips') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('board.layout.messages')

		<livewire:merchants.trips.show-trips-list />
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
@endsection