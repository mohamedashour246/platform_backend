@extends('merchants.layout.master')

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
<div class="col-md-12">
	<!-- List layout -->
	<div class="card">


		<div class="card-body">
			<ul class="media-list">
				<li class="media card-body flex-column flex-sm-row">
					<div class="media-body">
						<h6 class="media-title font-weight-semibold">
							<a href="#"> تنبيه من الاداره </a>
						</h6>
						برجاء التواصل مع الاداره بشكل سريع حتى لا يتم غلق الحساب الخاص بك
					</div>
					<div class="ml-sm-3 mt-2 mt-sm-0">
						<span class="badge bg-blue"> تنبيه جديد </span>
					</div>
				</li>


				<li class="media card-body flex-column flex-sm-row">
					<div class="media-body">
						<h6 class="media-title font-weight-semibold">
							<a href="#"> تنبيه خص بالطلب رقم #5478954  </a>
						</h6>
						تم الانتهاء من توصيل طلبيتك رقم #5478954 بنجاح
					</div>
					<div class="ml-sm-3 mt-2 mt-sm-0">
						<span class="text-muted">  منذو 3 دقائق </span>
					</div>
				</li>



				<li class="media card-body flex-column flex-sm-row">
					<div class="media-body">
						<h6 class="media-title font-weight-semibold">
							<a href="#"> تم تحويل مبلغ مالى  </a>
						</h6>
						 تم تحويل المبلغ المالى 1000 دينار الى الحساب الخاص بك رقم 021454796547 بنك الراجحى بنجاح
					</div>
					<div class="ml-sm-3 mt-2 mt-sm-0">
						<span class="text-muted">  منذو 15 دقائق </span>
					</div>
				</li>


			</ul>
		</div>


	</div>
	<!-- /list layout -->


</div>
<!-- /inner container -->

@endsection


@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_pages/user_pages_profile_tabbed.js') }}"></script>
@endsection