@php
    $lang = session()->get('locale');
@endphp
@extends('merchantDashbaord.layout.master')
@section('title')
    @lang('merchantDashbaord.add_new_order')
@endsection


@section('header')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> @lang('merchantDashbaord.add_new_order') </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ route('merchants.board') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>  @lang('board.board') </a>

                    <a href="{{ route('orderservices.create') }}" class="breadcrumb-item"><i class="icon-users4 mr-2"></i>  @lang('merchantDashbaord.add_new_order') </a>
                    <span class="breadcrumb-item active"> @lang('merchantDashbaord.add_new_order') </span>
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
                    <h5 class="card-title"> @lang('merchantDashbaord.add_new_order') </h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('orderservices.store') }}" method="POST"  enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        <fieldset>
                            <legend class="font-weight-bold"> <span class="text-primary"> @lang('merchantDashbaord.add_new_order') </span> </legend>
                           <div class="row">
                               <!-- Name Ar Field -->
                               <div class="form-group col-sm-12">
                                 {!! Form::label('type', __('merchantDashbaord.order_type')) !!}
                                 <select class="form-control" name="type">
                                      <option selected> طلب عادى </option>
                                      <option>  طلب مستقبلى </option>
                                 </select>
                                 @error('type')
                                 <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                 @enderror
                               </div>

                               <!-- Name En Field -->
                               <div class="form-group col-sm-6">
                                   {!! Form::label('receiver',  __('merchantDashbaord.receiver_date')) !!}
                                   {!! Form::date('receiver', null, ['class' => 'form-control']) !!}
                                   @error('receiver')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>

                               <!-- Discount Field -->
                               <div class="form-group col-sm-6">
                                   {!! Form::label('time_receiver', __('merchantDashbaord.time'))!!}
                                   {!! Form::time('time_receiver', null, ['class' => 'form-control']) !!}
                                   @error('time_receiver')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>

                               <div class="form-group col-sm-6">
                                   {!! Form::label('sender', __('merchantDashbaord.sender_date'))!!}
                                   {!! Form::date('sender', null, ['class' => 'form-control']) !!}
                                   @error('sender')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                   {!! Form::label('time_sender', __('merchantDashbaord.time'))!!}
                                   {!! Form::time('time_sender', null, ['class' => 'form-control']) !!}
                                   @error('time_sender')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>
                               <div class="form-group col-sm-12">
                                  {!! Form::label('merchant', __('merchantDashbaord.sender')) !!}
                                 <select class="form-control" name="merchant_id">
                                      @foreach($merchants as $merchant)
                                          <option value="{{$merchant->id}}"> {{$merchant->username}}  </option>
                                      @endforeach
                                 </select>
                                 @error('merchant_id')
                                 <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                 @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                   {!! Form::label('price', __('merchantDashbaord.price_order'))!!}
                                   {!! Form::number('price', null, ['class' => 'form-control']) !!}
                                   @error('price')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                 {!! Form::label('payment_type', __('merchantDashbaord.payment_type')) !!}
                                 <select class="form-control" name="payment_type">
                                      <option selected> كاش  </option>
                                      <option> كى نت </option>
                                 </select>
                                 @error('payment_type')
                                 <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                 @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                   {!! Form::label('name_ar', __('merchantDashbaord.order_name_ar'))!!}
                                   {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
                                   @error('name_ar')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                   {!! Form::label('name_en', __('merchantDashbaord.order_name_en'))!!}
                                   {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
                                   @error('name_en')
                                   <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                   @enderror
                               </div>
                               <div class="col-lg-12 col-form-label">
                                   {!! Form::label('order_product', __('merchantDashbaord.order_product'))!!}
                                   <div class="col-lg-9">
                                      <div class="items-container col-12 tBody">
                                        <div class="row">
                                           <input type="number" name="count" placeholder="العدد" class="col-2 form-control m-1">
                                           @error('count')
                                           <label class="text-danger font-weight-bold" > {{ $message }} </label>
                                           @enderror
                                           <input type="text" name="item_ar" placeholder="الاسم بالعربى"  class="col-4 form-control m-1">
                                           @error('item_ar')
                                           <label class="text-danger font-weight-bold" > {{ $message }} </label>
                                           @enderror
                                           <input type="text" name="item_en" placeholder="الاسم بالانجليزى" class="col-4 form-control m-1">
                                           @error('item_en')
                                           <label class="text-danger font-weight-bold" > {{ $message }} </label>
                                           @enderror
                                           <div class="ml-3">
                                               <a href="javascript:void(0);" style="cursor:pointer;margin-top: 5px; margin-left:5px" id="addRow" class="fa fa-plus-circle"> </a>
                                               <a href="javascript:void(0);" style="cursor:pointer;margin-top: 5px;" data-repeater-create class="fa fa-minus-circle deleteRow"> </a>

                                           </div>

                                        </div>
                                      </div>
                                    </div>
                                    @error('order_product')
                                    <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                    @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                  {!! Form::label('receiver', __('merchantDashbaord.receiver')) !!}
                                 <select class="form-control" name="user_id">
                                      @foreach($users as $user)
                                          <option value="{{$user->id}}"> {{$user->name}}  </option>
                                      @endforeach
                                 </select>
                                 @error('user_id')
                                 <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                 @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                  {!! Form::label('driver', __('merchantDashbaord.driver')) !!}
                                 <select class="form-control" name="driver_id">
                                      @foreach($drivers as $driver)
                                          <option value="{{$driver->id}}"> {{$driver->name}}  </option>
                                      @endforeach
                                 </select>
                                 @error('driver_id')
                                 <label class="text-danger font-weight-bold " > {{ $message }} </label>
                                 @enderror
                               </div>


                             </div>

                           </div>

                        </fieldset>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <!-- <a href="{{ route('exproducts.index') }}" class="btn btn-default">Cancel</a> -->
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
            // _componentSwitchery();

         $('#addRow').on('click', function(e){
              e.preventDefault();

              console.log("lllll");
         });

        });

    </script>

@endsection
