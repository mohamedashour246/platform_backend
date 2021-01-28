<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function owner() {
        return $this->belongsTo(User::class , 'client_id');
    }
}
