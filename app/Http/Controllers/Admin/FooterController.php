<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function create()
    {
        try {
            $footer = Footer::first();

            return view('admin.footer.create', [
                'footer'        => $footer,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function store(Request $request)
    {
        $request->validate([
            'email'         => 'nullable',
            'phone'         => 'nullable',
            'copyright'     => 'required',
            'address'       => 'required',
        ]);

        try {
            Footer::updateOrCreate(
                [
                    'id' => 1,
                ],
                [
                    'phone'         => $request->phone,
                    'email'         => $request->email,
                    'address'       => $request->address,
                    'copyright'     => $request->copyright,
                ]
            );



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
