<?php

namespace App\Services;

use App\Models\Admin\PaymentSetting;
use Cache;

class PaymentSettingsService
{
    public function getSettings()
    {
        return Cache::rememberForever('paymentSettings', function () {
            return PaymentSetting::pluck('value', 'key')->toArray();
        });
    }


    public function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('paymentSettings', $settings);
    }


    public function clearCache()
    {
        Cache::forget('paymentSettings');
    }
}
