<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{


    public function create()
    {
        try {
            $socialLink = SocialLink::pluck('value', 'key')->toArray();

            return view('admin.social_link.create', [
                'socialLink'       => $socialLink,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'facebook_link'             => 'required|url',
            'twitter_link'             => 'required|url',
            'instagram_link'             => 'required|url',
            'linkedin_link'             => 'required|url',
        ]);


        try {

            foreach ($data as $key => $value) {
                SocialLink::updateOrCreate(
                    [
                        'key'       => $key
                    ],
                    [
                        'value'     => $value,
                    ]
                );
            }


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
