<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::orderBy('id', 'DESC')->get();

            return view('admin.order.index', [
                'orders'       => $orders,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function pendingOrder()
    {
        try {
            $orders = Order::where('order_status', 'pending')->orderBy('id', 'DESC')->get();

            return view('admin.order.index', [
                'orders'       => $orders,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function declinedOrder()
    {
        try {
            $orders = Order::where('order_status', 'declined')->orderBy('id', 'DESC')->get();

            return view('admin.order.index', [
                'orders'       => $orders,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function processedOrder()
    {
        try {
            $orders = Order::where('order_status', 'processed')->orderBy('id', 'DESC')->get();

            return view('admin.order.index', [
                'orders'       => $orders,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function deliveredOrder()
    {
        try {
            $orders = Order::where('order_status', 'delivered')->orderBy('id', 'DESC')->get();

            return view('admin.order.index', [
                'orders'       => $orders,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function orderStatus($orderId)
    {
        try {
            $order = Order::select(['order_status', 'payment_status'])->findOrFail($orderId);
            return response($order);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function orderStatusUpdate(Request $request, Order $order)
    {



        $data = $request->validate([
            'payment_status'        => ['required', 'in:pending,completed'],
            'order_status'          => ['required', 'in:pending,processed,declined,delivered'],
        ]);


        try {
            $order->update($data);

            if ($request->ajax()) {
                return response(['message'  => 'Status Updated']);
            } else {
                $notification = array(
                    'alert-type'        => 'success',
                    'message'           => 'Status Updated Successfully',
                );

                return back()->with($notification);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function show(Order $order)
    {
        try {
            return view('admin.order.view', [
                'order'     => $order,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function destroy(Order $order)
    {
        try {


            $order->delete();

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
