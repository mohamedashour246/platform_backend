<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectMerchantIfDeactivatedMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (Auth::guard('merhcant')->user()->active != 1) {
			Auth::guard('merhcant')->logout();
			return redirect()->route('merhcants.login_view')->with('error_msg', 'حاليا انت ممنوع من الدخول برجاء التواصل مع الاداره');
		}
		return $next($request);
	}
}
