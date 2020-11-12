<?php

namespace App\Http\Requests\Drivers;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'username' => 'required|unique:drivers,username',
            'driver_name' => 'required',
            'phone' => 'required|unique:drivers,phone',
            'password' => 'required|min:8|confirmed',
            'code' => 'required|unique:drivers,code',
            'image' => 'nullable|image',
            'notes' => 'nullable',
            'car_number' => 'required' , 
            'bounce' => 'nullable|numeric' , 
            'working_start_time' => 'required',
            'working_end_time' => 'required' , 
            'active' => 'nullable',
            'available' => 'nullable',
            'country_id' => 'required',
        ];
    }
}
