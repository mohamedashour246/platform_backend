@php
    $lang = session()->get('locale');
@endphp
@extends('merchantDashbaord.layout.master')
@section('title')
    @lang('site.show_all_product')
@endsection


@section('header')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> @lang('merchantDashbaord.additions') </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>

                    <span class="breadcrumb-item active"> @lang('merchantDashbaord.additions') </span>
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
            <div class="row">
                <div class="col-md-12 mb-3">
                    <a  href="{{ route('exproducts.create') }}" class="btn btn-primary float-right" > <i class="icon-plus3  mr-1"></i>@lang('merchantDashbaord.add_data') </a>
                </div>
            </div>
            <div class="card" >


                <table class="table datatable-responsive table-togglable table-bordered text-center   table-hover ">
                    <thead class="bg-dark">
                    <tr>
                        <th>#</th>

                        <th> @lang('merchantDashbaord.name_ar') </th>
                        <th> @lang('merchantDashbaord.name_en') </th>
                        <th> @lang('merchantDashbaord.cost') </th>
                        <th> @lang('merchantDashbaord.count_of_products') </th>
                        <th> @lang('merchantDashbaord.status') </th>
                        <th> @lang('merchantDashbaord.created_at') </th>
                        {{--                        <th> @lang('branches.action') </th>--}}
                    </tr>
                    </thead>
                    @php
                        $i =1 ;
                    @endphp
                    @foreach ($exproducts as $exproduct)
                        <tr>
                            <td >
                                <a href="#collapse-icon{{ $exproduct->id }}" class="text-default" data-toggle="collapse">
                                    <i class="icon-circle-down2"></i>
                                </a>

                            </td>


                            {{--                            <td  > <a href="{{ route('merchants.branches.show', ['branch' => $exproduct->id])}}"> {{ $exproduct->name }} </a> </td>--}}
                            <td>{{$exproduct->name_ar}}</td>
                            <td>{{$exproduct->name_en}}</td>
                            <td>{{$exproduct->cost}}</td>
                            <td>{{$exproduct->count}}</td>
                            <td>{{$exproduct->status}}</td>
                            <td >{{ $exproduct->created_at->toFormattedDateString() }} - {{ $exproduct->created_at->diffForHumans() }} </td>

                        </tr>
                        <tr class="collapse " id="collapse-icon{{ $exproduct->id }}" >
                            <td colspan="100%" >
                                <div class="float-left">
                                    <a  href="{{ route('exproducts.show'  , [$exproduct->id ] ) }}" class="btn btn-outline bg-primary border-primary text-primary-800 btn-icon">
                                        <i class="icon-eye2 text-primary-800"></i>
                                    </a>
                                    <a  href="{{ route('exproducts.edit' , [ $exproduct->id ] ) }}" class="btn alpha-warning border-warning text-warning-800 btn-icon ml-2">
                                        <i class="icon-pencil7 text-warning-800"></i>
                                    </a>
                                    <a href="" data-id="{{ $exproduct->id }}" class=" delete_branch btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 ml-2"><i class="icon-trash"></i>  </a>

                                    <form name="deleteFormNumber{{ $exproduct->id }}" action="{{ route('exproducts.destroy' , [$exproduct->id ]) }}" method="POST" >

                                        @method('DELETE')
                                        @csrf
                                    </form>
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

                    text: "???? ?????? ?????????? ???? ??????????",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '??????',
                    cancelButtonText: '????'
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
