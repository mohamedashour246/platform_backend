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
		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="mr-3 align-self-center">
						<i class="icon-pointer icon-3x text-success-400"></i>
					</div>

					<div class="media-body text-right">
						<h3 class="font-weight-semibold mb-0">120</h3>
						<span class="text-uppercase font-size-sm text-muted"> رحله اليوم </span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="mr-3 align-self-center">
						<i class="icon-enter6 icon-3x text-indigo-400"></i>
					</div>

					<div class="media-body text-right">
						<h3 class="font-weight-semibold mb-0">90</h3>
						<span class="text-uppercase font-size-sm text-muted">رحله قم تم توصيلها</span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="media-body">
						<h3 class="font-weight-semibold mb-0">30</h3>
						<span class="text-uppercase font-size-sm text-muted"> رحله لم يتم التوصيل بعد</span>
					</div>

					<div class="ml-3 align-self-center">
						<i class="icon-bubbles4 icon-3x text-blue-400"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="media-body">
						<h3 class="font-weight-semibold mb-0">500 ريال </h3>
						<span class="text-uppercase font-size-sm text-muted">ايراد التوصيلات حتى الان</span>
					</div>

					<div class="ml-3 align-self-center">
						<i class="icon-bag icon-3x text-danger-400"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="mr-3 align-self-center">
						<i class="icon-users icon-3x text-success-400"></i>
					</div>

					<div class="media-body text-right">
						<h3 class="font-weight-semibold mb-0">14</h3>
						<span class="text-uppercase font-size-sm text-muted"> سائق متاح </span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="mr-3 align-self-center">
						<i class="icon-users icon-3x text-indigo-400"></i>
					</div>

					<div class="media-body text-right">
						<h3 class="font-weight-semibold mb-0">2</h3>
						<span class="text-uppercase font-size-sm text-muted">سائق غير متاح</span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="media-body">
						<h3 class="font-weight-semibold mb-0">10</h3>
						<span class="text-uppercase font-size-sm text-muted"> سائق يقوم بالتوصيل</span>
					</div>

					<div class="ml-3 align-self-center">
						<i class="icon-users icon-3x text-blue-400"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card card-body">
				<div class="media">
					<div class="media-body">
						<h3 class="font-weight-semibold mb-0">4</h3>
						<span class="text-uppercase font-size-sm text-muted">سائق مستعد للتوصيل </span>
					</div>

					<div class="ml-3 align-self-center">
						<i class="icon-users icon-3x text-danger-400"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">

			<!-- Members online -->
			<div class="card bg-teal-400">
				<div class="card-body">
					<div class="d-flex">
						<h3 class="font-weight-semibold mb-0">3,450</h3>
						<span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span>
					</div>

					<div>
						Members online
						<div class="font-size-sm opacity-75">489 avg</div>
					</div>
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /members online -->

		</div>

		<div class="col-lg-4">

			<!-- Current server load -->
			<div class="card bg-pink-400">
				<div class="card-body">
					<div class="d-flex">
						<h3 class="font-weight-semibold mb-0">49.4%</h3>
						<div class="list-icons ml-auto">
							<div class="dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
									<a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
									<a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
									<a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
								</div>
							</div>
						</div>
					</div>

					<div>
						Current server load
						<div class="font-size-sm opacity-75">34.6% avg</div>
					</div>
				</div>

				<div id="server-load"></div>
			</div>
			<!-- /current server load -->

		</div>

		<div class="col-lg-4">

			<!-- Today's revenue -->
			<div class="card bg-blue-400">
				<div class="card-body">
					<div class="d-flex">
						<h3 class="font-weight-semibold mb-0">$18,390</h3>
						<div class="list-icons ml-auto">
							<a class="list-icons-item" data-action="reload"></a>
						</div>
					</div>

					<div>
						Today's revenue
						<div class="font-size-sm opacity-75">$37,578 avg</div>
					</div>
				</div>

				<div id="today-revenue"></div>
			</div>
			<!-- /today's revenue -->

		</div>
	</div>

</div>

@endsection


@section('styles')

@endsection

@section('scripts')

@endsection