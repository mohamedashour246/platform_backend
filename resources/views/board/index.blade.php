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
	<div class="col-md-12">
		<div class="card card-body">
			<div class="row text-center">
				<div class="col-1">
					<p><i class="icon-store icon-2x d-inline-block text-warning"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $markets_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.markets_count') </span>
				</div>
				<div class="col-1">
					<p><i class="icon-location3 icon-2x d-inline-block text-success"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $governorates_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.governorates_count') </span>
				</div>
				<div class="col-1">
					<p><i class="icon-map icon-2x d-inline-block text-info"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $cities_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.cities_count') </span>
				</div>
				<div class="col-1">
					<p><i class="icon-users4  icon-2x d-inline-block text-warning"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $admins_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.admins_count') </span>
				</div>
				<div class="col-1">
					<p><i class="icon-users  icon-2x d-inline-block text-success"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $drivers_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.drivers_count') </span>
				</div>
				<div class="col-1">
					<p><i class="icon-users4  icon-2x d-inline-block text-warning"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $accountants_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.accountants_count') </span>
				</div>
				<div class="col-1">
					<p><i class="icon-users4  icon-2x d-inline-block text-warning"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $call_center_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.call_center_count') </span>
				</div>
				<div class="col-1">
					<p><i class="icon-car  icon-2x d-inline-block text-warning"></i></p>
					<h5 class="font-weight-semibold mb-0"> {{ $trips_count }} </h5>
					<span class="text-muted font-size-sm"> @lang('board.trips_count') </span>
				</div>


			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-4">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title">احصائيات السائقين</h6>
			</div>
			<div class="card-body">
				<ul class="list-unstyled mb-0">
					<li class="text-center font-size-xl">
						<span class="badge bg-info " style="font-size:40px;"> {{ $drivers_count }} </span>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1">  جاهز  <span class="text-muted ml-auto"> 1 </span></div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-primary" style="width: 100%">
							</div>
						</div>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> غير متوفر  <span class="text-muted ml-auto">0</span> </div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-danger" style="width: 100%">
							</div>
						</div>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> مشغول   <span class="text-muted ml-auto">1</span> </div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-warning" style="width: 100%">
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>



	<div class="col-xl-4">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title">احصائيات الرحلات</h6>
			</div>
			<div class="card-body">
				<ul class="list-unstyled mb-0">
					<li class="text-center font-size-xl">
						<span class="badge bg-info-400 " style="font-size:40px;"> {{ $today_total_trips_count }} </span>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1">  منتهى  <span class="text-muted ml-auto"> 0 </span></div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-success" style="width: 100%">
							</div>
						</div>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1">  ملغى  <span class="text-muted ml-auto">0</span> </div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-danger" style="width: 100%">
							</div>
						</div>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> قيد التنفيذ   <span class="text-muted ml-auto">6</span> </div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-warning" style="width: 100%">
							</div>
						</div>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> قيد التوصيل   <span class="text-muted ml-auto">0</span> </div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-primary" style="width: 100%">
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

	</div>



	<div class="col-xl-4">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title"> الفواتير </h6>
			</div>
			<div class="card-body">
				<ul class="list-unstyled mb-0">
					<li class="text-center font-size-xl">
						<span class="badge bg-info-400 " style="font-size:40px;"> 0 </span>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1">  مقبول  <span class="text-muted ml-auto"> 0 </span></div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-success" style="width: 100%">
							</div>
						</div>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1">  مرفوض  <span class="text-muted ml-auto">0</span> </div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-danger" style="width: 100%">
							</div>
						</div>
					</li>
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> قيد التنفيذ   <span class="text-muted ml-auto">6</span> </div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-warning" style="width: 100%">
							</div>
						</div>
					</li>

				</ul>
			</div>
		</div>

