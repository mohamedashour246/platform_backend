<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectMerchantIfNotLoggedInMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!Auth::guard('merhcant')->check()) {
			return redirect()          ->route('merhcants.login_view')->with('error_msg', 'برجاء تسجيل الدخول');
		}

		return $next($request);
	}
}
