<?php


if (!function_exists('cartTotalPrice')) {
    function cartTotalPrice()
    {
        $total = 0;
        $optionPrice = 0;
        $price = 0;

        foreach (Cart::content() as $item) {
            $price = $item->price;
            $quantity = $item->qty;

            $variantPrice = $item->options?->product_variant['price'] ?? 0;

            foreach ($item->options->product_option as $option) {
                $optionPrice += $option['price'] ?? 0;
            }

            $total += ($price + $variantPrice + $optionPrice) * $quantity;
        }

        return $total;
    }
}


if (!function_exists('cartProductPrice')) {
    function cartProductPrice($rowId)
    {

        $product = Cart::get($rowId);

        $total = 0;
        $optionPrice = 0;
        $price = $product->price;

        $variantPrice = $product->options?->product_variant['price'] ?? 0;

        foreach ($product->options->product_option as $option) {
            $optionPrice += $option['price'];
        }

        $total += ($price + $variantPrice + $optionPrice) * $product->qty;

        return $total;
    }
}


if (!function_exists('grandTotal')) {
    function grandTotal($deliveryAmount = 0)
    {
        $total = 0;
        $subtotal = cartTotalPrice();

        if (session()->has('coupon')) {
            $discount = session()->get('coupon')['discount'];
            $total = ($subtotal + $deliveryAmount) - $discount;
            return $total;
        } else {
            $total = $subtotal + $deliveryAmount;
            return $total;
        }
    }
}



if (!function_exists('generateInvoice')) {
    function generateInvoice()
    {
        $randomNumber = rand(1, 9999);
        $time = now();
        $invoice = $randomNumber . $time->format('ym') . $time->format('s');
        return $invoice;
    }
}
