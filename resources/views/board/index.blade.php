@extends('board.layout.master')

@section('title')
@lang('board.home')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('board.board') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<span class="breadcrumb-item active"> @lang('board.home') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-sm-6 col-xl-3">
		<div class="card card-body bg-success-700 has-bg-image">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x opacity-75"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="mb-0">652,549</h3>
					<span class="text-uppercase font-size-xs">total clicks</span>
				</div>
			</div>
		</div>
	</div>


	<div class="col-sm-6 col-xl-3">
		<div class="card card-body bg-success-700 has-bg-image">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x opacity-75"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="mb-0">652,549</h3>
					<span class="text-uppercase font-size-xs">total clicks</span>
				</div>
			</div>
		</div>
	</div>


	<div class="col-sm-6 col-xl-3">
		<div class="card card-body bg-success-700 has-bg-image">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x opacity-75"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="mb-0">652,549</h3>
					<span class="text-uppercase font-size-xs">total clicks</span>
				</div>
			</div>
		</div>
	</div>


	<div class="col-sm-6 col-xl-3">
		<div class="card card-body bg-success-700 has-bg-image">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-pointer icon-3x opacity-75"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="mb-0">652,549</h3>
					<span class="text-uppercase font-size-xs">total clicks</span>
				</div>
			</div>
		</div>
	</div>


</div>

@endsection


@section('styles')

@endsection

@section('scripts')

@endsection