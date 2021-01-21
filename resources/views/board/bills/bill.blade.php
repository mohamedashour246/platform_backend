@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('bills.show_bill_details')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('bills.bills') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('bills.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('bills.bills') </a>
				<span class="breadcrumb-item active"> @lang('bills.show_bill_details') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')


<div class="row">
	<div class="col-md-12">
		@include('board.layout.messages')

		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('bills.show_bill_details') {{ $bill->username }} </h5>
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
							<th class="font-weight-bold text-dark">@lang('bills.number')</th>
							<td class="text-left"> {{ $bill->number }} </td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('bills.admin')</th>
							<td class="text-left"> 
								<a href="{{ route('admins.show'  , ['admin' => $bill->admin_id ] ) }}"> {{ optional($bill->admin)->name }} 
									<span class="d-block font-weight-normal text-muted"> {{ optional(optional($bill->admin)->type)['name_'.$lang] }} </span>
								</a> 
							</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('bills.driver')</th>
							<td class="text-left">
								<a href="{{ route('drivers.show'  , ['driver' => $bill->driver_id ] ) }}"> {{ optional($bill->driver)->name }} 
								</a> 
							</td>
						</tr>
						<tr>
							<th class="font-weight-bold text-dark">@lang('bills.status')</th>
							<td class="text-left"> 
								@switch($bill->status)
								@case(0)
								<span class="badge bg-warning" > @lang('bills.waiting') </span>
								@break
								@case(1)
								<span class="badge bg-success" > @lang('bills.accepted') </span>
								@break
								@case(2)
								<span class="badge bg-danger" > @lang('bills.refused') </span>
								@break
								@endswitch
							</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('bills.type') </th>
							<td class="text-left">	
								 <span class="badge badge-info font-weight-bold" > {{ optional($bill->type)['type_'.$lang] }} </span> 

								</td>
						</tr>
						

						<tr>
							<th class="font-weight-bold text-dark"> @lang('bills.comment') </th>
							<td class="text-left">	
								{{ $bill->comment }}
							</td>
						</tr>

						<tr>
							<th class="font-weight-bold text-dark"> @lang('bills.price') </th>
							<td class="text-left">	
								{{ $bill->price }}
							</td>
						</tr>
						<tr>
							<td class="font-weight-bold text-dark"> @lang('bills.created_at') </td>
							<td class="text-left"> {{ $bill->created_at->toFormattedDateString() }} - {{ $bill->created_at->diffForHumans() }} </td>
						</tr>

						<tr>
							<td class="font-weight-bold text-dark"> @lang('bills.updated_at') </td>
							<td class="text-left font-weight-bold">
							 {{ $bill->updated_at->toFormattedDateString() }}
							</td>
						</tr>
							
						<tr>
							<td class="font-weight-semibold">  @lang('bills.bill_image') </td>
							<td class="text-right text-muted">
								<img class="img-responsive img-thumbnail" width="300" height="300" src="{{ Storage::disk('s3')->url('bills/'.$bill->image) }}" alt="">
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
@endsection