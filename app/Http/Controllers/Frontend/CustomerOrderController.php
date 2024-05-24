<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use Auth;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function customerOrder()
    {
        try {
            $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
            return view('frontend.order.index', [
                'orders' => $orders
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function customerOrderShow(Order $order)
    {
        try {
            return view('frontend.order.view', [
                'order'     =>   $order,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