{{-- 		<div class="card">
			<div class="card-header bg-transparent header-elements-inline">
				<span class="card-title font-weight-semibold">  الاحصائيات الماليه </span>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<ul class="list-unstyled mb-0">
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> اجمالى اراد اليوم <span class="text-muted ml-auto">5500 دينار</span></div>
						<div class="progress" style="height: 0.125rem;">
							<div class="progress-bar bg-danger" style="width: 50%">
								<span class="sr-only">50% Complete</span>
							</div>
						</div>
					</li>

					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> اجمالى التوصيل من الكاش <span class="text-muted ml-auto"> 500 دينار </span></div>
						<div class="progress" style="height: 0.125rem;">
							<div class="progress-bar bg-warning-400" style="width: 70%">
								<span class="sr-only">70% Complete</span>
							</div>
						</div>
					</li>

					<li class="mb-3">
						<div class="d-flex align-items-center mb-1">  اجمالى ايراد التوصيل من الكى نت <span class="text-muted ml-auto"> 1000 دينار  </span></div>
						<div class="progress" style="height: 0.125rem;">
							<div class="progress-bar bg-success-400" style="width: 80%">
								<span class="sr-only">80% Complete</span>
							</div>
						</div>
					</li>


					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> اجمالى التوصيل  <span class="text-muted ml-auto"> 1500 دينار  </span></div>
						<div class="progress" style="height: 0.125rem;">
							<div class="progress-bar bg-success-400" style="width: 80%">
								<span class="sr-only">80% Complete</span>
							</div>
						</div>
					</li>


					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"> المستحق دفع للمتجر  <span class="text-muted ml-auto"> 4000 دينار  </span></div>
						<div class="progress" style="height: 0.125rem;">
							<div class="progress-bar bg-success-400" style="width: 80%">
								<span class="sr-only">80% Complete</span>
							</div>
						</div>
					</li>


				</ul>
			</div>
		</div> --}}
	</div>

</div>



<div class="row">

	<div class="col-md-4">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title"> @lang('board.most_deliverd_governorates') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="pie_donut"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title"> @lang('board.most_deliverd_cities') </h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="pie_donut_cities"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title"> @lang('board.markets_are_about_to_be_expired') </h6>

				<div class="header-elements">
					<span class="badge bg-warning"> {{ $markets_about_to_expire->count() }} </span>
				</div>
			</div>

			<div class="card-body">
				<ul class="media-list">
					
					@foreach ($markets_about_to_expire as $market)
					<li class="media">
						<div class="mr-3">
							<img src="{{ Storage::disk('s3')->url('markets/'.$market->logo) }}" class="" width="36" jeight="36" alt="">
						</div>

						<div class="media-body">
							<div class="d-flex justify-content-between">
								<a href="{{ route('markets.show'  , ['market' => $market->id ] ) }}"> {{ $market->name }} </a>
								<span class="font-size-sm text-muted"> {{ $market->expiration_date->diffForHumans() }} </span>
							</div>

						</div>
					</li>
					@endforeach


				</ul>
			</div>
		</div>
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title"> @lang('board.expirated_markets_subscription') </h6>

				<div class="header-elements">
					<span class="badge bg-danger"> {{ $expired_markets_subscription->count() }} </span>
				</div>
			</div>

			<div class="card-body">
				<ul class="media-list">
					
					@foreach ($expired_markets_subscription as $market)
					<li class="media">
						<div class="mr-3">
							<img src="{{ Storage::disk('s3')->url('markets/'.$market->logo) }}" class="" width="36" jeight="36" alt="">
						</div>

						<div class="media-body">
							<div class="d-flex justify-content-between">
								<a href="{{ route('markets.show'  , ['market' => $market->id ] ) }}"> {{ $market->name }} </a>
								<span class="font-size-sm text-muted"> {{ $market->expiration_date->diffForHumans() }} </span>
							</div>

						</div>
					</li>
					@endforeach


				</ul>
			</div>
		</div>
	</div>
	
</div>




@endsection


