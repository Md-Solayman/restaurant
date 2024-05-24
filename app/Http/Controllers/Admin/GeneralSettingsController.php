<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\GeneralSettings;
use App\Services\SettingsService;
use Cache;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function generalSettings()
    {
        try {
            return view('admin.settings.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // general settings
    public function generalSettingsStore(Request $request)
    {

        $data = $request->validate([
            'site_name'             => 'required',
            'default_currency'      => 'required',
            'currency_position'     => 'required',
            'currency_icons'        => 'required|max:4',
        ]);


        try {
            foreach ($data as $key => $value) {
                GeneralSettings::updateOrCreate(
                    ['key'      => $key],
                    ['value'    => $value]
                );
            }


            // update cache
            $settings = app(SettingsService::class);
            $settings->forgetSettings();


            $notification = array(
                'message'       => 'Completed Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // pusher settings
    public function pusherSettingsStore(Request $request)
    {
        $data = $request->validate([
            'pusher_app_id'         => ['required'],
            'pusher_key'            => ['required'],
            'pusher_secret'         => ['required'],
            'pusher_cluster'        => ['required'],
        ]);

        try {
            foreach ($data as $key => $value) {
                GeneralSettings::updateOrCreate(
                    ['key'      => $key],
                    ['value'    => $value]
                );
            }


            // update cache
            $settings = app(SettingsService::class);
            $settings->forgetSettings();


            $notification = array(
                'message'       => 'Completed Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // mail settings
    public function mailSettingsStore(Request $request)
    {

        $data = $request->validate([
            'mail_driver'                   => 'required',
            'mail_host'                     => 'required',
            'mail_port'                     => 'required',
            'mail_username'                 => 'required',
            'mail_password'                 => 'required',
            'mail_encryption'               => 'required',
            'mail_from_address'             => 'required',
            'mail_receive_address'          => 'required',
        ]);

        try {
            foreach ($data as $key => $value) {
                GeneralSettings::updateOrCreate(
                    ['key'          => $key],
                    ['value'        => $value]
                );
            }


            // update cache
            $settings = app(SettingsService::class);
            $settings->forgetSettings();
            Cache::forget('mailSettings');


            $notification = array(
                'message'       => 'Completed Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    // logo settings
    public function logoSettingsStore(Request $request)
    {

        try {

            // header logo
            if ($request->hasFile('header_logo')) {

                if (config('settings.header_logo') != '') {
                    Helper::prevImage(config('settings.header_logo'), '/uploads/settings/');
                }

                $image = Helper::image($request->header_logo, '/uploads/settings/');

                GeneralSettings::updateOrCreate(
                    ['key'          => 'header_logo'],
                    ['value'        => $image]
                );
            }


            // footer logo
            if ($request->hasFile('footer_logo')) {

                if (config('settings.footer_logo') != '') {
                    Helper::prevImage(config('settings.footer_logo'), '/uploads/settings/');
                }

                $image = Helper::image($request->footer_logo, '/uploads/settings/');

                GeneralSettings::updateOrCreate(
                    ['key'          => 'footer_logo'],
                    ['value'        => $image]
                );
            }


            // favicon logo
            if ($request->hasFile('favicon_logo')) {

                if (config('settings.favicon_logo') != '') {
                    Helper::prevImage(config('settings.favicon_logo'), '/uploads/settings/');
                }

                $image = Helper::image($request->favicon_logo, '/uploads/settings/');

                GeneralSettings::updateOrCreate(
                    ['key'          => 'favicon_logo'],
                    ['value'        => $image]
                );
            }



            // breadcumb logo
            if ($request->hasFile('breadcumb_logo')) {

                if (config('settings.breadcumb_logo') != '') {
                    Helper::prevImage(config('settings.breadcumb_logo'), '/uploads/settings/');
                }

                $image = Helper::image($request->breadcumb_logo, '/uploads/settings/');

                GeneralSettings::updateOrCreate(
                    ['key'          => 'breadcumb_logo'],
                    ['value'        => $image]
                );
            }



            // update cache
            $settings = app(SettingsService::class);
            $settings->forgetSettings();


            $notification = array(
                'message'       => 'Logo Updated Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // other settings
    public function otherSettingsStore(Request $request)
    {

        $data = $request->validate([
            'site_color'                => 'nullable',
            'site_seo_title'            => 'nullable',
            'site_seo_keywords'         => 'nullable',
            'site_seo_description'      => 'nullable|max:600',
        ]);


        try {
            foreach ($data as $key => $value) {
                GeneralSettings::updateOrCreate(
                    ['key'      => $key],
                    ['value'    => $value]
                );
            }


            // update cache
            $settings = app(SettingsService::class);
            $settings->forgetSettings();


            $notification = array(
                'message'       => 'Updated Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
