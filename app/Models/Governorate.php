<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Governorate extends Model
{
    


	public function admin()
	{
		return $this->belongsTo(Admin::class , 'admin_id');
	}


    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }




    public function cities()
    {
        return $this->hasMany(City::class);
    }


    public function add($data)
    {
    	$this->name_ar = $data['name_ar'];
    	$this->name_en = $data['name_en'];
    	$this->country_id = $data['country_id'];
    	$this->active = isset($data['active']) ? 1 : 0;
    	$this->admin_id = Auth::guard('admin')->id();
    	return $this->save();
    }


    public function isActive()
    {
    	return $this->active == 1 ? true : false;
    }


    public function edit($data)
    {
    	$this->name_ar = $data['name_ar'];
    	$this->name_en = $data['name_en'];
    	$this->country_id = $data['country_id'];
    	$this->active = isset($data['active']) ? 1 : 0;
    	return $this->save();
    }


    public function delivery_prices()
    {
        return $this->hasMany(DeliveryPrice::class , 'from_governorate');
    }

}