@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('board_assets/global_assets/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
{{-- <script src="{{ asset('board_assets/global_assets/js/demo_charts/echarts/light/pies/pie_donut.js') }}"></script> --}}
<script src="{{ asset('board_assets/assets/js/app.js') }}"></script>
<script src="{{ asset('board_assets/global_assets/js/demo_charts/echarts/light/pies/pie_basic.js') }}"></script>


<script>
	var EchartsPieDonutDark = function() {


    //
    // Setup module components
    //

    // Basic donut chart
    var _scatterPieDonutDarkExample = function() {
    	if (typeof echarts == 'undefined') {
    		console.warn('Warning - echarts.min.js is not loaded.');
    		return;
    	}

        // Define element
        var pie_donut_element = document.getElementById('pie_donut');
        var pie_donut_cities = document.getElementById('pie_donut_cities');




        //
        // Charts configuration
        //

        if (pie_donut_element) {

            // Initialize chart
            var pie_donut = echarts.init(pie_donut_element);


            //
            // Chart config
            //

            // Options
            pie_donut.setOption({

                // Colors
                color: [
                '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
                ],

                // Global text styles
                textStyle: {
                	fontFamily: 'Cairo, sans-serif',
                	fontSize: 13
                },

                // Add title
                title: {
                	text: 'Browser popularity',
                	subtext: 'Open source information',
                	left: 'center',
                	textStyle: {
                		fontSize: 17,
                		fontWeight: 500,
                		color: '#fff'
                	},
                	subtextStyle: {
                		fontSize: 12,
                		color: '#fff'
                	}
                },

                // Add tooltip
                tooltip: {
                	trigger: 'item',
                	backgroundColor: 'rgba(255,255,255,0.9)',
                	padding: [10, 15],
                	textStyle: {
                		color: '#222',
                		fontSize: 15,
                		fontFamily: 'Roboto, sans-serif' , 
                		fontWeight : 'bold'  , 
                	},
                	formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add series
                series: [{
                	name: "@lang('governorates.governorate')",
                	type: 'pie',
                	radius: ['50%', '70%'],
                	center: ['50%', '57.5%'],
                	itemStyle: {
                		normal: {
                			borderWidth: 2,
                			borderColor: '#353f53'
                		}
                	},
                	data: [
                	{value: 335, name: 'الفراونيه'},
                	{value: 310, name: 'حولى'},
                	{value: 234, name: 'الجهرابء'},
                	{value: 135, name: 'كبد'},
                	{value: 1548, name: 'صباح الاحمد'}
                	]
                }]
            });
        }
        if (pie_donut_cities) {

            // Initialize chart
            var pie_donut = echarts.init(pie_donut_cities);


            //
            // Chart config
            //

            // Options
            pie_donut.setOption({

                // Colors
                color: [

                '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
                ],

                // Global text styles
                textStyle: {
                	fontFamily: 'Cairo, sans-serif',
                	fontSize: 13
                },



                // Add tooltip
                tooltip: {
                	trigger: 'item',
                	backgroundColor: 'rgba(255,255,255,0.9)',
                	padding: [10, 15],
                	textStyle: {
                		color: '#222',
                		fontSize: 15,
                		fontFamily: 'Roboto, sans-serif' , 
                		fontWeight : 'bold'  , 
                	},
                	formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add series
                series: [{
                	name: "@lang('cities.city')",
                	type: 'pie',
                	radius: ['50%', '70%'],
                	center: ['50%', '57.5%'],
                	itemStyle: {
                		normal: {
                			borderWidth: 2,
                			borderColor: '#353f53'
                		}
                	},
                	data: [
                	{value: 335, name: 'المنصوره'},
                	{value: 310, name: 'حولى'},
                	{value: 234, name: 'شهاااب'},
                	{value: 135, name: 'كبد'},
                	{value: 1548, name: 'جلاء '}
                	]
                }]
            });
        }


        //
        // Resize charts
        //

        // Resize function
        var triggerChartResize = function() {
        	pie_donut_element && pie_donut.resize();
        };

        // On sidebar width change
        var sidebarToggle = document.querySelector('.sidebar-control');
        sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

        // On window resize
        var resizeCharts;
        window.addEventListener('resize', function() {
        	clearTimeout(resizeCharts);
        	resizeCharts = setTimeout(function () {
        		triggerChartResize();
        	}, 200);
        });
    };


    //
    // Return objects assigned to module
    //

    return {
    	init: function() {
    		_scatterPieDonutDarkExample();
    	}
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
	EchartsPieDonutDark.init();
});

</script>

@endsection