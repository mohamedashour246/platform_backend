<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillType extends Model
{
    


    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }
}
