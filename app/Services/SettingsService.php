<?php

namespace App\Services;

use App\Models\Admin\GeneralSettings;
use Cache;

class SettingsService
{
    public function getSettings()
    {
        return Cache::rememberForever('settings', function () {
            return GeneralSettings::pluck('value', 'key')->toArray();
        });
    }




    public function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }


    public function forgetSettings()
    {
        Cache::forget('settings');
    }
}
