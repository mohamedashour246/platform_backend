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


<div class="card-body">
	<div class="row">
		<div class="col">
			<a href="{{ route('admins.index') }}" class="btn bg-teal-400 btn-block btn-float">
				<i class="icon-users4  icon-2x"></i>
				<span> @lang('board.admins') </span>
			</a>		
		</div>
		<div class="col">
			<a href="{{ route('drivers.index') }}" class="btn bg-purple-300 btn-block btn-float">
				<i class="icon-users icon-2x"></i>
				<span> @lang('board.drivers') </span>
			</a>
		</div>
		<div class="col">
			<a href="{{ route('markets.index') }}" class="btn bg-warning-400 btn-block btn-float">
				<i class="icon-store icon-2x"></i>
				<span> @lang('board.markets') </span>
			</a>
		</div>
		<div class="col">
			<a href="{{ route('trips.index') }}" class="btn bg-blue btn-block btn-float">
				<i class="icon-car icon-2x"></i>
				<span> @lang('board.trips') </span>
			</a>
		</div>

{{-- 		<div class="col">
			<a type="button" class="btn bg-warning-400 btn-block btn-float">
				<i class="icon-stats-bars icon-2x"></i>
				<span> @lang('board.markets') </span>
			</a>

			<a type="button" class="btn bg-blue btn-block btn-float">
				<i class="icon-cog3 icon-2x"></i>
				<span> @lang('board.trips') </span>
			</a>
		</div>
		<div class="col">
			<a type="button" class="btn bg-warning-400 btn-block btn-float">
				<i class="icon-stats-bars icon-2x"></i>
				<span> @lang('board.markets') </span>
			</a>

			<a type="button" class="btn bg-blue btn-block btn-float">
				<i class="icon-cog3 icon-2x"></i>
				<span> @lang('board.trips') </span>
			</a>
		</div>
		<div class="col">
			<a type="button" class="btn bg-warning-400 btn-block btn-float">
				<i class="icon-stats-bars icon-2x"></i>
				<span> @lang('board.markets') </span>
			</a>

			<a type="button" class="btn bg-blue btn-block btn-float">
				<i class="icon-cog3 icon-2x"></i>
				<span> @lang('board.trips') </span>
			</a>
		</div>

		<div class="col">
			<a type="button" class="btn bg-warning-400 btn-block btn-float">
				<i class="icon-stats-bars icon-2x"></i>
				<span> @lang('board.markets') </span>
			</a>

			<a type="button" class="btn bg-blue btn-block btn-float">
				<i class="icon-cog3 icon-2x"></i>
				<span> @lang('board.trips') </span>
			</a>
		</div> --}}
	</div>
</div>

{{-- 
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


</div> --}}

@endsection


@section('styles')

@endsection

@section('scripts')

@endsection