<?php

namespace App\Listeners;

use App\Events\OrderStatusUpdateEvent;
use App\Models\Frontend\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderStatusUpdateListener
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
    public function handle(OrderStatusUpdateEvent $event): void
    {
        $orderId = $event->orderId;
        $order = Order::findOrFail($orderId);
        $order->payment_method = $event->paymentMethod;
        $order->payment_approve_date = now();
        $order->payment_status = $event->paymentInfo['status'];
        $order->currency_name = $event->paymentInfo['currency'];
        $order->transaction_id = $event->paymentInfo['transaction_id'];
        $order->save();
    }
}
