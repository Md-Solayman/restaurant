<?php

namespace App\Services;

use App\Models\Frontend\Order;
use App\Models\Frontend\OrderItem;
use Auth;
use Cart;

class OrderService
{
    public function createOrder()
    {

        try {
            $order = new Order();
            $order->user_id                  = Auth::id();
            $order->invoice_id               = generateInvoice();
            $order->product_qty              = count(Cart::content());
            $order->subtotal                 = cartTotalPrice();
            $order->discount                 = session()->get('coupon')['discount'] ?? 0;
            $order->delivery_charge          = session()->get('deliveryCharge') ?? 0;
            $order->address_id               = session()->get('addressId');
            $order->grand_total              = grandTotal(session()->get('deliveryCharge') ?? 0);
            $order->address                  = session()->get('address');
            $order->payment_method           = NULL;
            $order->payment_approve_date     = NULL;
            $order->payment_status           = 'pending';
            $order->order_status             = 'pending';
            $order->transaction_id           = NULL;
            $order->coupon_info              = json_encode(session()->get('coupon'));
            $order->currency_name            = NULL;
            $order->save();



            // Order Items
            foreach (Cart::content() as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id             = $order->id;
                $orderItem->product_id           = $item->id;
                $orderItem->product_name         = $item->name;
                $orderItem->qty                  = $item->qty;
                $orderItem->unit_price           = $item->price;
                $orderItem->product_size         = json_encode($item->options->product_variant);
                $orderItem->product_option       = json_encode($item->options->product_option);
                $orderItem->save();
            }


            // total value keep into session
            session()->put('grandTotal', $order->grand_total);

            // order id keep into session
            session()->put('orderId', $order->id);

            return true;
        } catch (\Exception $e) {
            logger($e);
            return false;
        }
    }




    public function clearSession()
    {
        try {
            \Cart::destroy();
            session()->forget('address');
            session()->forget('coupon');
            session()->forget('addressId');
            session()->forget('grandTotal');
            session()->forget('orderId');
            session()->forget('deliveryCharge');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
