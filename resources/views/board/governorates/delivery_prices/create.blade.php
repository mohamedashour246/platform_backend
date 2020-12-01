@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('governorates.governorate_delivery_prices')
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
				<span class="breadcrumb-item active"> @lang('governorates.governorate_delivery_prices') </span>
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
				<h5 class="card-title"> @lang('governorates.governorate_delivery_prices') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ url('Board/governorates/'.$governorate->id.'/delivery_prices') }}" method="POST"   >
				<div class="card-body">

					@csrf
					


					@if (count($governorates))
						@foreach ($governorates as $governorate)
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label> @lang('governorates.deliver_to_governorate') </label>
								<select name="from_governorate_id[]" readonly="readonly" class="form-control" >
									<option value="{{ $governorate->id }}" selected="selected">{{ $governorate['name_'.$lang] }}</option>
								</select>
							</div>

							<div class="col-md-6">
								<label> سعر التوصيل </label>
								<input type="number" name="prices[]" value="{{ old('prices.*') }}" class="form-control" >
							</div>
						</div>
					</div>
					@endforeach
					@else
					<p class="text-center text-danger font-weight-bold"> @lang('governorates.all_governorates_are_done') </p>
					@endif

{{-- 					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label> المحافظه </label>
								<select name="from_governorate_id"  class="form-control select" >
									@foreach ($governorates as $governorate)
									<option value="{{ $governorate->id }}">{{ $governorate['name_'.$lang] }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-6">
								<label> المدينه </label>
								<select name="to[]"  class="form-control select-remote-data to" data-fouc>
								</select>
							</div>

						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label> @lang('governorates.price') </label>
								<input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror " >
								@error('price')
								<label class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
						</div>
					</div>
					--}}

				</div>

				<div class="card-footer bg-light" >
					<button {{ count($governorates) == 0 ? 'disabled="disabled"' : '' }} type="submit" class="btn btn-primary float-right ml-2"> @lang('governorates.add') </button>
					<a href="{{ route('governorates.index') }}" class="btn btn-secondary "> @lang('governorates.back') </a>
				</div>
			</form>
		</div>
		<!-- /account settings -->
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
{{-- <script src="{{ asset('board_assets/global_assets/js/demo_pages/form_select2.js') }}"></script> --}}
<script>
	$(function() {
		// $("#firstname").attr("disabled", "disabled");
		var from_governorate_id = null;
		var to_governorate_id = null;


		$('select[name="from_governorate_id"]').on('change',  function(event) {
			event.preventDefault();
			from_governorate_id = $(this).val();
		});

		$('select[name="to_governorate_id"]').on('change',  function(event) {
			event.preventDefault();
			to_governorate_id = $(this).val();
		});



		// $('.from').select2({
		// 	placeholder: "اختر المدينه",
		// 	ajax: {
		// 		url: '/Board/searching_governorates',
		// 		dataType: 'json',
		// 		type: 'GET' ,
		// 		data: function (params) {
		// 			var queryParameters = {
		// 				q: params.term ,
		// 				from_governorate_id : from_governorate_id ,
		// 			}

		// 			return queryParameters;
		// 		},
		// 		delay: 250,
		// 		processResults: function (data) {
		// 			return {
		// 				results:  $.map(data, function (item) {
		// 					return {
		// 						text: item.name_en +  ' ' + item.name_ar ,
		// 						id: item.id
		// 					}
		// 				})
		// 			};
		// 		},
		// 		cache: false
		// 	}
		// });


		// $('.to').select2({
		// 	placeholder: "اختر المدينه",
		// 	ajax: {
		// 		url: '/Board/searching_governorates',
		// 		dataType: 'json',
		// 		type: 'GET' ,
		// 		delay: 250,
		// 		processResults: function (data) {
		// 			return {
		// 				results:  $.map(data, function (item) {
		// 					return {
		// 						text: item.name_en + ' ' + item.name_ar ,
		// 						id: item.id
		// 					}
		// 				})
		// 			};
		// 		},
		// 		cache: false
		// 	}
		// });




		$('.select').select2();


	});
</script>
@endsection