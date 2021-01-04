<?php

namespace App\Http\Requests\Merchants;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest {
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
		return [
			'password'         => 'required|confirmed|min:8',
			'current_password' => 'required'
		];
	}
}
