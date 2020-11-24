<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPrice extends Model
{
    protected $fillable = ['from_governorate' , 'to_governorate' , 'price' , 'admin_id' ];





    public function governorate()
    {
    	return $this->belongsTo(Governorate::class , 'from_governorate');
    }


    public function destinationGovernorate()
    {
    	return $this->belongsTo(Governorate::class , 'to_governorate');
    }


    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }
}
