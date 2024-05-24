<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\AppBanner;
use Illuminate\Http\Request;

class AppBannerController extends Controller
{
    // public function index()
    // {
    //     try {
    //         $appBanners = AppBanner::orderBy('id', 'DESC')->get();

    //         return view('admin.app_banner.index', [
    //             'appBanners' => $appBanners,
    //         ]);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }


    public function create()
    {
        try {
            $appBanner = AppBanner::orderBy('id', 'DESC')->first();


            return view('admin.app_banner.create', [
                'appBanner' => $appBanner,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $request->validate([
            'title'                 => 'required',
            'description'           => 'required',
            'image'                 => 'required|mimes:jpg,png|max:2000|file',
            'background_image'      => 'required|mimes:jpg,png|max:2000|file',
            'playstore_link'        => 'nullable|url',
            'appstore_link'         => 'nullable|url',
        ]);


        try {
            // processing image
            if ($request->hasFile('image')) {
                $image = Helper::image($request->image, '/uploads/app_banner/');
            }

            // processing background image
            if ($request->hasFile('background_image')) {
                $fileName = Helper::image($request->background_image, '/uploads/app_banner/background/');
            }


            AppBanner::updateOrCreate(
                [
                    'id'    => 1,
                ],

                [
                    'title'             => $request->title,
                    'description'       => $request->description,
                    'playstore_link'    => $request->playstore_link,
                    'appstore_link'     => $request->appstore_link,
                    'image'             => $image,
                    'background_image'  => $fileName,
                ]

            );

            $notification = array(
                'message'       => 'Created Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    // public function destroy(AppBanner $appbanner)
    // {
    //     try {

    //         // delete previous image with helper function
    //         Helper::prevImage($appbanner->image, '/uploads/app_banner/');

    //         // delete previous background image with helper function
    //         Helper::prevImage($appbanner->image, '/uploads/app_banner/background/');

    //         // delete product
    //         $appbanner->delete();

    //         $notification = array(
    //             'message'       => 'Deleted Successfully',
    //             'alert-type'    => 'success',
    //         );

    //         return back()->with($notification);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }
}
