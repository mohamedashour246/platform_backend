@php
$lang = session()->get('locale');
@endphp
@extends('merchants.layout.master')
@section('title')
@lang('profile.profile')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('admins.admins') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('merchants.merchants') </a>
				<a href="{{ route('merchants.admins.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('admins.admins') </a>
				<span class="breadcrumb-item active"> @lang('admins.show_all_admins') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('merchants.layout.messages')

			<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 mb-3">
				<a  href="{{ route('merchants.admins.create') }}" class="btn btn-primary float-right" > <i class="icon-user-plus mr-1"></i>@lang('admins.add_new_admin') </a>
			</div>
		</div>
		<div class="card" >



			<table class="table datatable-responsive  table-bordered text-center   table-hover ">
				<thead class="bg-dark">
					<tr>
						<th>#</th>
						<th> @lang('admins.picture') </th>
						<th> @lang('admins.name') </th>
						<th> @lang('admins.username') </th>
						<th> @lang('admins.phone') </th>
						<th> @lang('admins.created_at') </th>
						<th> @lang('admins.settings') </th>
					</tr>
				</thead>
				<tbody>
					@php
					$i =1 ;
					@endphp
					@foreach ($admins as $admin)
					<tr>
						<td  >{{ $i++ }}</td>
						<td > <img class="img-thumbnail" width="50" height="50" src="{{ Storage::disk('s3')->url('merchants/'.$admin->image) }}" alt=""> </td>
						<td  > <a href="{{ route('merchants.admins.show', ['admin' => $admin->id])}}"> {{ $admin->name }} </a> </td>
						<td  > {{ $admin->username }} </td>
						<td >{{ $admin->phone }}</td>



						<td>{{ $admin->created_at->toFormattedDateString() }} - <span class="text-muted"> {{ $admin->created_at->diffForHumans() }} </span> </td>
						<td>
							<a target="_blank" href="{{ route('merchants.admins.show'  , ['admin' => $admin->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
								<i class="icon-eye2 text-primary-800"></i>
							</a>
							<a target="_blank" href="{{ route('merchants.admins.edit' , ['admin' => $admin->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
								<i class="icon-pencil7 text-warning-800"></i></a>

								<a href="" data-id="{{ $admin->id }}" class=" delete_admin btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>
							</td>
						</tr>

						@endforeach

					</tbody>
				</table>


{{--
				<div class="card-footer bg-light ">
					<div class="float-right" >
						{{ $admins->links() }}
					</div>
				</div> --}}
			</div>



		</div>
	</div>
</div>

@endsection


@section('styles')


@endsection

@section('scripts')
<script src="{{ asset('merchants_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
@endsection