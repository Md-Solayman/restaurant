<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        try {
            $contact = Contact::first();

            return view('admin.contact.create', [
                'contact'        => $contact,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'phone'         => 'required',
            'email'         => 'required',
            'map_link'      => 'nullable',
            'address'       => 'required',
        ]);

        try {

            Contact::updateOrCreate(
                ['id'               => 1],
                [
                    'phone'         => $request->phone,
                    'email'         => $request->email,
                    'map_link'      => $request->map_link,
                    'address'       => $request->address,
                ]
            );

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
