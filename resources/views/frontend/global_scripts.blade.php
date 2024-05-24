{{-- toastr notification --}}
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>


<script>
    function getCartPrice() {
        return parseInt('{{ cartTotalPrice() }}');
    }
</script>

{{-- remove cart item --}}
<script>
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


<script>
    // show loader
    function showLoader() {
        $('.overlay-container').removeClass('d-none');
        $('.overlay').addClass('active');
    }

    // hide loader
    function hideLoader() {
        $('.overlay-container').addClass('d-none');
        $('.overlay').removeClass('active');
    }
</script>

{{-- delete --}}
<script>
    $('.delete').on('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                let link = $(this).data('link');
                location.href = link;
            }
        });
    });
</script>


{{-- coupon --}}
<script>
    // coupon apply
    $('#coupon_form').on('submit', function(e) {
        e.preventDefault();

        let coupon = $('#coupon_input').val();

        if (coupon == '') {
            toastr.error('Enter Your Coupon');
        } else {
            applyCoupon(coupon);
        }
    });


    // apply
    function applyCoupon(coupon) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $.ajax({
            type: 'POST',
            url: '{{ route('cart.coupon.apply') }}',
            data: {
                coupon: coupon,
            },
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == 'success') {

                    toastr.success(data.message);

                    // setup subtotal, discount, total
                    $('.subTotal').text('{{ currencyPosition(':subtotal') }}'.replace(':subtotal', data
                        .subtotal));

                    $('.discount').text('{{ currencyPosition(':discount') }}'.replace(':discount', data
                        .discount));

                    $('.finalTotal').text('{{ currencyPosition(':total') }}'.replace(':total', data
                        .total));

                    $('#coupon_form').trigger('reset');


                    // show coupon
                    let couponText = `<input type="text" name="coupon" id="couponCode" class="w-100" value=${data.code}  readonly>
                        <button class="btn-style1" id="removeCoupon" style="border-radius: 0px;"          data-toggle="tooltip" data-placement="top "type="submit">x
                        </button>`;


                    $('#couponTextContainer').html(couponText);
                }

                if (data.status == 'error') {
                    toastr.error(data.message);


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


    // remove coupon
    $(document).on('click', '#removeCoupon', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: '{{ route('cart.coupon.remove') }}',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                $('#couponTextContainer').html("");

                $('.subTotal').text('{{ currencyPosition(':subtotal') }}'.replace(':subtotal', data
                    .subtotal));

                $('.finalTotal').text('{{ currencyPosition(':total') }}'.replace(':total', data
                    .total));

                $('.discount').text('{{ currencyPosition(':discount') }}'.replace(':discount', data
                    .discount));
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
    })
</script>



{{-- wishlist --}}
<script>
    function addWishlist(productId) {
        $.ajax({
            type: 'GET',
            url: '{{ route('wishlist.store', ':productId') }}'.replace(':productId', productId),
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader();

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
</script>
