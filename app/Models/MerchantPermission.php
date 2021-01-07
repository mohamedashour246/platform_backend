<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantPermission extends Model {

	protected $fillable = ['permission_id', 'merchant_id', 'added_by'];
	public function permission() {
		return $this->belongsTo(Permission::class );
	}
}
