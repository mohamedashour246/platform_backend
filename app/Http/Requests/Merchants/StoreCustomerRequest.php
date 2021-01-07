<?php

namespace App\Http\Requests\Merchants;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'governorate'     => 'required',
			'city'            => 'required',
			'building_type'   => 'nullable',
			'street_name'     => 'nullable',
			'phone2'          => 'nullable',
			'phone1'          => 'required',
			'name'            => 'required',
			'avenue_number'   => 'nullable',
			'building_number' => 'nullable',
			'floor_number'    => 'nullable',
			'place_number'    => 'nullable',
			'longitude'       => 'required',
			'latitude'        => 'required',
		];
	}
}
