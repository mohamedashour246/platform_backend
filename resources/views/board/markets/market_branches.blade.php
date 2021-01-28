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
	@include('board.layout.messages')

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
				<a href="{{ route('market.branches.index'  , ['market' => $market->id ] ) }}" class="list-group-item list-group-item-action active text-white">
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
		<div class="row">
			<div class="col-md-12">
				<div class="header-elements  ">
					<div class="float-right">
						<a href="{{ route('market.branches.create', ['market' => $market->id ] ) }}" class="btn btn-primary ml-1"> <i class="icon-plus3"></i>  @lang('branches.add_new_branch') </a>
					</div>
				</div>
			</div>
			<hr>
			<br>

		</div>

		<!-- Account settings -->
		<div class="card">
			<table class="table table-bordered table-xs ">
				<thead class="bg-dark text-center">
					<tr>
						<th> </th>
						<th> @lang('branches.branch_name') </th>
						<th> @lang('branches.phones') </th>
						<th> @lang('branches.address') </th>
						<th> @lang('branches.added_by') </th>
						<th> @lang('branches.created_at') </th>
					</tr>
				</thead>
				<tbody class="text-center">
					@php
					$i = 1;
					@endphp
					@foreach ($market->branches as $branch)
					<tr>
						<td> 
							<a href="#collapse-icon{{ $branch->id }}" class="text-default" data-toggle="collapse">
								<i class="icon-circle-down2"></i>
							</a>
						</td>
						<td>   {{ $branch->name }}  </td>
						<td >{{ $branch->phones }}</td>
						<td >
							@lang('customers.governorate') {{ optional($branch->governorate)['name_'.$lang] }}
							@lang('customers.city') {{ optional($branch->city)['name_'.$lang] }}
							@lang('customers.place_number') {{ $branch->place_number }}
							@lang('customers.street_name') {{ $branch->street_name }}
							@lang('customers.avenue_number') {{$branch->avenue_number }}
							@lang('customers.building_number') {{$branch->building_number }}
							@lang('customers.building_type') {{ optional($branch->building_type)['name_'] }}
						</td>
						<td > <a target='_blank' href="{{ route('admins.show'  , ['admin' => $branch->admin_id ] ) }}"> {{ optional($branch->admin)->name }} </a> </td>
						<td >{{ $branch->created_at->toFormattedDateString() }} - {{ $branch->created_at->diffForHumans() }} </td>
					</tr>
					<tr class="collapse " id="collapse-icon{{ $branch->id }}" >
						<td colspan="100%" >


							<div class="float-left">
								@lang('admins.settings') :

								<a target="_blank" href="{{ route('market.branches.show'  , ['branch' => $branch->id , 'market' => $market->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
									<i class="icon-eye2 text-primary-800"></i>
								</a>
								<a target="_blank" href="{{ route('market.branches.edit' , ['branch' => $branch->id ,  'market' => $market->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
									<i class="icon-pencil7 text-warning-800"></i>
								</a>
								<a href="" data-id="{{ $branch->id }}" class=" delete_branch btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>

								<form name="deleteFormNumber{{ $branch->id }}" action="{{ route('market.branches.destroy' , ['branch' => $branch->id , 'market' => $market->id ]) }}" method="POST" >
									@method('DELETE')
									@csrf
								</form>
							</div>
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

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
		$('a.delete_branch').on('click', function(event) {
			event.preventDefault();
			id = $(this).data('id');
			console.log(id);
			Swal.fire({

				text: "هل انت متاكد من رغبتك فى حذف الفرع",
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'نعم',
				cancelButtonText: 'لا'
			}).then((result) => {
				if (result.isConfirmed) {

					name = "deleteFormNumber" + id;
					$('form[name="'+ name +'"]').submit();

				}
			})
		});
	});
</script>
@endsection
