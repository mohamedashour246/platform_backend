<?php

namespace App\Http\Requests\Board\MerchantNotification;

use Illuminate\Foundation\Http\FormRequest;

class StoreMerchantNotificationRequest extends FormRequest
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
            'markets' => 'required' , 
            'title_ar' => 'required' , 
            'title_en' => 'required' , 
            'content_en' => 'required' , 
            'content_ar' => 'required' , 
        ];
    }
}
