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
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('governorates.governorate_delivery_prices') </h4>
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
		<div class="card" >
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> <i class="icon-users4 mr-1"></i> @lang('governorates.governorate_delivery_prices')</h5>
				<div class="header-elements">
				</div>
			</div>

			<div class="card-body">

				@if (count($governorate->delivery_prices))
									<table class="table datatable-responsive  text-center   table-hover ">
					<thead>
						<tr>
							<th>#</th>
							<th> @lang('governorates.from_governorate') </th>
							<th> @lang('governorates.to_governorate') </th>
							<th> @lang('governorates.delivery_price') </th>
							<th> @lang('governorates.added_by') </th>
							<th> @lang('governorates.created_at') </th>
							<th> @lang('governorates.settings') </th>
						</tr>
					</thead>
					<tbody>
						@php
						$i =1 ;
						@endphp
						@foreach ($governorate->delivery_prices as $delivery_price)
						<tr>
							<td  >{{ $i++ }}</td>
							<td> {{ $governorate['name_'.$lang] }} </td>
							<td> {{ optional($delivery_price->destinationGovernorate)['name_'.$lang] }} </td>
							<td> {{ $delivery_price->price }} </td>

							<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $delivery_price->admin_id] ) }}"> {{ optional($delivery_price->admin)->username }} </a> 
							</td>

							<td>{{ $delivery_price->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $delivery_price->created_at->diffForHumans() }} </span> </td>
							<td>
								<a target="_blank"  data-popup="tooltip" title="@lang('governorates.edit')" href="{{ route('delivery_prices.edit' , ['delivery_price' => $delivery_price->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i>
								</a>
									<form action="{{ route('delivery_prices.destroy'  , ['delivery_price' => $delivery_price->id] ) }}" class="form-inline float-right" method="POST" >
										@csrf
										@method('DELETE')
										<button  data-popup="tooltip" title="@lang('governorates.delete_delivery_price')" type="submit" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 "><i class="icon-trash"></i></button>
									</form>
								</td>
							</tr>

							@endforeach

						</tbody>
					</table>
				@else
				<p  class="text-danger font-weight-bold text-center" > @lang('governorates.no_delivery_prices_yet') </p>
				@endif
			</div>
		</div>		
	</div>
</div>

@endsection


@section('styles')


@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
@endsection