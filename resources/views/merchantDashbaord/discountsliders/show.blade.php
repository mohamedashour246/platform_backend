@php
    $lang = session()->get('locale');
@endphp
@extends('merchantDashbaord.layout.master')
@section('title')
    @lang('categories.add_new_category')
@endsection


@section('header')


    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> @lang('merchantDashbaord.product') </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>

                    <a href="{{ route('products.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('merchantDashbaord.product') </a>
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
                <h5 class="card-title"> @lang('merchantDashbaord.product_detail') :  {{$disslider['name_'.$lang]}} </h5>
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
                        <th class="font-weight-bold text-dark">@lang('merchantDashbaord.name_ar')</th>
                        <td class="text-left"> {{ $disslider->name_ar }} </td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.name_en') </th>
                        <td class="text-left">	{{ $disslider->name_en }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark">@lang('merchantDashbaord.expire')</th>
                        <td class="text-left"> {{ $disslider->expire }} </td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.barcode') </th>
                        <td class="text-left">	{{ $disslider->barcode }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.count_use') </th>
                        <td class="text-left">	{{ $disslider->count_use }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.repeatation') </th>
                        <td class="text-left">	{{ $disslider->repeatation }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.discount_type') </th>
                        <td class="text-left">	{{ $disslider->discount_type }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.free_shipping') </th>
                        <td class="text-left">	{{ $disslider->free_shipping }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.value_discount') </th>
                        <td class="text-left">	{{ $disslider->value_discount }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.min_cost') </th>
                        <td class="text-left">	{{ $disslider->min_cost }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.status_slider') </th>
                        <td class="text-left">	{{ $disslider->status_slider }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.current_status') </th>
                        <td class="text-left">	{{ $disslider->current_status }}	</td>
                    </tr>

                    <tr>
                        <td class="font-weight-bold text-dark"> @lang('merchantDashbaord.created_at') </td>
                        <td class="text-left"> {{ $disslider->created_at->toFormattedDateString() }} - {{ $disslider->created_at->diffForHumans() }} </td>
                    </tr>
                    <tr>
                        <td class="font-weight-semibold">  @lang('merchantDashbaord.image') </td>
                        <td class="text-right text-muted">

                            <img class="img-responsive img-thumbnail" width="300" height="300" src="{{ asset('uploads/admins/'.$disslider->image) }}" alt="">
                        </td>
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
