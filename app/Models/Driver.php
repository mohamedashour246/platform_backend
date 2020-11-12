<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Auth;
class Driver extends Model
{
    

	public function admin()
	{
		return $this->belongsTo(Admin::class , 'admin_id');
	}


	public function country()
	{
		return $this->belongsTo(Country::class , 'country_id');
	}

	public function setImage($image)
	{
		$this->image = $image;
		return $this->save();
	}


    public function add($data)
    {
    	$this->name = $data['driver_name'];
    	$this->username = $data['username'];
    	$this->password = Hash::make($data['password']);
    	$this->phone = $data['phone'];
    	$this->code = $data['code'];
    	$this->car_number = $data['car_number'];
    	$this->country_id = $data['country_id'];
    	$this->admin_id = Auth::guard('admin')->id();
    	$this->bounce = $data['bounce'];
    	$this->working_start_time = $data['working_start_time_submit'];
    	$this->working_end_time = $data['working_end_time_submit'];
    	$this->notes = $data['notes'];
    	$this->active = isset($data['active']) ? 1 : 0 ;
    	$this->available = isset($data['available']) ? 1 : 0 ;
    	return $this->save();
    }



    public function isActive()
    {
    	return $this->active == 1 ? true : false;
    }


    public function isAvailable()
    {
    	return $this->available == 1 ? true : false;
    }


    public function edit($data)
    {
    	$this->name = $data['driver_name'];
    	$this->username = $data['username'];
    	$this->password = !empty($data['password']) ? Hash::make($data['password']) : $this->password;
    	$this->phone = $data['phone'];
    	$this->code = $data['code'];
    	$this->car_number = $data['car_number'];
    	$this->country_id = $data['country_id'];
    	$this->bounce = $data['bounce'];
    	$this->working_start_time = $data['working_start_time_submit'];
    	$this->working_end_time = $data['working_end_time_submit'];
    	$this->notes = $data['notes'];
    	$this->active = isset($data['active']) ? 1 : 0 ;
    	$this->available = isset($data['available']) ? 1 : 0 ;
    	return $this->save();
    }


}
