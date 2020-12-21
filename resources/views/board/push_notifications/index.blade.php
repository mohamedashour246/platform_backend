@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('push_notifications.push_notifications')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('push_notifications.push_notifications') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('push_notifications.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('push_notifications.push_notifications') </a>
				<span class="breadcrumb-item active"> @lang('push_notifications.show_all_push_notifications') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		@include('board.layout.messages')

		
		<div class="row">

			<div class="col-md-12">


				<div class="row">

					<div class="col-md-12 mb-3">
						<a  href="{{ route('push_notifications.create') }}" class="btn btn-primary float-right" > <i class="icon-user-plus mr-1"></i>@lang('push_notifications.send_new_push_notification') </a>
					</div>
				</div>

				<div class="card" >


					<table class="table datatable-responsive table-bordered text-center   table-hover ">
						<thead class="bg-dark">
							<tr>
								<th>#</th>
								<th> @lang('push_notifications.title_'.$lang) </th>
								<th> @lang('push_notifications.content_'.$lang) </th>
								<th> @lang('push_notifications.drivers_count') </th>
								<th> @lang('push_notifications.send_by') </th>
								<th> @lang('push_notifications.created_at') </th>
								<th> @lang('') </th>
							</tr>
						</thead>
						<tbody>
							@php
							$i =1 ;
							@endphp
							@foreach ($notifications as $notification)
							<tr>
								<td  >{{ $i++ }}</td>					
								<td >{{ $notification['title_'.$lang] }}</td>
								<td >{{ $notification['content_'.$lang] }}</td>
								<td> {{ count(json_decode($notification->drivers)) }} </td>
								<td> <a target="_blank" href="{{ route('admins.show'  , ['admin' => $notification->admin_id] ) }}"> {{ optional($notification->admin)->name }} </a> </td>

								<td>
									{{ $notification->created_at->toFormattedDateString() }} 
									- <span class="text-muted"> {{ $notification->created_at->diffForHumans() }} </span> 
								</td>
								<td>
									<a target="_blank" href="{{ route('push_notifications.show'  , ['push_notification' => $notification->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
										<i class="icon-eye2 text-primary-800"></i>
									</a>
								</td>
							</tr>

							@endforeach

						</tbody>
					</table>




				</div>



			</div>
		</div>	

	</div>
</div>

@endsection


@section('styles')


@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>

<script>
	$(function() {


	});
</script>
@endsection