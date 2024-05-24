<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function create()
    {
        try {
            $terms = TermsCondition::first();

            return view('admin.terms_condition.create', [
                'terms'        => $terms,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'desc'          => 'required',
        ]);

        try {

            TermsCondition::updateOrCreate(
                ['id'               => 1],
                [
                    'title'         => $request->title,
                    'desc'          => $request->desc,
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
