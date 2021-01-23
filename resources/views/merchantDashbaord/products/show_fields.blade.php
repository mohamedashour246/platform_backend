<!-- Id Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $product->id }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('name_ar', __('merchantDashbaord.name_ar')) !!}
    <p>{{ $product->name_ar }}</p>
</div>

<!-- Name En Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('name_en', __('merchantDashbaord.name_ar'))!!}
    <p>{{ $product->name_en }}</p>
</div>

<!-- Description Ar Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('description_ar', __('merchantDashbaord.description_ar')) !!}
    <p>{{ $product->description_ar }}</p>
</div>

<!-- Description En Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('description_en', __('merchantDashbaord.description_ar')) !!}
    <p>{{ $product->description_en }}</p>
</div>

<!-- Sub Category Id Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('sub_category_id', __('merchantDashbaord.category')) !!}
    <p>{{ $product->sub_category_id }}</p>
</div>

<!-- Order Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('order', 'Order:') !!}
    <p>{{ $product->order }}</p>
</div>

<!-- Status Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('status', __('merchantDashbaord.status')) !!}
    <p>{{ $product->status }}</p>
</div>

<!-- Type Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('type',__('merchantDashbaord.type')) !!}
    <p>{{ $product->type }}</p>
</div>

<!-- Deliver Services Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('deliver_services', __('merchantDashbaord.deliver_services')) !!}
    <p>{{ $product->deliver_services }}</p>
</div>

<!-- Unit Type Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('unit_type', __('merchantDashbaord.unit_type'))  !!}
    <p>{{ $product->unit_type }}</p>
</div>

<!-- Price Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('price', __('merchantDashbaord.price')) !!}
    <p>{{ $product->price }}</p>
</div>

<!-- Discount Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('discount', __('merchantDashbaord.discount')) !!}
    <p>{{ $product->discount }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('created_at', __('merchantDashbaord.created_at')) !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

