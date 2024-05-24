<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function create()
    {
        try {
            $about = About::first();

            return view('admin.about.create', [
                'about'        => $about,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'desc'          => 'required',
            'video_link'    => 'required|url',
            'image'         => 'nullable|file|mimes:png,jpg,jpeg,gif|max:2000',
        ]);

        try {
            if ($request->hasFile('image')) {
                $image = Helper::image($request->image, '/uploads/about/');

                About::updateOrCreate(
                    ['id'               => 1],
                    [
                        'title'         => $request->title,
                        'desc'          => $request->desc,
                        'video_link'    => $request->video_link,
                        'image'         => $image,
                    ]
                );
            } else {
                About::updateOrCreate(
                    ['id'               => 1],
                    [
                        'title'         => $request->title,
                        'desc'          => $request->desc,
                        'video_link'    => $request->video_link,
                    ]
                );
            }


            $notification = array(
                'alert-type'            => 'success',
                'message'               => 'Created Successfully',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
