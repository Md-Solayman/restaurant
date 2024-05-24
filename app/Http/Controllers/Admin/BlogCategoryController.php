<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        try {
            $blogCategories = BlogCategory::orderBy('id', 'DESC')->get();

            return view('admin.blog_category.index', [
                'blogCategories' => $blogCategories
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {
            return view('admin.blog_category.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'              => 'required|unique:blog_categories,name',
            'status'            => 'required|boolean',
        ]);


        try {

            BlogCategory::create($data);

            $notification = array(
                'message'       => 'Created Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(BlogCategory $blogcategory)
    {
        try {
            return view('admin.blog_category.edit', [
                'blogcategory'       => $blogcategory,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function update(Request $request, BlogCategory $blogcategory)
    {
        $data = $request->validate([
            'name'              => 'required|unique:blog_categories,name,' . $blogcategory->id,
            'status'            => 'required|boolean',
        ]);


        try {

            $blogcategory->update($data);

            $notification = array(
                'message'       => 'Updated Successfully',
                'alert-type'    => 'success',
            );


            return redirect()->route('admin.blog_category.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function destroy(BlogCategory $blogcategory)
    {
        try {

            $blogcategory->delete();

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
