<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        try {
            $coupons = Coupon::orderBy('id', 'DESC')->get();

            return view('admin.coupon.index', [
                'coupons'       => $coupons,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {

            return view('admin.coupon.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'                       => 'required',
            'code'                       => 'required',
            'quantity'                   => 'required',
            'min_purchase_amount'        => 'required',
            'discount_type'              => 'required',
            'discount'                   => 'required',
            'status'                     => 'required',
            'expire_date'                => 'required',

        ]);


        try {

            Coupon::create($data);

            $notification = array(
                'message'       => 'Created successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(Coupon $coupon)
    {
        try {

            return view('admin.coupon.edit', [
                'coupon'       => $coupon,

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request, Coupon $coupon)
    {
        $data = $request->validate([
            'name'                       => 'required',
            'code'                       => 'required',
            'quantity'                   => 'required',
            'min_purchase_amount'        => 'required',
            'discount_type'              => 'required',
            'discount'                   => 'required',
            'status'                     => 'required',
            'expire_date'                => 'required',

        ]);

        try {

            $coupon->update($data);

            $notification = array(
                'message'       => 'Updated successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.coupon.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(Coupon $coupon)
    {
        try {


            $coupon->delete();

            $notification = array(
                'message'       => 'Deleted successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function show(Coupon $coupon)
    {
        try {
            return view('admin.coupon.view', [
                'coupon' => $coupon,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
