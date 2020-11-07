<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
class LogSuccessfullLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        Log::info('logged in now');
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Log::info('logged in now');
    }
}
