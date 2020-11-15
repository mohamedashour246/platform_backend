<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarketRequest extends FormRequest
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
            'market_name' => 'required',
            'address' => 'required' , 
            'phones' => 'required' , 
            'logo' => 'nullable|image' , 
            'notes' => 'nullable' , 
            'active' => 'required',
            'username' => 'required|unique:merchants,username',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required',
            'email' => 'required',
        ];
    }
}
