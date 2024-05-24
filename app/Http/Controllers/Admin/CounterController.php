<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function create()
    {
        try {
            $counter = Counter::first();

            return view('admin.counter.create', [
                'counter'           => $counter,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $request->validate([
            'counter_count_one'                 => 'required|integer',
            'counter_count_two'                 => 'required|integer',
            'counter_count_three'               => 'required|integer',
            'counter_name_one'                  => 'required',
            'counter_name_two'                  => 'required',
            'counter_name_three'                => 'required',
            'background'                        => 'required',
        ]);



        try {

            $image = Helper::image($request->background, '/uploads/counter/');


            Counter::updateOrCreate(
                [
                    'id'        => 1,
                ],

                [
                    'counter_count_one'                 => $request->counter_count_one,
                    'counter_count_two'                 => $request->counter_count_two,
                    'counter_count_three'               => $request->counter_count_three,
                    'counter_name_one'                  => $request->counter_name_one,
                    'counter_name_two'                  => $request->counter_name_two,
                    'counter_name_three'                => $request->counter_name_three,
                    'background'                        => $image,
                ]
            );



            $notification = array(
                'message'           => 'Updated Successfully',
                'alert-type'        => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
