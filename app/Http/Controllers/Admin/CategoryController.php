<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{

    public function index()
    {
        try {
            $categories = Category::orderBy('id', 'DESC')->get();
            return view('admin.category.index', [
                'categories'    => $categories,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|unique:categories,name',
            'image'     => 'required|mimes:png,jpg|file|max:2000',
        ]);

        try {
            $uploadedFile = $request->image;
            $extension = $uploadedFile->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $extension;
            Image::make($uploadedFile)->save(public_path('/uploads/category/' . $fileName));


            $data['image'] = $fileName;

            Category::create($data);

            $notification = array(
                'message'       => 'Category Added',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function edit(string $id)
    {

        try {
            $category = Category::findOrFail($id);

            return view('admin.category.edit', [
                'category' => $category,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'      => 'nullable',
            'image'     => 'nullable|mimes:png,jpg|file|max:2000',
        ]);

        try {
            if ($request->image != '') {
                // delete previous image
                $image = $category->image;
                $deletedFrom = public_path('/uploads/category/' . $image);
                unlink($deletedFrom);


                // setup new image
                $uploadedFile = $request->image;
                $extension = $uploadedFile->getClientOriginalExtension();
                $fileName = 'media_' . uniqid() . '.' . $extension;
                Image::make($uploadedFile)->save(public_path('/uploads/category/' . $fileName));


                $data['image'] = $fileName;
            }


            $category->update($data);

            $notification = array(
                'message'       => 'Category Updated',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.category.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function show()
    {
    }


    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            // delete previous image
            $image = $category->image;
            $deletedFrom = public_path('/uploads/category/' . $image);
            unlink($deletedFrom);

            $category->delete();


            $notification = array(
                'message'       => 'Category Deleted',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
