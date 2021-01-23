<?php

namespace App\MerchantModels;

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
        return asset('uploads/merchantDashbaord/' . $this->image);


    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);

    }//end fo
}
