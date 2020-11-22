<?php

namespace App\Http\Requests\Governorates;

use Illuminate\Foundation\Http\FormRequest;

class StoreGovernorateRequest extends FormRequest
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
            'name_en' => 'required|unique:governorates,name_en' , 
            'name_ar' => 'required|unique:governorates,name_ar' , 
            'country_id' => 'required' , 
            'active' => 'nullable' , 
        ];
    }
}
