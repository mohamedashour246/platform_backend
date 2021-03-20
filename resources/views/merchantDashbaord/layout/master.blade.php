<!DOCTYPE html>
<html lang="en" dir="{{ session()->get('dir') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> @lang('board.board') | @yield('title') </title>

	<!-- Global stylesheets -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Cairo|El+Messiri|Reem+Kufi" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="{{ asset('board_assets/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/global_assets/css/icons/icomoon/icostyles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('board_assets/rtl/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	{{-- <link href="{{ asset('board_assets/rtl/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css"> --}}
	<link href="{{ asset('board_assets/rtl/assets/css/lang.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets <!--  -->>
	@livewireStyles



	@yield('styles')

	@livewireScripts
	<!-- Core JS files -->
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
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
