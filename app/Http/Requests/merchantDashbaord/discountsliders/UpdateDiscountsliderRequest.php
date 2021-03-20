<?php

namespace App\Http\Requests\merchantDashbaord\discountsliders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountsliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'nullable|image',
            'expire' => 'required',
            'barcode' => 'required',
            'count_use' => 'required',
            'value_discount' => 'required',
            'min_cost' => 'required',
        ];
    }
}
