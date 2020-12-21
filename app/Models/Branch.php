<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    




	public function city()
	{
		return $this->belongsTo(City::class , 'city_id');
	}


	public function governorate()
	{
		return $this->belongsTo(Governorate::class , 'governorate_id');
	}

    public function market()
    {
    	return $this->belongsTo(Market::class , 'market_id');
    }
}
