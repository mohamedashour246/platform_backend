<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'username' => 'required|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'password' => 'required|confirmed|min:8',
            'profile_picture' => 'nullable|image',
            'notes' => 'nullable' , 
            'type' => 'required' , 
            'active' => 'nullable' , 
            'permissions' => 'required_if:type,==,admin',
        ];
    }
}
