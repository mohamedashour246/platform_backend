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

			@php
			$segment = request()->segment(2);
			$admins = $board = $branches = $customers = $trips =$products=$categories ='';
			switch ($segment) {
				case 'admins':
				case 'admin_types':
				$admins = 'active';
				break;
				case 'drivers':
				case 'push_notifications':
				$drivers = 'active';
				break;
				case 'governorates':
				$governorates = 'active';
				break;
				case 'cities':
				$cities = 'active';
				break;
				case 'branches':
				$branches = 'active';
				break;
				case 'trips':
				$trips = 'active';
				break;
				case 'categories':
				$categories = 'active';
				break;
				case 'products':
				$products = 'active';
				break;
				case 'city_delivery_prices':
				$city_delivery_prices = 'active';
				break;
				case null:
				$board = 'active';
				break;
				default:
				break;
			}
			@endphp

			<!-- User menu -->
			<div class="sidebar-user">
				<div class="card-body">
					<div class="media">
						<div class="mr-3">
							<a href="#"><img src="{{ Storage::disk('s3')->url('merchants/'.Auth::guard('merchant')->user()->image) }}" width="38" height="38" class="rounded-circle" alt=""></a>
						</div>
						<div class="media-body">
							<div class="media-title font-weight-semibold">{{ Auth::guard('merchant')->user()->username }}</div>
							<div class="font-size-xs opacity-50">
								welcome
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
				<ul class="nav nav-sidebar " data-nav-type="accordion">

					<!-- Main -->
					<li class="nav-item-header mt-0 "><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
					<li class="nav-item ">
						<a href="{{ route('merchantDashbaord') }}" class="nav-link slate-800 {{ $board }}">
							<i class="icon-home4"></i>
							<span>
								@lang('board.board')
							</span>
						</a>
					</li>
{{--					<li class="nav-item nav-item-submenu {{ $admins == 'active' ? 'nav-item-open' : '' }}">--}}
{{--						<a href="#" class="nav-link {{ $admins }}"><i class="icon-users4"></i> <span>@lang('admins.admins')</span></a>--}}
{{--						<ul class="nav nav-group-sub" data-submenu-title="">--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.admins.index') }}" class="nav-link"> <i class="icon-users4 mr-1"></i>  @lang('admins.show_all_admins') </a></li>--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.admins.create') }}" class="nav-link"> <i class="icon-user-plus mr-1"></i> @lang('admins.add_new_admin') </a></li>--}}
{{--						</ul>--}}
{{--					</li>--}}
{{--					<li class="nav-item nav-item-submenu {{ $customers == 'active' ? 'nav-item-open' : '' }}">--}}
{{--						<a href="#" class="nav-link {{ $customers }}"><i class="icon-users4"></i> <span>@lang('customers.customers')</span></a>--}}
{{--						<ul class="nav nav-group-sub" data-submenu-title="">--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.customers.index') }}" class="nav-link"> <i class="icon-users4 mr-1"></i>  @lang('customers.show_all_customers') </a></li>--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.customers.create') }}" class="nav-link"> <i class="icon-user-plus mr-1"></i> @lang('customers.add_new_customer') </a></li>--}}
{{--						</ul>--}}
{{--					</li>--}}


