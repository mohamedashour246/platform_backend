<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Session;

class Branch extends Model {

	public function add($data) {
		$this->name             = $data['branch_name'];
		$this->phones           = $data['phones'];
		$this->governorate_id   = $data['governorate_id'];
		$this->city_id          = $data['city_id'];
		$this->latitude         = $data['latitude'];
		$this->longitude        = $data['longitude'];
		$this->street_name      = $data['street_name'];
		$this->building_type_id = $data['building_type'];
		$this->floor_number     = $data['floor_number'];
		$this->apratment_number = $data['apratment_number'];
		$this->building_number  = $data['building_number'];
		$this->avenue_number    = $data['avenue_number'];
		$this->place_number     = $data['place_number'];
		$this->merchant_id      = Auth::guard('merchant')->id();

		$this->market_id = Session::get('market_id');
		return $this->save();
	}

	public function edit($data) {
		$this->name             = $data['branch_name'];
		$this->phones           = $data['phones'];
		$this->governorate_id   = $data['governorate_id'];
		$this->city_id          = $data['city_id'];
		$this->latitude         = $data['latitude'];
		$this->longitude        = $data['longitude'];
		$this->street_name      = $data['street_name'];
		$this->building_type_id = $data['building_type'];
		$this->floor_number     = $data['floor_number'];
		$this->apratment_number = $data['apratment_number'];
		$this->building_number  = $data['building_number'];
		$this->avenue_number    = $data['avenue_number'];
		$this->place_number     = $data['place_number'];
		return $this->save();
	}

	public function city() {
		return $this->belongsTo(City::class , 'city_id');
	}

	public function governorate() {
		return $this->belongsTo(Governorate::class , 'governorate_id');
	}

	public function market() {
		return $this->belongsTo(Market::class , 'market_id');
	}

	public function building_type() {
		return $this->belongsTo(BuildingType::class );
	}

	public function merchant() {
		return $this->belongsTo(Merchant::class );
	}

	public function remove() {
		return $this->delete();
	}
}
