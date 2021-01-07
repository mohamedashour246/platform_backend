<?php

namespace App\Models;

use Auth;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

class Merchant extends Authenticatable {

	public function market() {

		return $this->belongsTo(Market::class );
	}

	public function type() {
		return $this->belongsTo(AdminType::class , 'type_id');
	}

	public function permissions() {
		return $this->hasMany(MerchantPermission::class );
	}
	public function governorate() {
		return $this->belongsTo(Governorate::class );
	}

	public function setImage($image) {
		$this->image = $image;
		return $this->save();
	}

	public function isActive() {
		return $this->active == 1?true:false;
	}

	public function add($data) {
		$this->name          = $data['name'];
		$this->username      = $data['username'];
		$this->email         = $data['email'];
		$this->phone         = $data['phone'];
		$this->active        = isset($data['active'])?1:0;
		$this->password      = Hash::make($data['password']);
		$this->market_id     = Session::get('market_id');
		$this->added_by      = Auth::guard('merchant')->id();
		$this->added_by_type = 'employee';
		$this->type_id       = $data['type'];
		return $this->save();
	}

	public function edit($data) {
		$this->name     = $data['name'];
		$this->username = $data['username'];
		$this->email    = $data['email'];
		$this->phone    = $data['phone'];
		$this->active   = isset($data['active'])?1:0;
		$this->password = isset($data['password'])?Hash::make($data['password']):$this->password;
		$this->type_id  = $data['type'];
		return $this->save();
	}

}
