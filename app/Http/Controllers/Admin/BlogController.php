<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogCategory;
use App\Models\Frontend\BlogComment;
use Auth;
use Illuminate\Http\Request;
use Str;


class BlogController extends Controller
{
    public function index()
    {
        try {
            $blogs = Blog::orderBy('id', 'DESC')->get();

            return view('admin.blog.index', [
                'blogs' => $blogs
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function create()
    {
        try {
            $categories = BlogCategory::all();
            return view('admin.blog.create', [
                'categories' => $categories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'title'                     => 'required|unique:blogs,title',
            'category_id'               => 'required',
            'image'                     => 'required|mimes:png,jpg|max:2000|file',
            'desc'                      => 'required',
            'seo_title'                 => 'nullable',
            'seo_desc'                  => 'nullable',
            'status'                    => 'required|boolean',
        ]);


        try {

            $data['added_by']           = Auth::guard('admin')->id();

            $image = Helper::image($request->image, '/uploads/blog/');

            $data['image']      = $image;
            $data['slug']       = Str::lower(str_replace(' ', '-', $request->title)) . '-' . rand(999999, 10000000);



            Blog::create($data);

            $notification = array(
                'message'       => 'Created Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(Blog $blog)
    {
        try {
            $categories = BlogCategory::all();
            return view('admin.blog.edit', [
                'blog'          => $blog,
                'categories'    => $categories
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title'                     => 'required|unique:blogs,title,' . $blog->id,
            'category_id'               => 'required',
            'image'                     => 'nullable|mimes:png,jpg|max:2000|file',
            'desc'                      => 'required',
            'seo_title'                 => 'nullable',
            'seo_desc'                  => 'nullable',
            'status'                    => 'required|boolean',
        ]);


        try {
            $data['added_by']           = Auth::guard('admin')->id();

            if ($request->image != '') {
                // delete previous image with helper function
                $previousImage = Helper::prevImage($blog->image, '/uploads/blog/');

                $image = Helper::image($request->image, '/uploads/blog/');

                $data['image']      = $image;
            }


            $blog->update($data);

            $notification = array(
                'message'       => 'Updated Successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.blog.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public function destroy(Blog $blog)
    {
        try {

            // delete previous image with helper function
            Helper::prevImage($blog->image, '/uploads/blog/');

            // delete blog
            $blog->delete();

            $notification = array(
                'message'       => 'Deleted Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function show(Blog $blog)
    {
        try {
            return view('admin.blog.view', [
                'blog' => $blog,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // comment
    public function comment()
    {
        try {
            $blogComments = BlogComment::with(['user', 'blog'])->orderBy('id', 'DESC')->get();

            return view('admin.blog.comment', [
                'blogComments'      => $blogComments,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function commentStatus($commentId)
    {
        try {
            $comment = BlogComment::with(['blog', 'user'])->findOrFail($commentId);
            return view('admin.blog.commentStatus', [
                'comment' => $comment,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function commentStatusUpdate(Request $request, $commentId)
    {
        $data = $request->validate([
            'status'        => 'required',
        ]);


        try {
            BlogComment::findOrFail($commentId)->update($data);

            $notification = array(
                'message'       => 'Status Updated Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function commentDestroy($commentId)
    {
        try {
            BlogComment::findOrFail($commentId)->delete();

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
