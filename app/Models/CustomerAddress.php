<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model {

	public function governorate() {
		return $this->belongsTo(Governorate::class , 'governorate_id');
	}

	public function city() {
		return $this->belongsTo(City::class , 'city_id');
	}

	public function user() {
		return $this->belongsTo(Merchant::class , 'user_id');
	}

	public function building_type() {
		return $this->belongsTo(BuildingType::class );
	}
	public function add($data, $market_id, $user_id, $user_type) {
		$this->name             = $data['name'];
		$this->phone1           = $data['phone1'];
		$this->phone2           = $data['phone2'];
		$this->governorate_id   = $data['governorate'];
		$this->city_id          = $data['city'];
		$this->longitude        = $data['longitude'];
		$this->latitude         = $data['latitude'];
		$this->building_type_id = $data['building_type'];
		$this->building_number  = $data['building_number'];
		$this->floor_number     = $data['floor_number'];
		$this->place_number     = $data['place_number'];
		$this->street_name      = $data['street_name'];
		$this->avenue_number    = $data['avenue_number'];
		$this->business_type    = $data['business_type'];
		$this->market_id        = $market_id;
		$this->user_id          = $user_id;
		$this->user_type        = $user_type;
		return $this->save();
	}

	public function edit($data) {
		$this->name             = $data['name'];
		$this->phone1           = $data['phone1'];
		$this->phone2           = $data['phone2'];
		$this->governorate_id   = $data['governorate'];
		$this->city_id          = $data['city'];
		$this->longitude        = $data['longitude'];
		$this->latitude         = $data['latitude'];
		$this->building_type_id = $data['building_type'];
		$this->building_number  = $data['building_number'];
		$this->floor_number     = $data['floor_number'];
		$this->place_number     = $data['place_number'];
		$this->street_name      = $data['street_name'];
		$this->avenue_number    = $data['avenue_number'];
		$this->business_type    = $data['business_type'];
		return $this->save();
	}

}
