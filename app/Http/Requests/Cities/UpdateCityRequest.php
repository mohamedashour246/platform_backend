<?php

namespace App\Http\Requests\Cities;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateCityRequest extends FormRequest
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
            'governorate_id' => 'required',
            'name_ar' => 'required|unique:cities,name_ar,'.$id,
            'name_en' => 'required|unique:cities,name_en,'.$id,
            'active' => 'nullable' ,
        ];
    }
}
