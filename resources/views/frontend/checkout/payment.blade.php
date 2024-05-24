@extends('frontend.master')

@section('content')
    <!-- checkout page start -->

    @if (count(Cart::content()) > 0)
        <section class="section-tb-padding">
            <div class="container">
                <div class="row">

                    <div class="col-xl-8 col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="card">
                            <div class="card-header cart-style1">
                                <h3 class="text-white text-center">Select Payment Method</h3>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    {{-- check status --}}

                                    @if (config('paymentSettings.paypal_status') == 1)
                                        <div class="col-lg-4 my-2">
                                            <a href="{{route('payment.success')}}">
                                                <img width="200" height="130"
                                                    src="{{ asset('/frontend_assets/bkash.jpg') }}" alt="">
                                            </a>

                                        </div>
                                    @endif


                                    @if (config('paymentSettings.stripe_status') == 1)
                                        <div class="col-lg-4 my-2">
                                            <a href="{{route('payment.success')}}">
                                                <img width="200" height="130"
                                                    src="{{ asset('/frontend_assets/nagad.png') }}" alt="">
                                            </a>

                                        </div>
                                    @endif

                                    @if (config('paymentSettings.razorpay_status') == 1)
                                        <div class="col-lg-4 my-2">
                                            <a href="{{route('payment.success')}}">
                                                <img width="200" height="130"
                                                    src="{{ asset('/frontend_assets/upay.png') }}" alt="">
                                            </a>
                                            <br>
                                            <br>
                                        </div>
                                    @endif



                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-xl-4 col-xs-12 col-sm-12 col-md-12 col-lg-4">

                        <ul class="list-group">
                            <li class="list-group-item cart-style1 text-center">Total Cart</li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal: </span>
                                <span class="subTotal">
                                    {{ $subtotal }}
                                </span>


                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Delivery:</span>
                                <span class="delivery">{{ $deliveryCharge }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Discount:</span>
                                <span class="discount">
                                    {{ $discount }}
                                </span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total:</span>
                                <span class="finalTotal">
                                    {{ $grandTotal }}
                                </span>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>
    @else
        <h3 class="text-center text-danger p-2">There are no product in your cart</h3>
    @endif

    <!-- checkout page end -->
@endsection



@push('scripts')
    <script>
        $('.online_payment').on('click', function() {
            let paymentName = $(this).data('name');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('checkout.make.payment') }}',
                data: {
                    payment_gateway: paymentName,
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    location.href = data.redirect_url;
                },
                error: function(xhr, status, error) {
                    hideLoader();
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    hideLoader();
                }
            })
        });
    </script>
@endpush
