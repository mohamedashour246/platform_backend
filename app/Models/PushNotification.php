<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PushNotification extends Model
{
    

	public function admin()
	{
		return $this->belongsTo(Admin::class , 'admin_id');
	}




	

    public function add($data)
    {
    	$this->title_ar = $data['title_ar'];
    	$this->title_en = $data['title_en'];
    	$this->content_en = $data['content_en'];
    	$this->content_ar = $data['content_ar'];
    	$this->drivers = json_encode($data['drivers']);
    	$this->admin_id = Auth::guard('admin')->id();
    	return $this->save();

    }
}
