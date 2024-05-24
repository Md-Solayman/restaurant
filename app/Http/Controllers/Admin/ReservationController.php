<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        try {

            $reservations = Reservation::orderBy('id', 'DESC')->get();

            return view('admin.reservation.index', [
                'reservations'    => $reservations,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request)
    {
        try {
            Reservation::findOrFail($request->id)->update([
                'status' => $request->status,
            ]);

            return response(['message'  => 'Status Updated', 'status'   => $request->status]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
