<?php

namespace App\MerchantModels;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    public $table = 'product_orders';

    protected $fillable = ['id','count','name_en','name_ar','orderservice_id',
                           'created_at' , 'updated_at'];
}
