<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{

    public function index()
    {
        try {
            $chefs = Chef::orderBy('id', 'DESC')->get();

            return view('admin.chef.index', [
                'chefs' => $chefs
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {
            return view('admin.chef.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'              => 'required',
            'title'             => 'required',
            'image'             => 'file|max:2000',
            'fb_link'           => 'nullable|url',
            'twitter_link'      => 'nullable|url',
            'linkedin_link'     => 'nullable|url',
            'website_link'      => 'nullable|url',
            'show_homepage'     => 'required|boolean',
            'status'            => 'required|boolean',
        ]);


        try {

            $image = Helper::image($request->image, '/uploads/chef/');

            $data['image']      = $image;

            Chef::create($data);

            $notification = array(
                'message'       => 'Created Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(Chef $chef)
    {
        try {
            return view('admin.chef.edit', [
                'chef'       => $chef,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function update(Request $request, Chef $chef)
    {
        $data = $request->validate([
            'name'              => 'required',
            'title'             => 'required',
            'image'             => 'max:2000|file',
            'fb_link'           => 'nullable|url',
            'twitter_link'      => 'nullable|url',
            'linkedin_link'     => 'nullable|url',
            'website_link'      => 'nullable|url',
            'show_homepage'     => 'required|boolean',
            'status'            => 'required|boolean',
        ]);


        try {

            if ($request->image != '') {
                // delete previous image with helper function
                Helper::prevImage($chef->image, '/uploads/chef/');

                $image = Helper::image($request->image, '/uploads/chef/');

                $data['image']      = $image;
            }

            $chef->update($data);

            $notification = array(
                'message'       => 'Updated Successfully',
                'alert-type'    => 'success',
            );


            return redirect()->route('admin.chef.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function destroy(Chef $chef)
    {
        try {

            // delete previous image with helper function
            Helper::prevImage($chef->image, '/uploads/chef/');

            // delete product
            $chef->delete();

            $notification = array(
                'message'       => 'Deleted Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function show(Chef $chef)
    {
        try {
            return view('admin.chef.view', [
                'chef' => $chef
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
