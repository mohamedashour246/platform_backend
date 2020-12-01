<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
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
            'market_id' => 'required' , 
            'branch_id' => 'required' , 
            'order_price' => 'nullable' , 
            'driver_id' => 'nullable' , 
            'collect_the_amount' => 'nullable' , 
            'payment_method_id' => 'required' , 
            'governorate'=> 'required' , 
            'city'=> 'required' , 
            'building_type' => 'nullable' , 
            'street_name' => 'nullable' , 
            'phone2' => 'nullable' , 
            'phone1'=> 'required' , 
            'customer_name' => 'required'  , 
            'avenue_number' => 'nullable' , 
            'building_number'=> 'nullable' , 
            'floor_number' => 'nullable', 
            'place_number' => 'nullable',
            'notes' => 'nullable' , 
            'delivery_date_to_customer' => 'required' , 
            'receipt_date_from_market' => 'required' , 
        ];
    }
}
