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
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('governorates.governorates') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('governorates.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('governorates.governorates') </a>
				<span class="breadcrumb-item active"> @lang('governorates.show_all_governorates') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('board.layout.messages')

		<livewire:governorates />
	</div>
</div>

@endsection


@section('styles')


@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>

<script>
	$(function() {


	});
</script>
@endsection