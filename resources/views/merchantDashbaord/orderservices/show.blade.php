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

                    <a href="{{ route('orderservices.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('merchantDashbaord.orders') </a>
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
                          <td class="text-left">	{{ $orderservice->receiver }}	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark">@lang('merchantDashbaord.time')</th>
                          <td class="text-left"> {{ $orderservice->time_receiver }} </td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.sender_date') </th>
                          <td class="text-left">	{{ $orderservice->sender }}	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.time') </th>
                          <td class="text-left">	{{$orderservice->time_sender }}	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.merchant') </th>
                          <td class="text-left">	{{$orderservice->merchant->username }} 	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.price') </th>
                          <td class="text-left">	{{ $orderservice->price }}</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.payment_type') </th>
                          <td class="text-left">	{{ $orderservice->payment_type }}	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.order_name_ar') </th>
                          <td class="text-left">	{{ $orderservice->name_ar }}	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.order_name_en') </th>
                          <td class="text-left">	{{$orderservice->name_en}}	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.receiver') </th>
                          <td class="text-left">	{{$orderservice->user->name}}	</td>
                      </tr>
                      <tr>
                          <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.driver') </th>
                          <td class="text-left">	{{$orderservice->driver->name}}	</td>
                      </tr>

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
