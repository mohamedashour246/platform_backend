<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;

class setWhichMarketThisMerchantBelongsToMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		$merchant = Auth::guard('merchant')->user();
		if ($merchant           ->market_id == null) {
			Auth::guard('merchant')->logout();
			return redirect()->route('merchants.login_view').with('error_msg', 'عفوا لم يتم تحديد المتجر الذى تتبع له');
		}

		Session::put('market_id', $merchant->market_id);
		return $next($request);
	}
}
