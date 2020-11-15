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
				<a href="{{ route('market.bank_accounts'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action text-white active">
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
		
		@foreach ($market->bank_accounts as $bank_account)
		<div class="card card-body">
			<div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">

				<div class="media-body">
					<h6 class="media-title font-weight-semibold">
						@lang('markets.bank_name') : {{ $bank_account->bank_name }}
					</h6>

					<ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
						<li class="list-inline-item"> @lang('markets.account_owner_name') : {{ $bank_account->account_owner_name }}  </li>
					</ul>

					<p class="mb-3"> {{ $bank_account->notes }} </p>

					<ul class="list-inline list-inline-dotted mb-0">
						<li class="list-inline-item"> @lang('markets.added_by') <a target="_blank" href="{{ route('admins.show'  , ['admin' => $bank_account->admin_id ] ) }}"> {{ optional($bank_account->admin)->username }}</a></li>
						<li class="list-inline-item"> @lang('markets.created_at')  <span  class="text-muted" >  {{ $bank_account->created_at->toFormattedDateString() }} - {{ $bank_account->created_at->diffForHumans() }} </span> </li>
					</ul>
				</div>

				<div class="mt-3 mt-lg-0 ml-lg-3 text-center">
					<h3 class="mb-0 font-weight-semibold">{{ $bank_account->bank_account_number }}</h3>

					<div class="text-dark"> {{ $bank_account->swift_code }} </div>

					<button type="button" class="btn bg-warning-400 mt-3 btn-sm"><i class="icon-pencil5 mr-2"></i> @lang('markets.edit') </button>
					<button type="button" class="btn bg-danger-400 mt-3 btn-sm"><i class="icon-trash  mr-2"></i> @lang('markets.delete') </button>
				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')

@endsection