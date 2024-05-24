<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryArea;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{
    public function index()
    {
        try {
            $deliveries = DeliveryArea::orderBy('id', 'DESC')->get();

            return view('admin.delivery.index', [
                'deliveries'       => $deliveries,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {

            return view('admin.delivery.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'area_name'                              => 'required',
            'min_delivery_time'                      => 'required',
            'max_delivery_time'                      => 'required',
            'delivery_charge'                        => 'required',
            'status'                                 => 'required',
        ]);


        try {

            DeliveryArea::create($data);

            $notification = array(
                'message'       => 'Created successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(DeliveryArea $deliveryarea)
    {
        try {

            return view('admin.delivery.edit', [
                'deliveryarea'       => $deliveryarea,

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request, DeliveryArea $deliveryarea)
    {
        $data = $request->validate([
            'area_name'                              => 'required',
            'min_delivery_time'                      => 'required',
            'max_delivery_time'                      => 'required',
            'delivery_charge'                        => 'required',
            'status'                                 => 'required',
        ]);

        try {

            $deliveryarea->update($data);

            $notification = array(
                'message'       => 'Updated successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.delivery.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(DeliveryArea $deliveryarea)
    {
        try {


            $deliveryarea->delete();

            $notification = array(
                'message'       => 'Deleted successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function show(DeliveryArea $deliveryarea)
    {
        try {
            return view('admin.delivery.view', [
                'deliveryarea' => $deliveryarea,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
