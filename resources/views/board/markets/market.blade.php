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
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('markets.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('markets.markets') </a>
				<span class="breadcrumb-item active"> @lang('markets.market_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">

	<div class="col-md-12">
		@include('board.layout.messages')
	</div>


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
				<a href="{{ route('markets.show'  , ['market' => $market->id] ) }}" class="list-group-item list-group-item-action  active text-white ">
					<i class="icon-store mr-3"></i>
					@lang('markets.market_details')
				</a>
				<a href="{{ route('market.admin'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark ">
					<i class="icon-user mr-3"></i>
					@lang('markets.market_admin')
				</a>
				<a href="{{ route('market.branches'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
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
				<a href="{{ route('market.delivery_prices'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-dark">
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
				<h5 class="card-title"> @lang('markets.market_details') :  {{ $market->name }} </h5>
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
							<th class="font-weight-bold text-dark">@lang('markets.market_name')</th>
							<td class="text-left"> {{ $market->name }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('markets.phones') </th>
							<td class="text-left">	{{ $market->phones }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('markets.address') </th>
							<td class="text-left">	{{ $market->address }}	</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark"> @lang('markets.activation') </th>
							<td class="text-left">	
								@switch($market->active)
								@case(1)
								<label  class="badge badge-success" > @lang('markets.active') </label>
								@break
								@case(0)
								<label  class="badge badge-secondary" > @lang('markets.inactive') </label>
								@break
								@endswitch
							</td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('markets.created_at') </td>
							<td class="text-left"> {{ $market->created_at->toFormattedDateString() }} - {{ $market->created_at->diffForHumans() }} </td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('markets.added_by') </td>
							<td class="text-left font-weight-bold"> <a href="{{ route('markets.show'  , ['market' => $market->id] ) }}"> {{ optional($market->admin)->username }} </a> </td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('markets.notes') </td>
							<td class="text-left font-weight-bold"> {{ $market->notes }} </td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('markets.contract_image') </td>
							<td class="text-left font-weight-bold"> 

								<a href="{{ Storage::disk('s3')->url('markets/'.$market->contract_image) }}" data-popup="lightbox">
				                        <img src="{{ Storage::disk('s3')->url('markets/'.$market->contract_image) }}" class="img-preview rounded">
			                        </a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')
	<script src="{{ asset('board_assets/global_assets/js/plugins/media/fancybox.min.js') }}"></script>

	<script src="{{ asset('board_assets/global_assets/js/demo_pages/gallery_library.js') }}"></script>
@endsection