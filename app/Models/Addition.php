<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    protected $table = 'additions';

    protected $fillable = ['id','title_ar','title_en','type','mandatory',
                           'extras','created_at','updated_at','product_id'];
    
    public static $rules = [

        'title_ar' => 'required',
        'title_en' => 'required',
        'status_add' => 'required',
        'available_choose' => 'required'
    ];                    
}
