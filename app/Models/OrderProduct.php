<?php

namespace App\Models;

use App\MerchantModels\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);

    }

    public function extra()
    {
        return $this->hasMany(Extra::class);

    }
}
