<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryArea;
use App\Models\Frontend\Address;
use Auth;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        try {
            $customerAddress = Address::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
            $deliveryAreas = DeliveryArea::where('status', 1)->get();

            return view('frontend.address.index', [
                'customerAddress' => $customerAddress,
                'deliveryAreas' => $deliveryAreas,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function create()
    {
        try {
            $deliveryAreas = DeliveryArea::where('status', 1)->get();
            return view('frontend.address.create', [
                'deliveryAreas'         => $deliveryAreas,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'delivery_area_id'           => 'required',
            'name'                       => 'required',
            'phone'                      => 'required',
            'address'                    => 'required',
            'email'                      => 'required',
            'address_type'               => 'required|in:Home,Office',
        ]);

        try {
            $data['user_id']           = Auth::id();
            Address::create($data);

            $notification = array(
                'message'       => 'Created successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('customer.address')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(Request $request)
    {
        try {
            $address = Address::findOrFail($request->id);
            return response()->json($address);
        } catch (\Exception $e) {
            return response()->json(['message'  => 'Something Went Wrong', 'status' => 'error']);
        }
    }


    public function update(Request $request, Address $address)
    {
        $data = $request->validate([
            'delivery_area_id'           => 'required',
            'name'                       => 'required',
            'phone'                      => 'required',
            'address'                    => 'required',
            'email'                      => 'required',
            'address_type'               => 'required|in:Home,Office',
        ]);

        try {

            Address::findOrFail($request->id)->update($data);

            $notification = array(
                'message'       => 'Updated successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('customer.address')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(Address $address)
    {
        try {


            $address->delete();

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
