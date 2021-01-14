<?php

namespace App\Http\Requests\Merchants;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest {
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
			'branch_name'      => 'required',
			'latitude'         => 'required',
			'longitude'        => 'required',
			'phones'           => 'nullable',
			'governorate_id'   => 'required',
			'city_id'          => 'required',
			'street_name'      => 'nullable',
			'building_type'    => 'nullable',
			'floor_number'     => 'nullable',
			'apratment_number' => 'nullable',
			'building_number'  => 'nullable',
			'avenue_number'    => 'nullable',
			'place_number'     => 'nullable'
		];
	}
}
