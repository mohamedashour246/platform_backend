<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Branch extends Model {

	public function add($data) {
		$this->name           = $data['branch_name'];
		$this->phones         = $data['phones'];
		$this->address        = $data['address'];
		$this->governorate_id = $data['governorate_id'];
		$this->city_id        = $data['city_id'];
		$this->latitude       = $data['latitude'];
		$this->longitude      = $data['longitude'];
		$this->market_id      = Session::get('market_id');
		return $this->save();
	}

	public function edit($data) {
		$this->name           = $data['branch_name'];
		$this->phones         = $data['phones'];
		$this->address        = $data['address'];
		$this->governorate_id = $data['governorate_id'];
		$this->city_id        = $data['city_id'];
		$this->latitude       = $data['latitude'];
		$this->longitude      = $data['longitude'];
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

	public function remove() {
		return $this->delete();
	}
}
