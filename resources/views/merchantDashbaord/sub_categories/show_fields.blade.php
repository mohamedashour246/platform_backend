<!-- Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $subCategory->id }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group col-md-6">
    {!! Form::label('name_ar', __('merchantDashbaord.name_ar')) !!}
    <p>{{ $subCategory->name_ar }}</p>
</div>

<!-- Name En Field -->
<div class="form-group col-md-6">
    {!! Form::label('name_en', __('merchantDashbaord.name_en')) !!}
    <p>{{ $subCategory->name_en }}</p>
</div>

<!-- Merchant Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('merchant_id', __('merchantDashbaord.merchant_id')) !!}
    <p>{{ $subCategory->merchant_id }}</p>
</div>

<!-- Code Field -->
<div class="form-group col-md-6">
    {!! Form::label('code',  __('merchantDashbaord.code'))!!}
    <p>{{ $subCategory->code }}</p>
</div>

<!-- Discount Field -->
<div class="form-group col-md-6">
    {!! Form::label('discount',  __('merchantDashbaord.discount')) !!}
    <p>{{ $subCategory->discount }}</p>
</div>

<!-- Order Field -->
<div class="form-group col-md-6">
    {!! Form::label('order', __('merchantDashbaord.order')) !!}
    <p>{{ $subCategory->order }}</p>
</div>

<!-- Status Field -->
<div class="form-group col-md-6">
    {!! Form::label('status',  __('merchantDashbaord.status')) !!}
    <p>{{ $subCategory->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-md-6">
    {!! Form::label('created_at',  __('merchantDashbaord.created_at')) !!}
    <p>{{ $subCategory->created_at }}</p>
</div>



