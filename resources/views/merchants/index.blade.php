@extends('merchants.layout.master')

@section('title')
@lang('board.home')
@endsection
@php
    $lang = session()->get('locale');
@endphp

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
        <div class="col-md-12">
            <div class="card card-body">
                <div class="row text-center">
                    <div class="col-1">
                        <p><i class="icon-store icon-2x d-inline-block text-warning"></i></p>
                        <h5 class="font-weight-semibold mb-0"> {{$categories->count()}} </h5>
                        <span class="text-muted font-size-sm"> @lang('merchantDashbaord.categories')  </span>
                    </div>
                    <div class="col-1">
                        <p><i class="icon-location3 icon-2x d-inline-block text-success"></i></p>
                        <h5 class="font-weight-semibold mb-0"> {{$products->count()}} </h5>
                        <span class="text-muted font-size-sm"> @lang('merchantDashbaord.products')  </span>
                    </div>
                    <div class="col-1">
                        <p><i class="icon-car icon-2x d-inline-block text-info"></i></p>
                        <h5 class="font-weight-semibold mb-0">{{$orders->count()}}</h5>
                        <span class="text-muted font-size-sm"> @lang('merchantDashbaord.orders')  </span>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="card col-4">
            <div class="card-header header-elements-inline">
                <h6 class="card-title"> @lang('merchantDashbaord.last_categories') </h6>

                <div class="header-elements">
{{--                    <span class="badge bg-danger"> {{ $expired_markets_subscription->count() }} </span>--}}
                </div>
            </div>

            <div class="card-body">
                <ul class="media-list">

                    @foreach ($categories->take(4) as $category)
                        <li class="media">


                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('subCategories.show'  , $category->id  ) }}"> {{ $category['name_'.$lang] }} </a>
                                    <span class="font-size-sm text-muted"> {{ $category->created_at->diffForHumans() }} </span>
                                </div>

                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    <div class="card col-4">
            <div class="card-header header-elements-inline">
                <h6 class="card-title"> @lang('merchantDashbaord.last_products') </h6>

                <div class="header-elements">
{{--                    <span class="badge bg-danger"> {{ $expired_markets_subscription->count() }} </span>--}}
                </div>
            </div>

            <div class="card-body">
                <ul class="media-list">

                    @foreach ($products->take(4) as $product)
                        <li class="media">

                            <div class="mr-3">
                                <img src="{{ $product->image_path }}" class="" width="36" jeight="36" alt="">
                            </div>

                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('products.show'  , $product->id  ) }}"> {{ $product['name_'.$lang] }} </a>
                                    <span class="font-size-sm text-muted"> {{ $product->created_at->diffForHumans() }} </span>
                                </div>

                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>

    </div>

    {{--	<div class="row">--}}



