<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay Payment</title>
</head>

<style>
    .payButton {
        background-color: black;
        color: white;
        border-radius: 5px;
        padding: 5px 10px;
    }

    .payButton:hover {
        cursor: pointer;
    }
</style>

<body>

    @php
        $grandTotal = session()->get('grandTotal');
        $totalAmount = round($grandTotal * config('paymentSettings.razorpay_currency_rate')) * 100;
    @endphp



    <form action="{{ route('razorpay.payment') }}" method="POST">
        @csrf


        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ config('paymentSettings.razorpay_api_key') }}"
            data-name="Payment" data-buttontext="Pay" data-amount="{{ $totalAmount }}" data-prefill.name="Mohammad Naim"
            data-prefill.email="mnaimdev@gmail.com" data-currency="{{ config('paymentSettings.razorpay_currency_name') }}"
            data-description="Payment for product"></script>
    </form>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const payButton = document.querySelector('.razorpay-payment-button');
            payButton.classList.add('payButton');

            payButton.click();
            // payButton.style.display = 'none';
        });
    </script>
</body>

</html>
