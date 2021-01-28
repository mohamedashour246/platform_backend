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
                        <p><i class="icon-accessibility icon-2x d-inline-block text-success"></i></p>
                        <h5 class="font-weight-semibold mb-0"> {{$products->count()}} </h5>
                        <span class="text-muted font-size-sm"> @lang('merchantDashbaord.products')  </span>
                    </div>
                    <div class="col-1">
                        <p><i class="icon-cart icon-2x d-inline-block text-info"></i></p>
                        <h5 class="font-weight-semibold mb-0">{{$orders->count()}}</h5>
                        <span class="text-muted font-size-sm"> @lang('merchantDashbaord.orders')  </span>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-xl-4">

        <div class="card " >
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
        </div>
        <div class="col-xl-4">

        <div class="card">
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
        <div class="col-xl-4">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title"> @lang('merchantDashbaord.last_orders') </h6>

                <div class="header-elements">
{{--                    <span class="badge bg-danger"> {{ $expired_markets_subscription->count() }} </span>--}}
                </div>
            </div>

            <div class="card-body">
                <ul class="media-list">

                    @foreach ($orders->take(4) as $order)
                        <li class="media">



                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('orders.show'  , $order->id  ) }}"> {{@$order->owner->name }} </a>

                                    <span class="font-size-sm text-muted"> {{ @$order->total.' $' }} </span>
                                    <span class="font-size-sm text-muted"> {{ @ $order->created_at->diffForHumans() }} </span>
                                </div>

                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
        </div>
    </div>


</div>

@endsection


@section('styles')

@endsection

@section('scripts')

@endsection
