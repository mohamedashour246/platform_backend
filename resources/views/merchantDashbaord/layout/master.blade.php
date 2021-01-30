<!DOCTYPE html>
<html lang="en" dir="{{ session()->get('dir') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> @lang('board.board') | @yield('title') </title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	{{-- <link href="{{ asset('board_assets/rtl/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css"> --}}
	<link href="{{ asset('board_assets/rtl/assets/css/lang.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	@livewireStyles



	@yield('styles')

	@livewireScripts
	<!-- Core JS files -->
	<script src="{{ asset('board_assets/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/plugins/ui/slinky.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('board_assets/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

	<script src="{{ asset('board_assets/rtl/assets/js/app.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_pages/dashboard.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/lines.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/areas.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/donuts.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/bars.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/progress.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/pies.js') }}"></script>
	<script src="{{ asset('board_assets/global_assets/js/demo_charts/pages/dashboard/light/bullets.js') }}"></script>
	<!-- /theme JS files -->


	@yield('scripts')

</head>

<body>


	@include('merchants.layout.header')

	@yield('header')


	<!-- Page content -->
	<div class="page-content pt-0">
		@include('merchants.layout.sidebar')
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">
				@yield('content')
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
	@include('merchantDashbaord.layout.footer')
</body>
</html>
