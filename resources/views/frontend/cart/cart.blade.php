@extends('frontend.master')


@section('content')
    <!-- breadcrumb start -->
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding"
            style="background-image: url({{ asset('/frontend_assets/image/about-image.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <ul class="about-link text-center">
                                <li class="about-p"><span>Cart Page</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->


    <!-- cart start -->
    <section class="cart-page section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-xs-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="cart-area">
                        <div class="cart-details">
                            {{-- <div class="cart-item">
                                <span class="cart-head">My cart:</span>
                                <span class="c-items">4 item</span>
                            </div> --}}
                            <div>
                                <table class="table table-sm">
                                    <tr>
                                        <th>Image</th>
                                        <th>Details</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>


                                    @foreach (Cart::content() as $cartItem)
                                        <tr style="align-items: center">
                                            <td>
                                                <div class="cart-pro-image">
                                                    <a href="product.html"><img
                                                            src="{{ asset('/uploads/product') }}/{{ $cartItem->options->product_info['image'] }}"
                                                            class="img-fluid" alt="image"
                                                            style="width: 100px; height: 100px;"></a>
                                                </div>
                                            </td>



                                            <td>
                                                <div class="pro-details">
                                                    <h6><a href="product.html">{{ $cartItem->name }}</a></h6>
                                                    <span>size:
                                                        {{ $cartItem->options?->product_variant['size_name'] ?? 'NA' }}</span>
                                                    <span
                                                        class="mx-2">{{ $cartItem->options?->product_variant['price'] ?? '' }}</span>

                                                    <div>
                                                        @foreach ($cartItem->options->product_option as $option)
                                                            <div>
                                                                <span>{{ @$option['name'] }}</span>
                                                                <span class="mx-2">{{ @$option['price'] }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="cart-pro-price">{{ currencyPosition($cartItem->price) }}</span>
                                            </td>

                                            <td>
                                                <div class="plus-minus">
                                                    <span>
                                                        <a href="javascript:void(0)" class="decrementBtn">-</a>
                                                        <input type="text" class="quantity"
                                                            data-id="{{ $cartItem->rowId }}" name="name"
                                                            value="{{ $cartItem->qty }}" style="width: 60px;">
                                                        <a href="javascript:void(0)" class="incrementBtn">+</a>
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="total">

                                                {{ currencyPosition(cartProductPrice($cartItem->rowId)) }}

                                            </td>


                                            <td>
                                                <button data-id="{{ $cartItem->rowId }}" class="removeBtn">X</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>

                                @if (count(Cart::content()) > 0)
                                    <a href="{{ route('cart.clear') }}" class="btn-style1 clearAll">Clear All</a>
                                @else
                                    <p class="text-center">No Items Found</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-4 col-xs-12 col-sm-12 col-md-12 col-lg-5">

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
                            <span>{{ currencyPosition(0) }}</span>
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


                        <form id="coupon_form">
                            <li class="list-group-item d-flex justify-content-between">

                                <input type="text" name="coupon" id="coupon_input" class="w-100"
                                    placeholder="Coupon Code">
                                <button class="btn-style1" style="border-radius: 0px;" type="submit">apply</button>

                            </li>
                        </form>

                        <li class="list-group-item d-flex justify-content-between" id="couponTextContainer">
                            @if (session()->has('coupon'))
                                <input type="text" name="coupon" id="couponCode" class="w-100"
                                    value="
                                    {{ session()->get('coupon')['code'] }}"
                                    readonly>
                                <button class="btn-style1" id="removeCoupon" style="border-radius: 0px;"
                                    type="submit">x</button>
                            @endif


                        </li>

                        @if (count(Cart::content()) > 0)
                            <li class="list-group-item">
                                <a href="{{ route('checkout.index') }}" class="check-link btn btn-style1">Checkout</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <!-- cart end -->
@endsection


@push('scripts')
    <script>
        // update cart items & counter
        function cartItems() {
            $.ajax({
                type: 'GET',
                url: '{{ route('cart.items') }}',
                success: function(data) {
                    $('.cartItems').html(data);


                    // subtotal
                    $subtotal = $('#sub_total').val();
                    $('.subtotal').text('{{ currencyPosition(':subtotal') }}'.replace(':subtotal', $subtotal));

                    // cart counter
                    let cartCounter = $('#cart_count').val();
                    $(".cart_count").text(cartCounter);
                    $("#bigCounter").text(cartCounter);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseJSON.error);
                }
            })
        }

        // remove cart item
        function removeCartItem(rowId) {

            $.ajax({
                type: 'GET',
                url: '{{ route('cart.remove.item', ':rowId') }}'.replace(":rowId", rowId),
                success: function(res) {
                    cartItems();

                    toastr.success(res.message);

                },

            });
        }
    </script>

    <script>
        // increment
        $('.incrementBtn').on('click', function() {
            let quantity = $(this).siblings('.quantity');
            let rowId = quantity.data('id');
            let currentQuantity = parseInt(quantity.val());
            quantity.val(currentQuantity + 1);

            cartQuantityUpdate(rowId, quantity.val(), function(data) {

                // setup total
                let total = quantity.closest('tr').find('.total');
                total.text('{{ currencyPosition(':productPrice') }}'.replace(':productPrice', data
                    .productPrice));

                quantity.val(data.quantity);

                // subtotal
                $('.subTotal').text('{{ currencyPosition(':subtotal') }}'.replace(':subtotal', data
                    .subtotal));

                $('.finalTotal').text('{{ currencyPosition(':total') }}'.replace(':total', data
                    .grandtotal));

                $('.discount').text('{{ currencyPosition(':discount') }}'.replace(':discount', data
                    .discount));

            });
        });

        // decrement
        $('.decrementBtn').on('click', function() {
            let quantity = $(this).siblings('.quantity');
            let rowId = quantity.data('id');
            let currentQuantity = parseInt(quantity.val());
            if (currentQuantity > 1) {
                quantity.val(currentQuantity - 1);
            }

            cartQuantityUpdate(rowId, quantity.val(), function(data) {

                // setup total
                let total = quantity.closest('tr').find('.total');
                total.text('{{ currencyPosition(':productPrice') }}'.replace(':productPrice', data
                    .productPrice));

                quantity.val(data.quantity);


                // subtotal
                $('.subTotal').text('{{ currencyPosition(':subtotal') }}'.replace(':subtotal', data
                    .subtotal));

                $('.finalTotal').text('{{ currencyPosition(':total') }}'.replace(':total', data
                    .grandtotal));

                $('.discount').text('{{ currencyPosition(':discount') }}'.replace(':discount', data
                    .discount));

            });


        });


        // update cart
        function cartQuantityUpdate(rowId, quantity, callback) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '{{ route('cart.quantity.update') }}',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    if (callback && typeof callback === 'function') {
                        callback(data);
                    }

                    if (data.status == 'error') {
                        toastr.error(data.message);
                    }

                    if (data.status == 'success') {
                        toastr.success(data.message);
                    }
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
        }


        // remove cart
        $('.removeBtn').on('click', function() {
            let rowId = $(this).data('id');
            removeCartItem(rowId);

            $(this).closest('tr').remove();
        });




        // remove cart item
        function removeCartItem(rowId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'GET',
                url: '{{ route('cart.remove.item', ':rowId') }}'.replace(':rowId', rowId),
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    // subtotal
                    $('.subTotal').text('{{ currencyPosition(':subtotal') }}'.replace(':subtotal', data
                        .subtotal));

                    $('.finalTotal').text('{{ currencyPosition(':total') }}'.replace(':total', data
                        .total));

                    $('.discount').text('{{ currencyPosition(':discount') }}'.replace(':discount', data
                        .discount));

                    cartItems();

                    toastr.success(data.message);
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
        }
    </script>
@endpush
