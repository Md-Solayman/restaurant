@extends('frontend.master')

@section('content')
    <!-- checkout page start -->
    <section class="section-tb-padding">
        <div class="container">
            <div class="row">

                <div class="col-xl-8 col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header cart-style1">
                            <h3 class="text-white text-center">Customer Address</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($addresses as $address)
                                    <div class="col-lg-5"
                                        style="background-color: rgb(247, 165, 135); color: white; margin: 10px; padding: 20px;">
                                        <input type="radio" name="address" class="v_address" value="{{ $address->id }}">
                                        {{ $address->address_type }}
                                        <p>{{ $address->address }}</p>
                                    </div>
                                @endforeach
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
                                {{ currencyPosition(cartTotalPrice()) }}
                            </span>


                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Delivery:</span>
                            <span class="delivery">{{ currencyPosition(0) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Discount:</span>
                            <span class="discount">

                                @if (session()->has('coupon'))
                                    {{ currencyPosition(session()->get('coupon')['discount']) }}
                                @else
                                    {{ currencyPosition(0) }}
                                @endif

                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total:</span>
                            <span class="finalTotal">

                                {{ currencyPosition(grandTotal()) }}
                            </span>
                        </li>


                        @if (count(Cart::content()) > 0)
                            <li class="list-group-item">
                                <a class="check-link btn btn-style1 payment">Proceed to Payment</a>
                            </li>
                        @endif
                    </ul>



                </div>

            </div>
        </div>

    </section>
    <!-- checkout page end -->
@endsection



@push('scripts')
    <script>
        // address and delivery charge
        $('.v_address').on('click', function() {
            let addressId = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '{{ route('checkout.delivery') }}',
                data: {
                    address_id: addressId,
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    $('.finalTotal').text('{{ currencyPosition(':grandTotal') }}'.replace(
                        ':grandTotal', data.grandTotal));

                    $('.delivery').text('{{ currencyPosition(':deliveryAmount') }}'.replace(
                        ':deliveryAmount', data.deliveryAmount));
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

        // payment
        $('.payment').on('click', function(e) {
            e.preventDefault();

            let address = $('.v_address:checked');


            if (address.length == 0) {
                toastr.error('Please Select Delivery Address');
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '{{ route('checkout.proceed.payment') }}',
                data: {
                    address_id: address.val(),
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
