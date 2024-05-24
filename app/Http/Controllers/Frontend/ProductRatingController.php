<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\ProductRating;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductRatingController extends Controller
{

    public function productRatingStore(Request $request)
    {

        $data = $request->validate([
            'rating'        => 'required|integer|min:1|max:5',
            'review'        => 'required',
        ]);


        try {
            // check user buy product or not
            $user = Auth::user();

            $hasPurchased = $user->orders()->whereHas('orderItem', function ($query) use ($request) {
                $query->where('product_id', $request->product_id);
            })->where('order_status', 'delivered')->get();


            if (count($hasPurchased) < 1) {

                $notification = array(
                    'alert-type'    => 'error',
                    'message'       => 'Please buy a product to give a review',
                );

                return back()->with($notification);
            }


            // check if rating already exists
            $alreadyReviewed = ProductRating::where(['user_id'  => Auth::id(), 'product_id' => $request->product_id])->exists();

            if ($alreadyReviewed) {
                $notification = array(
                    'alert-type'    => 'error',
                    'message'       => 'Review has been submitted already',
                );

                return back()->with($notification);
            }


            // insert rating
            $data['user_id']        = Auth::id();
            $data['product_id']     = $request->product_id;
            ProductRating::create($data);

            $notification = array(
                'alert-type'    => 'success',
                'message'       => 'Review submitted, wait for approval',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
