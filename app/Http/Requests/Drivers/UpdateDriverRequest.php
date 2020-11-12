<?php

namespace App\Http\Requests\Drivers;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateDriverRequest extends FormRequest
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
        $id = Request::segment(3);
        return [
            'username' => 'required|unique:drivers,username,'.$id,
            'driver_name' => 'required',
            'phone' => 'required|unique:drivers,phone,'.$id,
            'password' => 'nullable|min:8|confirmed',
            'code' => 'required|unique:drivers,code,'.$id,
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
