<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class City extends Model
{
    



    public function add($data)
    {
    	$this->name_en = $data['name_en'];
    	$this->name_ar = $data['name_ar'];
    	$this->governorate_id = $data['governorate_id'];
    	$this->active = isset($data['active']) ? 1 : 0;
    	$this->admin_id = Auth::guard('admin')->id();
    	return $this->save();
    }



    public function edit($data)
    {
    	$this->name_en = $data['name_en'];
    	$this->name_ar = $data['name_ar'];
    	$this->governorate_id = $data['governorate_id'];
    	$this->active = isset($data['active']) ? 1 : 0;
    	return $this->save();
    }



    public function governorate()
    {
    	return $this->belongsTo(Governorate::class , 'governorate_id');
    }


    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }


    public function isActive()
    {
    	return $this->active == 1 ? true : 0;
    }
}
