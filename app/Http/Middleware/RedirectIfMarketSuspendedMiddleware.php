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

		$merhcant = Auth::guard('merhcant')->user();
		$merhcant->load('market');

		if (!$merhcant->market->isActive()) {
			Auth::guard('merhcant')->logout();
			return redirect()->route('merhcants.login_view')->with('error_msg', 'تم وقف المتجر عن العمل برجاء التواصل مع الااره');
		}
		return $next($request);
	}
}
