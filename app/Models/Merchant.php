<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable {
	//

	public function market() {

		return $this->belongsTo(Market::class );
	}
}
