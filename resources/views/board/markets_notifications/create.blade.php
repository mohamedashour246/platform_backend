@php
$lang = session()->get('locale');
@endphp
@extends('board.layout.master')
@section('title')
@lang('markets.markets_notifications')
@endsection


@section('header')
<div class="page-header">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-right6 mr-2"></i> @lang('markets.push_notifications') </h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
		<div class="header-elements d-none py-0 mb-3 mb-md-0">
			<div class="breadcrumb">
				<a href="{{ route('board.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
				<a href="{{ route('markets.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('markets.markets_notifications') </a>
				<span class="breadcrumb-item active"> @lang('markets.send_new_notification') </span>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">

		@include('board.layout.messages')
		<!-- Account settings -->
		<div class="card">
			<div class="card-header bg-dark header-elements-inline">
				<h5 class="card-title"> @lang('markets.send_new_notification') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>
			<form action="{{ route('markets_notifications.store') }}" method="POST"  enctype="multipart/form-data" >
				<div class="card-body">

					@csrf
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label> @lang('markets.markets') </label>
									<select name="markets[]" multiple="multiple" class="form-control select" data-fouc>
										<option value="all"> @lang('markets.all') </option>
										@foreach ($markets as $market)
										<option value="{{ $market->id }}">{{ $market->name }} </option>
										@endforeach
									</select>
									@error('markets')
									<label  class="text-danger font-weight-bold " > {{ $message }} </label>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label> @lang('markets.title_ar') </label>
								<input type="text" name="title_ar" value="{{ old('title_ar') }}" class="form-control @error('title_ar') is-invalid @enderror ">
								@error('title_ar')
								<label  class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
							<div class="col-md-6">
								<label> @lang('markets.title_en') </label>
								<input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control @error('title_en') is-invalid @enderror ">
								@error('title_en')
								<label  class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label> @lang('markets.content_ar') </label>
								<textarea name="content_ar"  class="form-control" rows="3" required="required"> {{ old('content_ar') }} </textarea>
								@error('content_ar')
								<label  class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
							<div class="col-md-6">
								<label> @lang('markets.content_en') </label>
								<textarea name="content_en"  class="form-control" rows="3" required="required"> {{ old('content_en') }} </textarea>
								@error('content_en')
								<label  class="text-danger font-weight-bold " > {{ $message }} </label>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer bg-light" >
					<button type="submit" class="btn btn-primary float-right ml-2"> @lang('markets.send') </button>
					<a href="{{ route('markets.index') }}" class="btn btn-secondary "> @lang('markets.back') </a>
				</div>
			</form>
		</div>
		<!-- /account settings -->
	</div>
</div>

@endsection


@section('styles')

@endsection

@section('scripts')

<script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script>
	$(function() {
		$('.select').select2({
			minimumResultsForSearch: Infinity
		});
	});
</script>
@endsection