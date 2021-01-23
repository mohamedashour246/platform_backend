<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    




    public function addedBy()
    {
    	return $this->belongsTo(Admin::class , 'added_by');
    }
}
