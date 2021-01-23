@php
    $lang = session()->get('locale');
@endphp
@extends('merchantDashbaord.layout.master')
@section('title')
    @lang('merchantDashbaord.add_new_category')
@endsection


@section('header')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> @lang('customers.customers') </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>
                    <a href="{{ route('merchants.customers.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('customers.customers') </a>
                    <span class="breadcrumb-item active"> @lang('customers.add_new_customer') </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- Account settings -->

            @include('merchantDashbaord.layout.messages')
            <div class="card">
                <div class="card-header bg-dark header-elements-inline">
                    <h5 class="card-title"> @lang('merchantDashbaord.add_new_category') </h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('subCategories.store') }}" method="POST"  enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        <fieldset>
                            <legend class="font-weight-bold"> <span class="text-primary"> @lang('merchantDashbaord.category') </span> </legend>
                                <div class="row">
                                    <!-- Name Ar Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('name_ar',__('merchantDashbaord.name_ar')) !!}
                                        {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
                                        @error('name_ar')
                                        <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                        @enderror
                                    </div>

                                    <!-- Name En Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('name_en', __('merchantDashbaord.name_en'))  !!}
                                        {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
                                        @error('name_en')
                                        <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                        @enderror
                                    </div>

                                    <!-- Merchant Id Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('merchant_id', __('merchantDashbaord.merchant_id'))  !!}
                                        <select class="form-control" name="merchant_id">

                                            @foreach($merchants as $merchant)
                                                <option @isset($merchant) @if(old('merchant_id') == $merchant->id) selected  @endif @endisset value="{{$merchant->id}}">{{$merchant->name}}</option>
                                            @endforeach

                                        </select>
                                        @error('merchant_id')
                                        <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                        @enderror
                                    </div>

                                    <!-- Code Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('code', __('merchantDashbaord.code'))!!}
                                        {!! Form::number('code', null, ['class' => 'form-control']) !!}
                                        @error('code')
                                        <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                        @enderror
                                    </div>

                                    <!-- Discount Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('discount', __('merchantDashbaord.discount'))!!}
                                        {!! Form::number('discount', null, ['class' => 'form-control']) !!}
                                        @error('discount')
                                        <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                        @enderror
                                    </div>

                                    <!-- Order Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('order',__('merchantDashbaord.order')) !!}
                                        {!! Form::number('order', null, ['class' => 'form-control']) !!}
                                        @error('order')
                                        <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                        @enderror
                                    </div>

                                    <!-- Status Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('status',__('merchantDashbaord.status')) !!}
                                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                                        @error('order')
                                        <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                        @enderror
                                    </div>

                                    <!-- Submit Field -->


                                </div>


                        </fieldset>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('subCategories.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>

            </div>
            <!-- /account settings -->
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
