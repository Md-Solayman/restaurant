<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\BannerSlider;
use Illuminate\Http\Request;

class BannerSliderController extends Controller
{

    public function index()
    {
        try {
            $bannerSliders = BannerSlider::orderBy('id', 'DESC')->get();

            return view('admin.banner_slider.index', [
                'bannerSliders' => $bannerSliders,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {
            return view('admin.banner_slider.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'title'                      => 'required|unique:banner_sliders,title',
            'desc'                       => 'required',
            'url'                        => 'required|url',
            'image'                      => 'required|mimes:png,jpg|max:2000|file',
            'status'                     => 'required',
        ]);


        try {

            $image = Helper::image($request->image, '/uploads/banner_slider/');

            $data['image']      = $image;

            BannerSlider::create($data);

            $notification = array(
                'message'       => 'Created Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(BannerSlider $bannerslider)
    {
        try {
            return view('admin.banner_slider.edit', [
                'bannerslider'       => $bannerslider,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public function update(Request $request, BannerSlider $bannerslider)
    {
        $data = $request->validate([
            'title'                      => 'required|unique:banner_sliders,title,' . $bannerslider->id,
            'desc'                       => 'required',
            'url'                        => 'required|url',
            'image'                      => 'mimes:png,jpg|max:2000|file',
            'status'                     => 'required',
        ]);


        try {

            if ($request->image != '') {
                // delete previous image with helper function
                Helper::prevImage($bannerslider->image, '/uploads/banner_slider/');

                $image = Helper::image($request->image, '/uploads/banner_slider/');

                $data['image']      = $image;
            }

            $bannerslider->update($data);

            $notification = array(
                'message'       => 'Updated Successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.banner_slider.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(BannerSlider $bannerslider)
    {
        try {

            // delete previous image with helper function
            Helper::prevImage($bannerslider->image, '/uploads/banner_slider/');

            // delete product
            $bannerslider->delete();

            $notification = array(
                'message'       => 'Deleted Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
