<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ReservationTime;
use Illuminate\Http\Request;

class ReservationTimeController extends Controller
{
    public function index()
    {
        try {
            $reservationTime = ReservationTime::orderBy('id', 'DESC')->get();

            return view('admin.reservation_time.index', [
                'reservationTime'       => $reservationTime,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {
            return view('admin.reservation_time.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'start_time'   => 'required',
            'end_time'     => 'required',
            'status'       => 'required',
        ]);


        try {

            ReservationTime::create($data);

            $notification = array(
                'message'       => 'Created successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(ReservationTime $reservationtime)
    {
        try {

            return view('admin.reservation_time.edit', [
                'reservationtime'       => $reservationtime,

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request, ReservationTime $reservationtime)
    {

        $data = $request->validate([
            'start_time'   => 'required',
            'end_time'     => 'required',
            'status'       => 'required',
        ]);


        try {

            $reservationtime->update($data);

            $notification = array(
                'message'       => 'Updated successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.reservation_time.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(ReservationTime $reservationtime)
    {
        try {


            $reservationtime->delete();

            $notification = array(
                'message'       => 'Deleted successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
