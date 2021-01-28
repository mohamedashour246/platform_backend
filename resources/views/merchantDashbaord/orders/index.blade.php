@php
    $lang = session()->get('locale');
@endphp
@extends('merchantDashbaord.layout.master')
@section('title')
    @lang('site.show_all_orders')
@endsection


@section('header')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> @lang('merchantDashbaord.order') </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>

                    <span class="breadcrumb-item active"> @lang('merchantDashbaord.order') </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('merchantDashbaord.layout.partials._session')


    <div class="row">
        <div class="col-md-12">
            @include('merchants.layout.messages')
{{--            <div class="row">--}}
{{--                <div class="col-md-12 mb-3">--}}
{{--                    <a  href="#" class="btn btn-primary float-right" > <i class="icon-plus3  mr-1"></i>@lang('merchantDashbaord.add_new_order') </a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="card" >


                <table class="table datatable-responsive table-togglable table-bordered text-center   table-hover ">
                    <thead class="bg-dark">
                    <tr>
                        <th>#</th>

                        <th> @lang('merchantDashbaord.merchant') </th>
                        <th> @lang('merchantDashbaord.client_name') </th>
                        <th> @lang('merchantDashbaord.total_price') </th>
                        <th> @lang('merchantDashbaord.discount') </th>
                        <th> @lang('merchantDashbaord.status') </th>
                        <th> @lang('merchantDashbaord.created_at') </th>
                        <th> @lang('merchantDashbaord.actions') </th>
                    </tr>
                    </thead>
                    @php
                        $i =1 ;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>{{ auth()->guard('merchant')->user()->name }}</td>
                            <td>{{$order->owner->name}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->discount}}</td>
                            <td>{{$order->currentStatus()}}</td>
                            <td >{{ $order->created_at->toFormattedDateString() }} - {{ $order->created_at->diffForHumans() }} </td>
                            <td >
                                <div class="float-left">
                                    <a target="_blank" href="{{ route('orders.show'  , [$order->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
                                        <i class="icon-eye2 text-primary-800"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>

                        @endforeach

                        </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection


@section('styles')


@endsection

@section('scripts')

    <script src="{{ asset('board_assets/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/demo_pages/content_cards_header.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/plugins/extensions/jquery_ui/touch.min.js') }}"></script>
    <script src="{{ asset('board_assets/global_assets/js/demo_pages/components_collapsible.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(function() {
            $('a.delete_branch').on('click', function(event) {
                event.preventDefault();
                id = $(this).data('id');
                console.log(id);
                Swal.fire({

                    text: "هل انت متاكد من رغبتك فى حذف الفرع",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم',
                    cancelButtonText: 'لا'
                }).then((result) => {
                    if (result.isConfirmed) {

                        name = "deleteFormNumber" + id;
                        $('form[name="'+ name +'"]').submit();

                    }
                })
            });
        });
    </script>
@endsection
