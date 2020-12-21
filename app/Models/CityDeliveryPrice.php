<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityDeliveryPrice extends Model
{
    

    protected $fillable = ['admin_id'  , 'from_city' , 'to_city' , 'market_id' , 'price' ];


    public function from()
    {
    	return $this->belongsTo(City::class , 'from_city' );
    }

    public function to()
    {
    	return $this->belongsTo(City::class , 'to_city' );
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }

}
