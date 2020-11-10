<?php

namespace App\Http\Middleware;

use Closure;
use App;
class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        } else {
            App::setLocale('ar');
            session()->put('dir' , 'rtl');
            session()->put('locale' , 'ar');
        }
       
        return $next($request);
    }
}
