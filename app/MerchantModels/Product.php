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
    protected $fillable = ['id','code','merchant_id','name_ar','name_en','image','description_ar','description_en','status','type','deliver_services','unit_type','price','selling_counter','discount','selling_price','cost_per_unit','shipping_cost','limit','barcode','sub_category_id' ,'created_at',  'updated_at', 'deleted_at'
     ];
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
