@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('branches.branch_details')
@endsection


@section('header')
<div class="page-header ">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('branches.branches') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('markets.show'  , ['market' => $market->id ] ) }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  {{  $market->name }}  </a>
				<a href="{{ route('market.branches.index'  , ['market' => $market->id ] ) }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('branches.branches') </a>
				<span class="breadcrumb-item active"> @lang('branches.branch_details') </span>
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

{{--
	<div class="col-md-12 mb-3">
		<div class="header-elements ">
			<div class="float-right">
				<a href="{{ route('branches.create') }}" class="btn btn-primary ml-1"> <i class="icon-user-plus"></i> @lang('branches.add_new_branch')  </a>
				<a href="{{ route('branches.edit'  , ['branch' => $branch->id ] ) }}" class="btn btn-warning ml-1"> <i class="icon-pencil5"></i> @lang('branches.edit_branch_details')  </a>
				<form action="{{ route('branches.destroy'  , ['branch' => $branch->id] ) }}" method="POST" class="float-right ml-1">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger "> <i class="icon-trash"></i> @lang('branches.delete_branch') </button>
				</form>
			</div>
		</div>
	</div>

	--}}


	<div class="col-md-12">
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('branches.branch_details') :  {{ $branch->name }} </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>


			<table class="table  table-xs border-top-0 my-2">
				<tbody>
					<tr>
						<th class="font-weight-bold text-dark">@lang('branches.branch_name')</th>
						<td class="text-left"> {{ $branch->name }} </td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('branches.phones') </th>
						<td class="text-left">	{{ $branch->phones }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('branches.address') </th>
						<td class="text-left">	{{ $branch->address }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('branches.governorate') </th>
						<td class="text-left">	{{ optional($branch->governorate)['name_'.$lang] }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('branches.city') </th>
						<td class="text-left">	{{ optional($branch->city)['name_'.$lang] }}	</td>
					</tr>
						<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.place_number') </th>
						<td class="text-left">	{{ $branch->place_number }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.street_name') </th>
						<td class="text-left">	{{ $branch->street_name }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.avenue_number') </th>
						<td class="text-left">	{{ $branch->avenue_number }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.building_number') </th>
						<td class="text-left">	{{  $branch->building_number  }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.floor_number') </th>
						<td class="text-left">	{{  $branch->floor_number  }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.apratment_number') </th>
						<td class="text-left">	{{ $branch->apratment_number  }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.apratment_number') </th>
						<td class="text-left">	{{ $branch->apratment_number  }}	</td>
					</tr>
					<tr>
						<th class="font-weight-bold text-dark"> @lang('customers.building_type') </th>
						<td class="text-left">	{{ optional($branch->building_type)['name_'.$lang]  }}	</td>
					</tr>
					<tr>
						<td class="font-weight-bold text-dark"> @lang('customers.created_at') </td>
						<td class="text-left"> {{ $branch->created_at->toFormattedDateString() }} - {{ $branch->created_at->diffForHumans() }} </td>
					</tr>
					<tr>
						<td class="font-weight-bold text-dark"> @lang('branches.added_by') </td>
						<td class="text-left"> <a href="{{ route('admins.show'  , ['admin' => $branch->admin_id ] ) }}">  {{  optional($branch->admin)->name   }}  </a> </td>
					</tr>
					<tr>

						<td colspan="5">
							<div id="map" style="width: 100%; height: 400px;" ></div>
						</td>

					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&amp;libraries=places"></script>



<script>
	$(function() {



		map = new google.maps.Map(document.getElementById("map"), {
			zoom: 13,
			center: { lat: {{ $branch->latitude }}, lng: {{ $branch->longitude }} },
		});
		marker = new google.maps.Marker({
			map,
			draggable: true,
			animation: google.maps.Animation.DROP,
			position: { lat: {{ $branch->latitude }}, lng: {{ $branch->longitude }} },
		});


	});
</script>
@endsection