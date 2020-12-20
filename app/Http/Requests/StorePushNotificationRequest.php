<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePushNotificationRequest extends FormRequest
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
            'title_en' => 'required'  , 
            'title_ar' => 'required' , 
            'content_en' => 'required' ,
            'content_ar' => 'required' , 
            'drivers' => 'required' ,
        ];
    }


    public function messages()
    {
        return [
            'drivers.required' => 'برجاء اختيار السائقين'
        ];
    }
}
