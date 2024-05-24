<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\ProductRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{


    public function index()
    {
        try {
            $productRatings = ProductRating::orderBy('id', 'DESC')->get();

            return view('admin.product_rating.index', [
                'productRatings' => $productRatings,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function show($productRatingId)
    {
        try {
            $productRating = ProductRating::findOrFail($productRatingId);

            return view('admin.product_rating.view', [
                'productRating'     => $productRating,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function statusUpdate(Request $request, $productRatingId)
    {

        $data = $request->validate([
            'status'    => 'required|in:0,1',
            'rating'    => 'required',
        ]);


        try {
            ProductRating::findOrFail($productRatingId)->update($data);

            $notification = array(
                'alert-type'        => 'success',
                'message'           => 'Status Updated Successfully',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy($productRatingId)
    {
        try {
            ProductRating::findOrFail($productRatingId)->delete();

            $notification = array(
                'alert-type'        => 'success',
                'message'           => 'Deleted Successfully',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
