<?php

namespace App\Http\Requests\Merchants;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest {
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
			'name'            => 'required|unique:merchants,name',
			'username'        => 'required|unique:merchants,username',
			'email'           => 'nullable|unique:merchants,email',
			'password'        => 'required|confirmed|min:8',
			'profile_picture' => 'nullable|image',
			'notes'           => 'nullable',
			'active'          => 'nullable',
			'phone'           => 'nullable',
			'address'         => 'nullable',
		];
	}
}
