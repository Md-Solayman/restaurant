<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SectionTitle;
use Illuminate\Http\Request;

class SectionTitleController extends Controller
{
    public function index()
    {
        try {
            $sectionTitles = SectionTitle::pluck('value', 'key')->toArray();
            return view('admin.section_title.index', [
                'sectionTitles'     => $sectionTitles,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'daily_offer_title'             => 'required',
            'daily_offer_desc'              => 'required'
        ]);

        try {

            foreach ($data as $key => $value) {
                SectionTitle::updateOrCreate(
                    ['key'          => $key],
                    ['value'        => $value]
                );
            }


            $notification = array(
                'message'       => 'Created successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
