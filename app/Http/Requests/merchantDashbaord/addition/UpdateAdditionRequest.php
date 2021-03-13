<?php

namespace App\Http\Requests\merchantDashbaord\addition;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdditionRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'cost' => 'required',
            'count' => 'required',
            'status' => 'required',
        ];
    }
}
