<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model {

	protected $dates = [
		'delivery_date_to_customer',
		'receipt_date_from_market'
	];

	public function market() {
		return $this->belongsTo(Market::class , 'market_id');
	}

	public function branch() {
		return $this->belongsTo(Branch::class , 'branch_id');
	}

	public function payment_method() {
		return $this->belongsTo(PaymentMethod::class , 'payment_method_id');
	}

	public function user() {
		return $this->belongsTo(Merchant::class , 'admin_id');
	}

	public function driver() {
		return $this->belongsTo(Driver::class , 'driver_id');
	}

	public function items() {
		return $this->hasMany(TripItem::class , 'trip_id');
	}

	public function address() {
		return $this->belongsTo(CustomerAddress::class , 'customer_address_id');
	}

	public function status()
	{
		return $this->belongsTo(TripStatus::class , 'status_id');
	}




	public function add($data, $address_id) {
		$this->market_id                 = $data['market_id'];
		$this->branch_id                 = $data['branch_id'];
		$this->code                      = mt_rand(0, 50).time();
		$this->admin_id                  = Auth::guard('admin')->id();
		$this->order_price               = $data['order_price'];
		$this->payment_method_id         = $data['payment_method_id'];
		$this->delivery_date_to_customer = $data['delivery_date_to_customer'].' '.$data['delivery_time_to_customer'];
		$this->receipt_date_from_market  = $data['receipt_date_from_market'].' '.$data['receipt_time_from_market'];
		$this->status                    = 1;
		$this->driver_id                 = $data['driver_id'];
		$this->customer_address_id       = $address_id;
		// $this->notes = $data['notes'];
		return $this->save();
	}

}
