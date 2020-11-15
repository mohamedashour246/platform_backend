<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketDocument extends Model
{
    

    protected $fillable = ['file' , 'admin_id' , 'market_id'];



    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }


    public function market()
    {
    	return $this->belongsTo(Market::class , 'market_id');
    }
}
