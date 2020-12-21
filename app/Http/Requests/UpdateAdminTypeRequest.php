<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateAdminTypeRequest extends FormRequest
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
            'name_en' => 'required|unique:admin_types,name_en,'.$id , 
            'name_ar' => 'required|unique:admin_types,name_ar,'.$id , 
        ];
    }
}
