<?php

namespace App\Http\Requests\Merchants;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {

		return Auth::guard('merchant')->check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		$id = Auth::guard('merchant')->id();
		return [
			'image'    => 'nullbale|image',
			'username' => 'required|unique:merchants,username,'.$id,
			'email'    => 'nullable|unique:merchants,email,'.$id,
		];
	}
}
