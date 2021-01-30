<?php

namespace App\Models;

use App\MerchantModels\Product;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{

    public function product_data()
    {
        return $this->belongsTo(Product::class,'extra_id');

    }
}
