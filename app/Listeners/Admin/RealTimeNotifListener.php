<?php

namespace App\Listeners\Admin;

use App\Events\RealTimeNotifEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RealTimeNotifListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RealTimeNotifEvent $event): void
    {
        //
    }
}
