<?php

namespace App\Http\Requests\merchantDashbaord\subCategory;

use Illuminate\Foundation\Http\FormRequest;
use App\MerchantModels\SubCategory;

class CreateSubCategoryRequest extends FormRequest
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
        return SubCategory::$rules;
    }
}
