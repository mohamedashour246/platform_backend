<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountSliders extends Model
{
    public $table = 'discount_sliders';

    protected $fillable = ['id','name_ar','name_en','image','barcode','expire','count_use','repeatation','free_shipping','value_discount','discount_type',
                           'min_cost','status_slider','current_status','created_at','updated_at'];
    
    public function isStatus()
    {
        return $this->current_status == 1 ? trans('merchantDashbaord.active') : trans('merchantDashbaord.deactive');
    } 
    
    public function isFree()
    {
        return $this->free_shipping == 1 ? trans('merchantDashbaord.active') : trans('merchantDashbaord.deactive');
    } 

    public function isStatusSlider()
    {
        return $this->status_slider == 1 ? trans('merchantDashbaord.active') : trans('merchantDashbaord.deactive');
    } 
}
