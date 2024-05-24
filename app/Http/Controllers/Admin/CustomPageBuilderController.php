<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CustomPageBuilder;
use Illuminate\Http\Request;

class CustomPageBuilderController extends Controller
{
    public function index()
    {
        try {
            $customPages = CustomPageBuilder::orderBy('id', 'DESC')->get();

            return view('admin.custom_page_builder.index', [
                'customPages' => $customPages
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function create()
    {
        try {
            return view('admin.custom_page_builder.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'title'                     => 'required|unique:custom_page_builders,title',
            'desc'                      => 'required',
            'status'                    => 'required|boolean',
        ]);


        try {

            $data['slug']           = \Str::slug($request->title);


            CustomPageBuilder::create($data);

            $notification = array(
                'message'       => 'Created Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(CustomPageBuilder $custompagebuilder)
    {
        try {

            return view('admin.custom_page_builder.edit', [
                'custompagebuilder'      => $custompagebuilder,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request, CustomPageBuilder $custompagebuilder)
    {
        $data = $request->validate([
            'title'                     => 'required|unique:custom_page_builders,title,' . $custompagebuilder->id,
            'desc'                      => 'required',
            'status'                    => 'required|boolean',
        ]);


        try {
            $custompagebuilder->update($data);

            $notification = array(
                'message'       => 'Updated Successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.custom_page_builder.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public function destroy(CustomPageBuilder $custompagebuilder)
    {
        try {

            $custompagebuilder->delete();

            $notification = array(
                'message'       => 'Deleted Successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function show(CustomPageBuilder $custompagebuilder)
    {
        try {
            return view('admin.custom_page_builder.view', [
                'custompagebuilder' => $custompagebuilder,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
