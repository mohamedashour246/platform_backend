<?php

namespace App\MerchantModels;

use Illuminate\Database\Eloquent\Model;

class AddProduct extends Model
{
    public $table = 'addproducts';

    protected $fillable = ['id','name_ar','name_en','count','cost',
                            'status' , 'created_at', 'updated_at'];


     public function isActive()
    {
        return $this->status == 1 ? true : false;
    }

    

}