{{-- 					<li class="nav-item nav-item-submenu {{ $drivers == 'active' ? 'nav-item-open' : '' }}">
						<a href="#" class="nav-link {{ $drivers }}"><i class="icon-users"></i> <span>@lang('drivers.drivers')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('drivers.index') }}" class="nav-link"> <i class="icon-users mr-1"></i>  @lang('drivers.show_all_drivers') </a></li>
							<li class="nav-item"><a href="{{ route('drivers.create') }}" class="nav-link"> <i class="icon-plus3 mr-1"></i>  @lang('drivers.add_new_driver') </a></li>
							<li class="nav-item"><a href="{{ route('drivers.reports') }}" class="nav-link"> <i class="icon-pie-chart mr-1" ></i> @lang('drivers.reports') </a></li>
							<li class="nav-item"><a href="{{ route('push_notifications.index') }}" class="nav-link"> <i class="icon-mobile2 mr-1" ></i> @lang('push_notifications.push_notifications') </a></li>
						</ul>
					</li> --}}
			{{-- 		<li class="nav-item nav-item-submenu {{ $governorates == 'active' ? 'nav-item-open' : '' }}">
						<a href="#" class="nav-link {{ $governorates }}"><i class="icon-location3"></i> <span>@lang('governorates.governorates')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('governorates.index') }}" class="nav-link">  <i class="icon-location3 mr-1"></i> @lang('governorates.show_all_governorates') </a></li>
							<li class="nav-item"><a href="{{ route('governorates.create') }}" class="nav-link"> <i class="icon-plus3 mr-1"></i> @lang('governorates.add_new_governorate') </a></li>
						</ul>
					</li> --}}
		{{-- 			<li class="nav-item nav-item-submenu {{ $cities == 'active' ? 'nav-item-open' : '' }}">
						<a href="#" class="nav-link {{ $cities }}"><i class="icon-map"></i> <span>@lang('cities.cities')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('cities.index') }}" class="nav-link">  <i class="icon-map mr-1"></i> @lang('cities.show_all_cities') </a></li>
							<li class="nav-item"><a href="{{ route('cities.create') }}" class="nav-link">  <i class="icon-plus3 mr-1"></i> @lang('cities.add_new_city') </a></li>
						</ul>
					</li> --}}
				{{-- 	<li class="nav-item nav-item-submenu {{ $city_delivery_prices == 'active' ? 'nav-item-open' : '' }}">
						<a href="#" class="nav-link {{ $city_delivery_prices }}"><i class="icon-location4"></i> <span>@lang('city_delivery_prices.city_delivery_prices')</span></a>
						<ul class="nav nav-group-sub" data-submenu-title="Layouts">
							<li class="nav-item"><a href="{{ route('city_delivery_prices.index') }}" class="nav-link"><i class="icon-location4  mr-1"></i>  @lang('city_delivery_prices.show_all_city_delivery_prices') </a></li>
							<li class="nav-item"><a href="{{ route('city_delivery_prices.create') }}" class="nav-link"> <i class="icon-plus3 mr-1"></i> @lang('city_delivery_prices.add_new_price') </a></li>
						</ul>
					</li> --}}

{{--					<li class="nav-item nav-item-submenu {{ $branches == 'active' ? 'nav-item-open' : '' }}">--}}
{{--						<a href="#" class="nav-link {{ $branches }}"><i class="icon-store"></i> <span>@lang('branches.branches')</span></a>--}}
{{--						<ul class="nav nav-group-sub" data-submenu-title="Layouts">--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.branches.index') }}" class="nav-link"> <i class="icon-store mr-1"></i> @lang('branches.show_all_branches') </a></li>--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.branches.create') }}" class="nav-link"> <i class="icon-plus3 mr-1"></i> @lang('branches.add_new_branch') </a></li>--}}
{{--						</ul>--}}
{{--					</li>--}}

{{--					<li class="nav-item nav-item-submenu {{ $trips == 'active' ? 'nav-item-open' : '' }}">--}}
{{--						<a href="#" class="nav-link {{ $trips }}"><i class="icon-car"></i> <span>@lang('trips.trips')</span></a>--}}
{{--						<ul class="nav nav-group-sub" data-submenu-title="Layouts">--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.trips.index') }}" class="nav-link">  <i class="icon-car mr-1"></i> @lang('trips.show_all_trips') </a></li>--}}
{{--							<li class="nav-item"><a href="{{ route('merchants.trips.create') }}" class="nav-link"> <i class="icon-plus3 mr-1"></i> @lang('trips.add_new_trip') </a></li>--}}
{{--						</ul>--}}
{{--					</li>--}}
                    <li class="nav-item nav-item-submenu {{ $categories == 'active' ? 'nav-item-open' : '' }}">
                        <a href="#" class="nav-link {{ $categories }}"><i class="icon-car"></i> <span>@lang('merchantDashbaord.categories')</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                            <li class="nav-item"><a href="{{ route('subCategories.index') }}" class="nav-link">  <i class="icon-car mr-1"></i> @lang('merchantDashbaord.show_all_categories') </a></li>
                            <li class="nav-item"><a href="{{ route('subCategories.create') }}" class="nav-link"> <i class="icon-plus3 mr-1"></i> @lang('merchantDashbaord.add_new_category') </a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu {{ $products == 'active' ? 'nav-item-open' : '' }}">
                        <a href="#" class="nav-link {{ $products }}"><i class="icon-car"></i> <span>@lang('merchantDashbaord.products')</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                            <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">  <i class="icon-car mr-1"></i> @lang('merchantDashbaord.show_all_product') </a></li>
                            <li class="nav-item"><a href="{{ route('products.create') }}" class="nav-link"> <i class="icon-plus3 mr-1"></i> @lang('merchantDashbaord.add_new_product') </a></li>
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
