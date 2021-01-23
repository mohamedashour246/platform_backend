<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    


    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }


     public function driver()
    {
    	return $this->belongsTo(Driver::class , 'driver_id');
    }



     public function type()
    {
    	return $this->belongsTo(BillType::class , 'bill_type_id');
    }


}
