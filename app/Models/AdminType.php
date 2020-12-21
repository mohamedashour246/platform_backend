<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;
use Auth;
class AdminType extends Model
{
    


    public function admin()
    {
    	return $this->belongsTo(Admin::class , 'admin_id');
    }



    public function add($data)
    {
    	$this->name_ar  = $data['name_ar'];
        $this->name_en  = $data['name_en'];
        $this->slug     = Str::slug($data['name_en'],'-');
        $this->admin_id = Auth::guard('admin')->id();
        $this->active = 1;
        $this->deletable = 1;
        return $this->save();
    }

    public function edit($data)
    {
    	$this->name_ar  = $data['name_ar'];
        $this->name_en  = $data['name_en'];
        $this->active = isset($data['active']) ? 1 : 0;
        return $this->save();
    }


    public function isActive()
    {
    	return $this->active == 1 ? true : false;
    }

}
