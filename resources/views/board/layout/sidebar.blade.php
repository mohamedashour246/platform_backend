@php
	$lang = session()->get('locale');
@endphp
<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-right8"></i>
		</a>
		<span class="font-weight-semibold">Main sidebar</span>
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">
		<div class="card card-sidebar-mobile">

			<!-- Header -->
			<div class="card-header header-elements-inline">
				<h6 class="card-title">@lang('board.shortcuts')</h6>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
					</div>
				</div>
			</div>

			<!-- User menu -->
			<div class="sidebar-user">
				<div class="card-body">
					<div class="media">
						<div class="mr-3">
							<a href="#"><img src="{{ Storage::disk('s3')->url('admins/'.Auth::guard('admin')->user()->image) }}" width="38" height="38" class="rounded-circle" alt=""></a>
						</div>
						<div class="media-body">
							<div class="media-title font-weight-semibold">{{ Auth::guard('admin')->user()->username }}</div>
							<div class="font-size-xs opacity-50">
								@php
									$admin = Auth::guard('admin')->user();
									$admin->load('type');

								@endphp
								<i class="icon-pin font-size-sm"></i> {{ optional($admin->type)['name_'.$lang] }}
							</div>
						</div>
						<div class="ml-3 align-self-center">
							<a href="#" class="text-white"><i class="icon-cog3"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- /user menu -->


			<!-- Main navigation -->
			<div class="card-body p-0">
				<ul class="nav nav-sidebar" data-nav-type="accordion">

					<!-- Main -->
					<li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
					<li class="nav-item">
						<a href="{{ url('/Board') }}" class="nav-link active">
							<i class="icon-home4"></i>
							<span>
								@lang('board.board')
							</span>
						</a>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-users4"></i> <span>@lang('admins.admins')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('admins.index') }}" class="nav-link"> @lang('admins.show_all_admins') </a></li>
							<li class="nav-item"><a href="{{ route('admins.create') }}" class="nav-link"> @lang('admins.add_new_admin') </a></li>
						</ul>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-users"></i> <span>@lang('drivers.drivers')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('drivers.index') }}" class="nav-link"> @lang('drivers.show_all_drivers') </a></li>
							<li class="nav-item"><a href="{{ route('drivers.create') }}" class="nav-link"> @lang('drivers.add_new_driver') </a></li>
						</ul>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-map"></i> <span>@lang('cities.cities')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('cities.index') }}" class="nav-link"> @lang('cities.show_all_cities') </a></li>
							<li class="nav-item"><a href="{{ route('cities.create') }}" class="nav-link"> @lang('cities.add_new_city') </a></li>
						</ul>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-location4"></i> <span>@lang('city_delivery_prices.city_delivery_prices')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('city_delivery_prices.index') }}" class="nav-link"> @lang('city_delivery_prices.show_all_city_delivery_prices') </a></li>
							<li class="nav-item"><a href="{{ route('city_delivery_prices.create') }}" class="nav-link"> @lang('city_delivery_prices.add_new_price') </a></li>
						</ul>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-location3"></i> <span>@lang('governorates.governorates')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('governorates.index') }}" class="nav-link"> @lang('governorates.show_all_governorates') </a></li>
							<li class="nav-item"><a href="{{ route('governorates.create') }}" class="nav-link"> @lang('governorates.add_new_governorate') </a></li>
						</ul>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-store"></i> <span>@lang('markets.markets')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('markets.index') }}" class="nav-link"> @lang('markets.show_all_markets') </a></li>
							<li class="nav-item"><a href="{{ route('markets.create') }}" class="nav-link"> @lang('markets.add_new_market') </a></li>
						</ul>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-car"></i> <span>@lang('trips.trips')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('trips.index') }}" class="nav-link"> @lang('trips.show_all_trips') </a></li>
							<li class="nav-item"><a href="{{ route('trips.create') }}" class="nav-link"> @lang('trips.add_new_trip') </a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /main navigation -->

		</div>
	</div>
	<!-- /sidebar content -->

</div>
		<!-- /main sidebar -->