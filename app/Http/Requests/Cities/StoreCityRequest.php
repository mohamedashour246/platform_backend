<?php

namespace App\Http\Requests\Cities;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
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
            'governorate_id' => 'required',
            'name_ar' => 'required|unique:cities,name_en',
            'name_en' => 'required|unique:cities,name_en',
            'active' => 'nullable' ,
            'price_within_city' => 'required' , 
            'price_outside_city' => 'required', 
        ];
    }
}
