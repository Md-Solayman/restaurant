<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DailyOffer;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class DailyOfferController extends Controller
{

    public function index()
    {
        try {
            $dailyOffers = DailyOffer::orderBy('id', 'DESC')->get();

            return view('admin.daily_offer.index', [
                'dailyOffers'       => $dailyOffers,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function create()
    {
        try {

            return view('admin.daily_offer.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'product_id'                => 'required|unique:daily_offers,product_id',
            'status'                    => 'required|boolean'
        ]);



        try {

            DailyOffer::create($data);

            $notification = array(
                'message'       => 'Created successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function edit(DailyOffer $dailyoffer)
    {
        try {

            return view('admin.daily_offer.edit', [
                'dailyoffer'       => $dailyoffer,

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request, DailyOffer $dailyoffer)
    {
        $data = $request->validate([
            'product_id'                => 'required|exists:daily_offers,product_id',
            'status'                    => 'required|boolean'
        ]);

        try {

            $dailyoffer->update($data);

            $notification = array(
                'message'       => 'Updated successfully',
                'alert-type'    => 'success',
            );

            return redirect()->route('admin.daily_offer.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function destroy(DailyOffer $dailyoffer)
    {
        try {


            $dailyoffer->delete();

            $notification = array(
                'message'       => 'Deleted successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public function search(Request $request)
    {
        try {
            $product = Product::select('id', 'name', 'image')->where('name', 'LIKE', '%' . $request->search . '%')->get();
            return response($product);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
