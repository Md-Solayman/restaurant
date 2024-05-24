<?php

namespace App\Providers;

use App\Models\Admin\PaymentSetting;
use App\Services\PaymentSettingsService;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\ServiceProvider;

class PaymentsettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentSettingsService::class, function () {
            return new PaymentSettingsService;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settings = $this->app->make(PaymentSettingsService::class);
        $settings->setGlobalSettings();
    }
}
