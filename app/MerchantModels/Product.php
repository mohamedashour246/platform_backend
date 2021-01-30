<?php

namespace App\MerchantModels;

use App\Models\Extra;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $rules = [
        'name_ar' => 'required',
        'name_en' => 'required',


    ];
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    public function getImagePathAttribute()
    {
        if($this->image){
            return asset('uploads/merchantDashbaord/' . $this->image);
        }else{
            return asset('uploads/merchantDashbaord/no_image.png');
        }


    }
    public function isActive()
    {
        return $this->status == 1 ? true : false;
    }
    public function isStatus ()
    {
        return $this->status == 1 ? trans('merchantDashbaord.active') : trans('merchantDashbaord.deactive');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);

    }//end fo

    public function product_order()
    {
        return $this->hasMany(OrderProduct::class);

    }
}
