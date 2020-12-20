<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    



    public function add($data)
    {
    	$this->title_ar = $data['title_ar'];
    	
    	
    }
}
