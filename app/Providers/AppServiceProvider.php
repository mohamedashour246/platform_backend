<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TripStatus;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $data['status'] = TripStatus::all();


       view()->share('shardData'  , $data );
    }
}
