<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectIfMarketSuspendedMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		$merchant = Auth::guard('merchant')->user();
		$merchant->load('market');
		if (!$merchant->market->isActive()) {
			Auth::guard('merchant')->logout();
			return redirect()->route('merchants.login_view')->with('error_msg', 'تم وقف المتجر عن العمل برجاء التواصل مع الااره');
		}
		return $next($request);
	}
}
