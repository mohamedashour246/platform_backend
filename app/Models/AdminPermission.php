<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    

	protected $fillable = ['permission_id' , 'added_by' ];

    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }





    public function permission()
    {
    	return $this->belongsTo(Permission::class , 'permission_id');
    }
}