{{-- 		<div class="col-xl-3">--}}
{{--			<div class="card">--}}
{{--				<div class="card-header bg-transparent header-elements-inline">--}}
{{--					<span class="card-title font-weight-semibold"> احصائيات السائقين </span>--}}
{{--					<div class="header-elements">--}}
{{--						<div class="list-icons">--}}
{{--							<a class="list-icons-item" data-action="collapse"></a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}

{{--				<div class="card-body">--}}
{{--					<ul class="list-unstyled mb-0">--}}
{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> اجمالى السائقين <span class="text-muted ml-auto">--}}
{{--								{{ App\Models\Driver::count() }} سائق--}}
{{--							</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-primary" style="width: 50%">--}}
{{--									<span class="sr-only">50% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> جاهز للعمل <span class="text-muted ml-auto">--}}
{{--								1--}}
{{--							</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-success" style="width: 50%">--}}
{{--									<span class="sr-only">50% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1">مشغول <span class="text-muted ml-auto">--}}
{{--								1--}}
{{--							</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-warning" style="width: 50%">--}}
{{--									<span class="sr-only">50% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> غير متاح  <span class="text-muted ml-auto">--}}
{{--								1--}}
{{--							</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-danger" style="width: 50%">--}}
{{--									<span class="sr-only">50% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}





{{--					</ul>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}



{{--		<div class="col-xl-3">--}}
{{--			<div class="card">--}}
{{--				<div class="card-header bg-transparent header-elements-inline">--}}
{{--					<span class="card-title font-weight-semibold"> احصائيات الرحلات</span>--}}
{{--					<div class="header-elements">--}}
{{--						<div class="list-icons">--}}
{{--							<a class="list-icons-item" data-action="collapse"></a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}

{{--				<div class="card-body">--}}
{{--					<ul class="list-unstyled mb-0">--}}
{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> اجمالى رحلات اليوم <span class="text-muted ml-auto">--}}
{{--								50--}}
{{--							</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-primary" style="width: 50%">--}}
{{--									<span class="sr-only">50% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> الرحلات التى تم توصيلها <span class="text-muted ml-auto">22</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-success-400" style="width: 80%">--}}
{{--									<span class="sr-only">80% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> الرحلات قيد التنفيذ <span class="text-muted ml-auto">10</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-warning" style="width: 70%">--}}
{{--									<span class="sr-only">70% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}

{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> الرحلات قيد التوصيل <span class="text-muted ml-auto">22</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-success-400" style="width: 80%">--}}
{{--									<span class="sr-only">80% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}

{{--						<li>--}}
{{--							<div class="d-flex align-items-center mb-1"> الرحلات الملغيه <span class="text-muted ml-auto">--}}
{{--								2--}}
{{--							</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-grey-400" style="width: 60%">--}}
{{--									<span class="sr-only">60% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}
{{--					</ul>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}



{{--		<div class="col-xl-3">--}}
{{--			<div class="card">--}}
{{--				<div class="card-header bg-transparent header-elements-inline">--}}
{{--					<span class="card-title font-weight-semibold">  الاحصائيات الماليه </span>--}}
{{--					<div class="header-elements">--}}
{{--						<div class="list-icons">--}}
{{--							<a class="list-icons-item" data-action="collapse"></a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}

{{--				<div class="card-body">--}}
{{--					<ul class="list-unstyled mb-0">--}}
{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> اجمالى اراد اليوم <span class="text-muted ml-auto">5500 دينار</span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-danger" style="width: 50%">--}}
{{--									<span class="sr-only">50% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}

{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> اجمالى التوصيل من الكاش <span class="text-muted ml-auto"> 500 دينار </span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-warning-400" style="width: 70%">--}}
{{--									<span class="sr-only">70% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}

{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1">  اجمالى ايراد التوصيل من الكى نت <span class="text-muted ml-auto"> 1000 دينار  </span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-success-400" style="width: 80%">--}}
{{--									<span class="sr-only">80% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> اجمالى التوصيل  <span class="text-muted ml-auto"> 1500 دينار  </span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-success-400" style="width: 80%">--}}
{{--									<span class="sr-only">80% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--						<li class="mb-3">--}}
{{--							<div class="d-flex align-items-center mb-1"> المستحق دفع للمتجر  <span class="text-muted ml-auto"> 4000 دينار  </span></div>--}}
{{--							<div class="progress" style="height: 0.125rem;">--}}
{{--								<div class="progress-bar bg-success-400" style="width: 80%">--}}
{{--									<span class="sr-only">80% Complete</span>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</li>--}}


{{--					</ul>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{-- --}}

{{--		<div class="col-sm-6 col-xl-3">--}}
{{--			<div class="card card-body">--}}
{{--				<div class="media">--}}
{{--					<div class="mr-3 align-self-center">--}}
{{--						<i class="icon-pointer icon-3x text-success-400"></i>--}}
{{--					</div>--}}

{{--					<div class="media-body text-right">--}}
{{--						<h3 class="font-weight-semibold mb-0">120</h3>--}}
{{--						<span class="text-uppercase font-size-sm text-muted"> طلب توصيل </span>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}

{{--		<div class="col-sm-6 col-xl-3">--}}
{{--			<div class="card card-body">--}}
{{--				<div class="media">--}}
{{--					<div class="mr-3 align-self-center">--}}
{{--						<i class="icon-enter6 icon-3x text-indigo-400"></i>--}}
{{--					</div>--}}

{{--					<div class="media-body text-right">--}}
{{--						<h3 class="font-weight-semibold mb-0">5</h3>--}}
{{--						<span class="text-uppercase font-size-sm text-muted"> مشرفين </span>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}

{{--		<div class="col-sm-6 col-xl-3">--}}
{{--			<div class="card card-body">--}}
{{--				<div class="media">--}}
{{--					<div class="media-body">--}}
{{--						<h3 class="font-weight-semibold mb-0">3</h3>--}}
{{--						<span class="text-uppercase font-size-sm text-muted">   فروع </span>--}}
{{--					</div>--}}

{{--					<div class="ml-3 align-self-center">--}}
{{--						<i class="icon-bubbles4 icon-3x text-blue-400"></i>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}

{{--		<div class="col-sm-6 col-xl-3">--}}
{{--			<div class="card card-body">--}}
{{--				<div class="media">--}}
{{--					<div class="media-body">--}}
{{--						<h3 class="font-weight-semibold mb-0">500 ريال </h3>--}}
{{--						<span class="text-uppercase font-size-sm text-muted"> المبلغ المتوفر لك </span>--}}
{{--					</div>--}}

{{--					<div class="ml-3 align-self-center">--}}
{{--						<i class="icon-bag icon-3x text-danger-400"></i>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}

</div>

@endsection


@section('styles')

@endsection

@section('scripts')

@endsection
