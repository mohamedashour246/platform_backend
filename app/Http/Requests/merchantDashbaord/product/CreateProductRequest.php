<?php

namespace App\Http\Requests\merchantDashbaord\product;

use Illuminate\Foundation\Http\FormRequest;
use App\MerchantModels\Product;
use App\Models\Addition;

class CreateProductRequest extends FormRequest
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
        return [Product::$rules, Addition::$rules];


    }
}
