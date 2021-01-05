<?php

namespace App\Http\Requests\Merchants;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest {
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
			'branch_id'                 => 'required',
			'order_price'               => 'nullable',
			'payment_method_id'         => 'required',
			'notes'                     => 'nullable',
			'delivery_date_to_customer' => 'required',
			'receipt_date_from_market'  => 'required',
			'customers'                 => 'required',
			'receipt_time_from_market'  => 'required',
			'delivery_time_to_customer' => 'required'
		];
	}
}
