<?php

namespace App\MerchantModels;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    public $table = 'sub_categories';


    protected $dates = ['deleted_at'];


    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];


    public function merchant()
    {
        return $this->belongsTo(Merchant::class);

    }//end fo

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */


    /**
     * Validation rules
     *
     * @var array
     */
    public function isActive()
    {
        return $this->status == 1 ? true : false;
    }
    public function isStatus ()
    {
        return $this->status == 1 ? trans('merchantDashbaord.active') : trans('merchantDashbaord.deactive');
    }
    public static $rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
        'merchant_id' => 'numeric',
        'code' => 'numeric',
        'discount' => 'numeric',
        'order' => 'numeric'
    ];
}
