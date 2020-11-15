<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketBankAccount extends Model
{
    

    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }



    public function market()
    {
    	return $this->belongsTo(Market::class , 'market_id');
    }

}
