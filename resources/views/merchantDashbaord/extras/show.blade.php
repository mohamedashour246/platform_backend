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
                <h5 class="card-title"> @lang('merchantDashbaord.product_detail') :  {{$exproduct['name_'.$lang]}} </h5>
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
                        <td class="text-left"> {{ $exproduct->name_ar }} </td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.name_en') </th>
                        <td class="text-left">	{{ $exproduct->name_en }}	</td>
                    </tr>

                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.cost') </th>
                        <td class="text-left">	{{ $exproduct->cost }}	</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.count_of_products') </th>
                        <td class="text-left">	{{ $exproduct->count }}	</td>
                    </tr>

                    <tr>
                        <th class="font-weight-bold text-dark"> @lang('merchantDashbaord.status') </th>
                        <td class="text-left">	{{$exproduct->status}}	</td>
                    </tr>



                    <tr>
                        <td class="font-weight-bold text-dark"> @lang('merchantDashbaord.created_at') </td>
                        <td class="text-left"> {{ $exproduct->created_at->toFormattedDateString() }} - {{ $exproduct->created_at->diffForHumans() }} </td>
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
