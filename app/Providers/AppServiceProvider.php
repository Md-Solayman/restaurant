<?php

namespace App\Providers;

use App\Models\Admin\GeneralSettings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();

        // $keys = [
        //     'pusher_app_id',
        //     'pusher_key',
        //     'pusher_secret',
        //     'pusher_cluster'
        // ];

        // $settings = GeneralSettings::whereIn('key', $keys)->pluck('value', 'key');


        // config(['broadcasting.connections.pusher.app_id'            => $settings['pusher_app_id']]);
        // config(['broadcasting.connections.pusher.key'               => $settings['pusher_key']]);
        // config(['broadcasting.connections.pusher.secret'            => $settings['pusher_secret']]);
        // config(['broadcasting.connections.pusher.options.cluster'   => $settings['pusher_cluster']]);
    }
}
