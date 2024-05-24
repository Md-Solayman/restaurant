<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use App\Models\Admin\Product;
use App\Models\Admin\ProductOption;
use App\Models\Admin\ProductVariant;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    // add cart
    public function cartAdd(Request $request)
    {
        try {


            $product = Product::findOrFail($request->product_id);

            $productQuantity = $product->quantity;

            if ($request->quantity > $productQuantity) {
                return response()->json(['status'   => 'error', 'message' => 'Out of stock, total stock: ' . $productQuantity], 500);
            }

            $variant = $request->variant;
            $option = $request->option;

            $options = [
                'product_variant' => [],

                'product_option'    => [],

                'product_info'      => [
                    'image' => $product->image,
                    'slug'  => $product->slug,
                ],
            ];


            if ($variant != '') {
                $productVariant = ProductVariant::findOrFail($variant);
                $options['product_variant'] = [
                    'id'            => $productVariant->id,
                    'price'         => $productVariant->price,
                    'size_name'     => $productVariant->size_name,
                ];
            }



            if ($option != '') {
                $productOption = ProductOption::whereIn('id', $option)->get();

                foreach ($productOption as $option) {
                    $options['product_option'][] = [
                        'id'        => $option->id,
                        'name'      => $option->name,
                        'price'     => $option->price,
                    ];
                }
            }


            Cart::add([
                'id'            => $product->id,
                'name'          => $product->name,
                'qty'           => $request->quantity,
                'price'         => $request->base_price,
                'weight'        => 0,
                'options'       => $options,
            ]);


            return response()->json(['status'   => 'success', 'message' => 'Product added into cart successfully'], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // cart items
    public function cartItems()
    {
        try {
            return view('frontend.cart_items')->render();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // remove cart item
    public function removeCartItem($rowId)
    {
        try {
            Cart::remove($rowId);

            session()->forget('coupon');

            return response()->json(['message' => 'Cart removed successfully', 'status' => 'success', 'subtotal'    => cartTotalPrice(), 'total'    => grandTotal(), 'discount' => 0]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something Went Wrong', 'status' => 'error']);
        }
    }



    // cart page
    public function cartPage()
    {
        try {
            return view('frontend.cart.cart');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // cart quantity update
    public function cartQuantityUpdate(Request $request)
    {
        try {
            $item = Cart::get($request->rowId);
            $product = Product::findOrFail($item->id);

            if ($request->quantity > $product->quantity) {
                return response(['message'  => 'Out of stock, total stock ' . $product->quantity, 'status' => 'error', 'subtotal' => cartTotalPrice(), 'grandtotal'  => grandTotal(), 'productPrice' => cartProductPrice($request->rowId), 'quantity' => $item->qty]);
            } else {

                Cart::update($request->rowId, $request->quantity);

                session()->forget('coupon');

                return response(['message'  => 'Cart Updated', 'status' => 'success', 'subtotal' => cartTotalPrice(), 'grandtotal'  => grandTotal(), 'productPrice' => cartProductPrice($request->rowId), 'quantity' => $request->quantity, 'discount' => 0]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // clear cart
    public function clearCart()
    {
        try {
            Cart::destroy();
            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // apply coupon
    public function cartCouponApply(Request $request)
    {
        try {
            $coupon = $request->coupon;
            $subtotal = cartTotalPrice();

            $discount = 0;
            $total = 0;

            $couponItem = Coupon::where('code', $coupon)->where('status', 1)->first();

            // check if exists
            if ($couponItem == '') {
                return response(['message' => 'Invalid Coupon', 'status' => 'error', 'discount' => 0, 'subtotal' => $subtotal, 'total' => $subtotal]);
            }

            // check quantity
            if ($couponItem->quantity == 0) {
                return response(['message'  => 'Coupon Unavailable', 'status' => 'error', 'discount' => 0, 'subtotal' => $subtotal, 'total' => $subtotal]);
            }

            // check expire date
            if ($couponItem->expire_date < now()) {
                return response(['message'  => 'Coupon Expired', 'status' => 'error', 'discount' => 0, 'subtotal' => $subtotal, 'total' => $subtotal]);
            }


            // check minimum purchase amount
            if ($couponItem->min_purchase_amount < $subtotal) {
                if ($couponItem->discount_type == 'percent') {
                    $discount += $subtotal * ($couponItem->discount / 100);
                    $total += $subtotal - $discount;
                } else if ($couponItem->discount_type == 'amount') {
                    $discount += $couponItem->discount;
                    $total += $subtotal - $discount;
                }
            } else {
                return response(['message'  => 'Minimum purchase amount: ' . $couponItem->min_purchase_amount, 'status' => 'error', 'discount' => 0, 'subtotal' => $subtotal, 'total' => $subtotal]);
            }


            // put data into session
            session()->put('coupon', ['code' => $coupon, 'discount' => $discount, 'subtotal' => $subtotal]);

            return response(['message'  => 'Coupon Applied', 'status' => 'success', 'total' => $total, 'discount' => $discount, 'subtotal' => $subtotal, 'code' => $coupon]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong', 'status' => 'error']);
        }
    }




    // cart coupon remove
    public function cartCouponRemove()
    {
        try {
            session()->forget('coupon');

            return response()->json(['message' => 'Coupon Removed', 'subtotal' => cartTotalPrice(), 'total' => grandTotal(), 'discount'    => 0, 'status' => 'success']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
