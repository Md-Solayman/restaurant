<?php

namespace App\Listeners;

use App\Events\OrderMailEvent;
use App\Mail\OrderStatusUpdateMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class OrderMailListener
{
    /**
     * Create the event listener.
     */


    public function __construct()
    {
    }


    /**
     * Handle the event.
     */
    public function handle(OrderMailEvent $event): void
    {
        $order = $event->order;

        Mail::send(new OrderStatusUpdateMail($order));
    }
}
