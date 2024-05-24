<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        try {
            $testimonials = Testimonial::orderBy('id', 'DESC')->get();

            return view('admin.testimonial.index', [
                'testimonials' => $testimonials,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {
            return view('admin.testimonial.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'                       => 'required|unique:testimonials,name',
            'title'                      => 'required',
            'desc'                       => 'required',
            'image'                      => 'required|mimes:png,jpg|max:2000|file',
            'status'                     => 'required|boolean',
            'show_homepage'              => 'required|boolean',
            'count'                      => 'required|numeric|max:5',
        ]);


        try {

            $image = Helper::image($request->image, '/uploads/testimonial/');

            $data['image']      = $image;


            Testimonial::create($data);

            $notification = array(
                'message'       => 'Created Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(Testimonial $testimonial)
    {
        try {
            return view('admin.testimonial.edit', [
                'testimonial'       => $testimonial,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public function update(Request $request, Testimonial $testimonial)
    {

        $data = $request->validate([
            'name'                       => 'required',
            'title'                      => 'required',
            'desc'                       => 'required',
            'image'                      => 'nullable|mimes:png,jpg|max:2000|file',
            'status'                     => 'required|boolean',
            'show_homepage'              => 'required|boolean',
            'count'                      => 'required|numeric|max:5',
        ]);



        try {
            if ($request->image != '') {
                // delete previous image with helper function
                Helper::prevImage($testimonial->image, '/uploads/testimonial/');

                $image = Helper::image($request->image, '/uploads/testimonial/');

                $data['image']      = $image;
            }

            $testimonial->update($data);

            $notification = array(
                'message'       => 'Updated Successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.testimonial.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(Testimonial $testimonial)
    {
        try {

            // delete previous image with helper function
            Helper::prevImage($testimonial->image, '/uploads/testimonial/');

            // delete product
            $testimonial->delete();

            $notification = array(
                'message'       => 'Deleted Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function show(Testimonial $testimonial)
    {
        try {
            return view('admin.testimonial.view', [
                'testimonial' => $testimonial
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function statusUpdate(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'status'                => 'required|boolean',
            'show_homepage'         => 'required|boolean',
        ]);



        try {
            $testimonial->update($data);

            $notification = array(
                'message'       => 'Status Updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
