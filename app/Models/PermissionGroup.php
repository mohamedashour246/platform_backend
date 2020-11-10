<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    

    public function permissions()
    {
    	return $this->hasMany(Permission::class , 'group_id');
    }
}
