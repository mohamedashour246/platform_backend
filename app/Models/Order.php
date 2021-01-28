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

    public function orderPayment(){
        $status = "";
        if (app()->getLocale()== 'en'){
            if ($this->payment_type == 'cash'){
                $status= 'cash during delivered';
            }
            elseif ($this->payment_type == 'visa'){
                $status= 'visa';
            }
        }

        if (app()->getLocale()== 'ar'){
            if ($this->payment_type == 'cash'){
                $status= 'كاش وقت الاستلام';
            }
            elseif ($this->payment_type == 'visa'){
                $status= 'فيزا';
            }
        }
        return $status;
    }


    public function owner() {
        return $this->belongsTo(User::class , 'client_id');
    }

    public function city() {
        return $this->belongsTo(City::class , 'city_id');
    }

    public function order_products() {
        return $this->hasMany(OrderProduct::class , 'order_id');
    }
}
