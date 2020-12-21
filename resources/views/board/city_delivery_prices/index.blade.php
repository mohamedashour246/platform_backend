@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('city_delivery_prices.city_delivery_prices')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('city_delivery_prices.city_delivery_prices') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('city_delivery_prices.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('city_delivery_prices.city_delivery_prices') </a>
				<span class="breadcrumb-item active"> @lang('city_delivery_prices.show_all_city_delivery_prices') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('board.layout.messages')

		<livewire:city-delivery-price  />
	</div>
</div>

@endsection


@section('styles')


@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script>
	$(function() {
		$('.from , .to').select2({
			placeholder: "اختر المتجر",
			minimumInputLength: 2,
			ajax: {
				url: '/Board/search_in_cities',
				dataType: 'json',
				type: 'GET' ,
				data: function (params) {
					var queryParameters = {
						q: params.term ,
					}
					return queryParameters;
				},
				delay: 500,
				processResults: function (data) {
					return {
						results:  $.map(data.data, function (item) {
							return {
								text: item.text,
								id: item.id
							}
						})
					};
				},
				cache: true
			}
		});
	});
</script>
@endsection