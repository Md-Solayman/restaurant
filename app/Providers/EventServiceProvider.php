<?php

namespace App\Providers;

use App\Events\OrderMailEvent;
use App\Events\OrderPaymentCompleteEvent;
use App\Events\OrderStatusUpdateEvent;
use App\Listeners\OrderMailListener;
use App\Listeners\OrderPaymentCompleteListener;
use App\Listeners\OrderStatusUpdateListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderStatusUpdateEvent::class => [
            OrderStatusUpdateListener::class,
        ],
        OrderMailEvent::class => [
            OrderMailListener::class,
        ],


    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
