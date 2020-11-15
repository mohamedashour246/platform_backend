<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    



    public function market()
    {
    	return $this->belongsTo(Market::class , 'market_id');
    }
}
