@php
    $lang = session()->get('locale');
@endphp
@extends('merchantDashbaord.layout.master')
@section('title')
    @lang('merchantDashbaord.orders_show')
@endsection


@section('header')


    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> @lang('merchantDashbaord.orders') </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>

                    <a href="{{ route('orderservices.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('merchantDashbaord.order') </a>
                    <span class="breadcrumb-item active"> @lang('merchantDashbaord.show') </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')


    <div class="col-md-12">
        <!-- Account settings -->
        <div class="card">
            <div class="card-header bg-dark header-elements-inline">
                <h5 class="card-title"> @lang('merchantDashbaord.single_order') </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table  table-xs border-top-0 my-2">
                    <tbody>
                    <tr>
                        <th class="font-weight-bold text-dark">@lang('merchantDashbaord.type')</th>
                        <td class="text-left"> {{ $orderservice->type }} </td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.receiver_date') </th>
                        <td class="text-left">	{{ }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark">@lang('merchantDashbaord.')</th>
                        <td class="text-left"> {{ $order->total .' ' }} @lang('merchantDashbaord.time_receiver') </td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.sender_date') </th>
                        <td class="text-left">	{{ $order->duration }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.time_sender') </th>
                        <td class="text-left">	{{ $order->orderPayment() }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.merchant') </th>
                        <td class="text-left">	{{ $order->delivery_fees .' ' }} @lang('merchantDashbaord.KWD')	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.price') </th>
                        <td class="text-left">	{{ $order->time_to_arrive }}</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.payment_type') </th>
                        <td class="text-left">	{{ $order->city->name_ar }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.order_name_ar') </th>
                        <td class="text-left">	{{ $order->discount }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.order_name_en') </th>
                        <td class="text-left">	{{$order->currentStatus()}}	</td>
                    </tr>



                    <!-- <tr>
                        <td class="font-weight-bold text-dark"> @lang('merchantDashbaord.products') </td>
                        <td class="text-left">
                            <div class="card" >


                                <table class="table datatable-responsive table-togglable table-bordered text-center   table-hover ">
                                    <thead class="bg-dark">
                                    <tr>
                                        <th>#</th>

                                        <th> @lang('merchantDashbaord.image') </th>
                                        <th> @lang('merchantDashbaord.name_ar') </th>
                                        <th> @lang('merchantDashbaord.name_en') </th>
                                        <th> @lang('merchantDashbaord.Extras') </th>

                                    </tr>
                                    </thead>
                                    @php
                                        $i =1 ;
                                    @endphp

                                    @foreach ($order->order_products as $order_product)
                                        <tr>
                                            <td >
                                                <a href="#collapse-icon{{ $order_product->product->id }}" class="text-default" data-toggle="collapse">
                                                    <i class="icon-circle-down2"></i>
                                                </a>

                                            </td>
                                            <td> <img class="img-thumbnail" width="50" height="50" src=" {{ $order_product->product->image_path}}" /></td>

                                            {{--                            <td  > <a href="{{ route('merchants.branches.show', ['branch' => $product->id])}}"> {{ $product->name }} </a> </td>--}}
                                            <td>{{$order_product->product->name_ar}}</td>
                                            <td>{{$order_product->product->name_en}}</td>
                                            <td>
                                               @forelse($extras->where('product_id',$order_product->product->id) as $extra)
                                                <table style="width:100%">
                                                    <tr>
                                                        <th>{{ $extra->product_data->$name }}</th>
                                                    </tr>
                                                </table>
                                                @empty
                                                @lang('merchantDashbaord.NoDataFound')
                                                @endforelse
                                            </td>
                                        </tr>
                                        <tr class="collapse " id="collapse-icon{{ $order_product->product->id }}" >
                                            <td colspan="100%" >
                                                <div class="float-left">
                                                    <a target="_blank" href="{{ route('products.show'  , [$order_product->product->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
                                                        <i class="icon-eye2 text-primary-800"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach

                                        </tbody>
                                </table>
                            </div>
                        </td>
                    </tr> -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('styles')

@endsection

@section('scripts')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBuQymvDTcNgdRWQN0RhT2YxsJeyh8Bys4&amp;libraries=places"></script>

    <script src="{{ asset('board_assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('board_assets/global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/typeahead_addresspicker.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/autocomplete_addresspicker.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/pickers/location/location.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/ui/prism.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('board_assets/global_assets/js/demo_pages/picker_location.js') }}"></script> --}}


@endsection
