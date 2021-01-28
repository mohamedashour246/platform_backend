@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('markets.market_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('markets.markets') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>@lang('board.board') </a>
				<a href="{{ route('markets.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>@lang('markets.markets')</a>
				<span class="breadcrumb-item active"> @lang('markets.market_details') </span>
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
				<a href="{{ route('markets.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('markets.add_new_market')  </a>
				<a href="{{ route('markets.edit'  , ['market' => $market->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('markets.edit_market_details')  </a>
				<form action="{{ route('markets.destroy'  , ['market' => $market->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger "> <i class="icon-trash"></i> @lang('markets.delete_market') </button>
				</form>
			</div>
		</div>
	</div>


	@include('board.layout.messages')

	<div class="col-md-2">
		<div class="card">
			<div class="card-body text-center">
				<div class="card-img-actions d-inline-block mb-3">
					<img class="img-thumbnail img-responsive " src="{{ Storage::disk('s3')->url('markets/'.$market->logo) }}" alt="" width="170" height="170">
				</div>
				<h6 class="font-weight-semibold mb-0">{{ $market->name }}</h6>
			</div>
		</div>
		

		<div class="card">
			<div class="list-group list-group-flush ">
				<a href="{{ route('markets.show'  , ['market' => $market->id] ) }}" class="list-group-item list-group-item-action  text-dark ">
					<i class="icon-store mr-3"></i>
					@lang('markets.market_details')
				</a>
				<a href="{{ route('market.admin'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark ">
					<i class="icon-user mr-3"></i>
					@lang('markets.market_admin')
				</a>
				<a href="{{ route('market.branches.index'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action  text-dark">
					<i class="icon-git-branch  mr-3"></i>
					@lang('markets.branches')
				</a>
				<a href="{{ route('market.documents'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-files-empty  mr-3"></i>
					@lang('markets.documents')
				</a>
				<a href="{{ route('market.trips'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-location3  mr-3"></i>
					@lang('markets.trips')
				</a>
				<a href="{{ route('market.bank_accounts'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-coin-dollar  mr-3"></i>
					@lang('markets.bank_accounts')
				</a>
				<a href="{{ route('market.emails'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
					<i class="icon-mail-read  mr-3"></i>
					@lang('markets.emails')
				</a>
				<a href="{{ route('market.delivery_prices' , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action  active text-white">
					<i class="icon-coin-dollar  mr-3"></i>
					@lang('markets.delivery_prices')
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-10">
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('markets.add_market_delivery_prices') </h5>
				<div class="header-elements">
				</div>
			</div>

			<form action="{{ route('market.delivery_prices.store'  , ['market' => $market->id ] ) }}" method="POST">
				@csrf
				<div class="card-body">
					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('markets.market_data') </span> </legend>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label> @lang('markets.branche') </label>
									<select name="branche" id="branche" class="form-control" required="required">
										<option value=""></option>
										@foreach ($market->branches as $branche)
										<option value="{{ $branche->id }}"> {{ $branche->name }} </option>
										@endforeach
									</select>
									@error('branche')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('markets.governorate') </label>
									<select name="governorate" id="governorate" disabled="disabled" class="form-control">
										<option value=""></option>
										@foreach ($governorates as $governorate)
										<option value="{{ $governorate->id }}"> {{ $governorate['name_'.$lang] }} </option>
										@endforeach
									</select>
									@error('city')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>

								<div class="col-md-4">
									<label> @lang('markets.city') </label>
									<select name="city" id="city" class="form-control" multiple="multiple">
									</select>
									@error('city')
									<label class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend class="font-weight-bold"> <span class="text-primary"> @lang('markets.delivery_places') </span> </legend>
						<div class="form-group items">
						</div>
					</fieldset>
				</div>

				

				<div class="card-footer">
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('markets.add') </button>
					<a href="{{ route('market.delivery_prices' , ['market' => $market->id ] ) }}" class="btn btn-secondary "> @lang('markets.back') </a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')

<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script>
	$(function() {


		var branch_id = null;
		var governorate_id = null;
		// var governorate_id = null;


		$('select#branche').select2({
			placeholder : "@lang('markets.choose_branch')" , 
		});
		$('select#governorate').select2({
			placeholder : "@lang('markets.choose_governorate')" , 

		});

		$('select#city').select2({
			placeholder : "@lang('markets.choose_city_place')" , 
		});

		$('select#branche').on('change',  function(event) {
			event.preventDefault();
			branch_id = $(this).val();
			$('select#governorate').attr('disabled',false);
		});


		$('select#governorate').on('change', function(event) {
			event.preventDefault();
			governorate_id = $(this).val();
			$('select#city').select2('destroy');

			$.ajax({
				url: '{{ url('Board/available_cities_to_add_to_this_market') }}',
				type: 'GET',
				dataType: 'html',
				data: {governorate:governorate_id , branch_id:branch_id},
			})
			.done(function(data) {
				$('select#city').find('option').remove();
				$('select#city').append(data);
				$('select#city').select2({
					placeholder : "@lang('markets.choose_city_place')" , 
				});
			});
			
			
		});





		$(document).on('click', 'button.delete_item', function(event) {
			event.preventDefault();
			$(this).parent().parent().remove();
		});

		
		$('select#city').on('select2:select', function(event) {
			event.preventDefault();
			id = $("option:selected:last",this).val();
			$.ajax({
				url: '{{ url('/Board/markets_get_city_delivery_price_row') }}',
				type: 'GET',
				dataType: 'html',
				data: {id:id},
			})
			.done(function(data) {
				$('.items').append(data);
			});
		});
	});
</script>
@endsection