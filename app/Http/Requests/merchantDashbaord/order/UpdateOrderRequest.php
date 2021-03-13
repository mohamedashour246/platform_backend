<?php

namespace App\Http\Requests\merchantDashbaord\order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            
            'barcode' =>'required',
            'time_to_arrive' =>'required',
            'payment_type' =>'required',
            'total' =>'required',
        ];
    }
}
