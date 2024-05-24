<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Reservation;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReservationController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->validate([
            'name'                          => 'required',
            'phone'                         => 'required',
            'total_person'                  => 'required',
            'date'                          => 'required',
            'reservation_time_id'           => 'required',
        ]);


        try {

            if (!Auth::check()) {
                return response(['message' => 'Please login for reservation', 'status' => 'error']);
            }

            $data['user_id'] = Auth::id();
            $data['reservation_id'] = rand(999999, 10000000);

            Reservation::create($data);

            return response(['message'  => 'Table Booked', 'status' => 'success']);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }


    public function list()
    {
        try {
            $reservations = Reservation::where('user_id', Auth::id())->get();

            return view('frontend.pages.reservation', [
                'reservations' => $reservations,
            ]);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
