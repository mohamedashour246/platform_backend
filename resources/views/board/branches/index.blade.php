@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('branches.show_all_branches')
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
				<a href="{{ route('merchants.branches.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('branches.branches') </a>
				<span class="breadcrumb-item active"> @lang('markets.show_all_markets') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('merchants.layout.messages')
		<div class="row">
			<div class="col-md-12 mb-3">
				<a  href="{{ route('merchants.branches.create') }}" class="btn btn-primary float-right" > <i class="icon-plus3  mr-1"></i>@lang('branches.add_new_branch') </a>
			</div>
		</div>
		<div class="card" >


			<table class="table datatable-responsive table-togglable table-bordered text-center   table-hover ">
				<thead class="bg-dark">
					<tr>
						<th>#</th>

						<th> @lang('branches.branch_name') </th>
						<th> @lang('branches.phones') </th>
						<th> @lang('branches.address') </th>
						<th> @lang('branches.added_by') </th>
						<th> @lang('branches.created_at') </th>
					</tr>
				</thead>
				<tbody>
					@php
					$i =1 ;
					@endphp
					@foreach ($branches as $branch)
					<tr>
						<td >
							<a href="#collapse-icon{{ $branch->id }}" class="text-default" data-toggle="collapse">
								<i class="icon-circle-down2"></i>
							</a>

						</td>
						<td  > <a href="{{ route('merchants.branches.show', ['branch' => $branch->id])}}"> {{ $branch->name }} </a> </td>
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
						<td >{{ optional($branch->merchant)->name }}</td>
						<td >{{ $branch->created_at->toFormattedDateString() }} - {{ $branch->created_at->diffForHumans() }} </td>

					</tr>
					<tr class="collapse " id="collapse-icon{{ $branch->id }}" >
						<td colspan="100%" >
							<div class="float-left">
								<a target="_blank" href="{{ route('merchants.branches.show'  , ['branch' => $branch->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
								<i class="icon-eye2 text-primary-800"></i>
							</a>
							<a target="_blank" href="{{ route('merchants.branches.edit' , ['branch' => $branch->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
								<i class="icon-pencil7 text-warning-800"></i>
							</a>
							<a href="" data-id="{{ $branch->id }}" class=" delete_branch btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>

							<form name="deleteFormNumber{{ $branch->id }}" action="{{ route('merchants.branches.destroy' , ['branch' => $branch->id ]) }}" method="POST" >

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