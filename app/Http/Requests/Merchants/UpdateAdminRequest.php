<?php

namespace App\Http\Requests\Merchants;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest {
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
		$id = Request::segment(3);
		return [
			'name'            => 'required',
			'username'        => 'required|unique:merchants,username,'.$id,
			'email'           => 'nullable|unique:merchants,email,'.$id,
			'password'        => 'nullable|confirmed|min:8',
			'profile_picture' => 'nullable|image',
			'notes'           => 'nullable',
			'active'          => 'nullable',
			'phone'           => 'nullable',
			'address'         => 'nullable',
		];
	}
}
