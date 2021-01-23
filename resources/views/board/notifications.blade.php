@php
	$lang = session()->get('locale');
@endphp


@extends('board.layout.master')
@section('title')
@lang('profile.profile')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('profile.profile') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<span class="breadcrumb-item active"> @lang('profile.profile') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<!-- Inner container -->
<div class="d-md-flex align-items-md-start">
	<!-- Right content -->
	<div class="tab-content w-100">
		<div class="tab-pane fade active show" >
			<div class="card">
				<div class="card-body">
					<div class="list-feed">
						@foreach ($notifications as $notification)
						<div class="list-feed-item border-warning-400">
							<div class="text-muted font-size-sm mb-1"> {{ $notification->created_at->diffForHumans() }} </div>
							<a href="#"> {{ optional($notification->addedBy)->name }} </a> {{ $notification['title_'.$lang] }} - {{ $notification['content_'.$lang] }}
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /right content -->
</div>
<!-- /inner container -->
@endsection
@section('styles')
@endsection
@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_pages/user_pages_profile_tabbed.js') }}"></script>
@endsection