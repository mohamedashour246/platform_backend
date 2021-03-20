<?php

namespace App\MerchantModels;

use App\Models\Driver;
use App\Models\Merchant;
use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    public $table = 'order_services';

    protected $fillable = ['id','type','receiver','time_receiver','sender','time_sender','merchant_id','price','payment_type','name_ar','name_en','user_id',
    'driver_id','created_at','updated_at'];
    
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);        
    }
}
