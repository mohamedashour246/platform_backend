@php
    $lang = session()->get('locale');
@endphp
@extends('merchantDashbaord.layout.master')
@section('title')
    @lang('merchantDashbaord.add_data')
@endsection


@section('header')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> @lang('merchantDashbaord.add_data') </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>

                    <a href="{{ route('exproducts.index') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('merchantDashbaord.add_data') </a>
                    <span class="breadcrumb-item active"> @lang('merchantDashbaord.add_data') </span>
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
                    <h5 class="card-title"> @lang('merchantDashbaord.add_data') </h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('exproducts.store') }}" method="POST"  enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        <fieldset>
                            <legend class="font-weight-bold"> <span class="text-primary"> @lang('merchantDashbaord.add_data') </span> </legend>
                           <div class="row">
                               <!-- Name Ar Field -->
                               <div class="form-group col-sm-6">
                                   {!! Form::label('name_ar', __('merchantDashbaord.name_ar')) !!}
                                   {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
                                   @error('name_ar')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>

                               <!-- Name En Field -->
                               <div class="form-group col-sm-6">
                                   {!! Form::label('name_en',  __('merchantDashbaord.name_en')) !!}
                                   {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
                                   @error('name_en')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>

                               <!-- Discount Field -->
                               <div class="form-group col-sm-4">
                                   {!! Form::label('cost', __('merchantDashbaord.cost'))!!}
                                   {!! Form::number('cost', null, ['class' => 'form-control']) !!}
                                   @error('cost')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>
                               <div class="form-group col-sm-4">
                                   {!! Form::label('count', __('merchantDashbaord.count_of_products')) !!}
                                   {!! Form::number('count',null,['class' => 'form-control']) !!}
                                   @error('count')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>
                               <div class="col-md-4">
                                   <div class="form-check form-check-switchery mt-4">
                                       <label class="form-check-label">
                                           @lang('merchantDashbaord.status')
                                           <input type="checkbox" name="status" class="form-check-input-switchery "  checked  >
                                       </label>
                                   </div>
                               </div>

                           </div>

                        </fieldset>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('exproducts.index') }}" class="btn btn-default">Cancel</a>
                    </div>


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

    <script>
        $(function() {
            // $("#firstname").attr("disabled", "disabled");


            // image preview
            $(".image").change(function () {

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.image-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }

            });
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });

            $('.form-input-styled').uniform({
                fileButtonClass: 'action btn bg-primary'
            });


            var _componentSwitchery = function() {
                if (typeof Switchery == 'undefined') {
                    console.warn('Warning - switchery.min.js is not loaded.');
                    return;
                }


                var elems = Array.prototype.slice.call(document.querySelectorAll('.form-check-input-switchery'));
                elems.forEach(function(html) {
                    var switchery = new Switchery(html);
                });

                var primary = document.querySelector('.form-check-input-switchery-primary');
                var switchery = new Switchery(primary, { color: '#2196F3' });
            };
            // Bootstrap switch
            var _componentBootstrapSwitch = function() {
                if (!$().bootstrapSwitch) {
                    console.warn('Warning - switch.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.form-check-input-switch').bootstrapSwitch();
            };
            _componentSwitchery();



        });
    </script>
@endsection
