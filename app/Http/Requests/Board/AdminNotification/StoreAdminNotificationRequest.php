<?php

namespace App\Http\Requests\Board\AdminNotification;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminNotificationRequest extends FormRequest
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
            'admins' => 'required|array' , 
            'content_ar' =>  'required' , 
            'content_en' =>  'required' , 
            'title_ar' =>  'required' , 
            'title_en' =>  'required' , 
        ];
    }
}
