<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateAdminRequest extends FormRequest
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
            'name' => 'required|unique:admins,name,'.$id , 
            'username' => 'required|unique:admins,username,'.$id,
            'email' => 'nullable|email|unique:admins,email,'.$id,
            'password' => 'nullable|confirmed|min:8',
            'profile_picture' => 'nullable|image',
            'notes' => 'nullable' , 
            'type' => 'required' , 
            'active' => 'nullable' , 
            'permissions' => 'required_if:type,==,admin',
            'phone' => 'nullable' , 
            'address' => 'nullable' , 
        ];
    }
}
