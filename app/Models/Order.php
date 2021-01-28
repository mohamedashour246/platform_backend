<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function currentStatus(){
        $status = "";
        if (app()->getLocale()== 'en'){
            if ($this->order_status == 'new'){
                $status= 'New';
            }
            elseif ($this->order_status == 'in_progress'){
                $status= 'In Progress';
            }
            elseif ($this->order_status == 'delivered'){
                $status= 'delivered';
            }
        }

        if (app()->getLocale()== 'ar'){
            if ($this->order_status == 'new'){
                $status= 'جديد';
            }
            elseif ($this->order_status == 'in_progress'){
                $status= 'قيد التحضير';
            }
            elseif ($this->order_status == 'delivered'){
                $status= 'تم التوصيل';
            }
        }
        return $status;
    }
    public function owner() {
        return $this->belongsTo(User::class , 'client_id');
    }
}
