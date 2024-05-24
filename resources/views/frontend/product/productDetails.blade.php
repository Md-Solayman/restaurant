@extends('frontend.master')


@section('content')
    <!-- breadcumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-start">
                        <ul class="breadcrumb-url">
                            <li class="breadcrumb-url-li">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-url-li">
                                <span>{{ $product->name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcumb end -->

    <!-- product info start -->
    <section class="section-tb-padding pro-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 pro-image">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-6 col-12 larg-image">

                            <form id="cartForm">
                                @csrf


                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="tab-content">

                                    @foreach ($productGallery as $gallery)
                                        <div class="tab-pane fade" id="image-{{ $gallery->id }}">
                                            <a href="javascript:void(0)" class="long-img">
                                                <figure class="zoom" onmousemove="zoom(event)"
                                                    style="background-image: url({{ asset('/uploads/product/gallery/' . $gallery->image) }})">
                                                    <img src="{{ asset('/uploads/product/gallery') }}/{{ $gallery->image }}"
                                                        class="img-fluid" alt="image"
                                                        style="width: 100%; height: 600px;">
                                                </figure>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                <ul class="nav nav-tabs pro-pag-5-slider owl-carousel owl-theme">
                                    @foreach ($productGallery as $gallery)
                                        <li class="nav-item items">
                                            <a class="nav-link" data-bs-toggle="tab" href="#image-{{ $gallery->id }}">
                                                <img src="{{ asset('/uploads/product/gallery') }}/{{ $gallery->image }}"
                                                    class="img-fluid" id="detailsImg" alt="image"></a>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>




                        <div class="col-xl-7 col-lg-7 col-md-6 col-12 pro-info">
                            <h4>{{ $product->name }}</h4>

                            @if ($averageRating->reviews_avg_rating != '')
                                <div class="rating">
                                    @for ($i = 1; $i <= $averageRating->reviews_avg_rating; $i++)
                                        <i class="fa fa-star d-star"></i>
                                    @endfor

                                    <span>({{ $averageRating->reviews_count }})</span>
                                </div>
                            @endif


                            <div class="pro-price">

                                @if ($product->offer_price != '')
                                    <span class="old-price mx-2">
                                        <del> {{ currencyPosition($product->price) }}</del></span>

                                    <span class="new-price"> {{ currencyPosition($product->offer_price) }}</span>

                                    <input type="hidden" name="base_price" class="base_price"
                                        value="{{ $product->offer_price }}">
                                @else
                                    <span class="new-price"> {{ currencyPosition($product->price) }}</span>

                                    <input type="hidden" name="base_price" class="base_price"
                                        value="{{ $product->price }}">
                                @endif


                            </div>

                            <p>{!! $product->long_description !!}</p>
                            <div class="pro-items">
                                <span class="pro-size">Variants:</span>


                                @if ($variants != '')
                                    <div class="mx-3">
                                        @forelse ($variants as $variant)
                                            <div class="form-group">
                                                <input name="variant" data-price="{{ $variant->price }}" type="radio"
                                                    value="{{ $variant->id }}">
                                                {{ $variant->size_name }}
                                                <span
                                                    style="margin-left: 40px;">{{ currencyPosition($variant->price) }}</span>
                                            </div>
                                        @empty
                                            No Variant
                                        @endforelse
                                    </div>
                                @endif

                            </div>



                            <div class="pro-items">

                                @if ($options != '')
                                    <span class="pro-size">Options:</span>

                                    <div class="mx-3">
                                        @forelse ($options as $option)
                                            <div class="form-group">
                                                <input id="option" name="option[]" data-price={{ $option->price }}
                                                    value="{{ $option->id }}" type="checkbox" class="option">
                                                {{ $option->name }}
                                                <span
                                                    style="margin-left: 40px">{{ currencyPosition($option->price) }}</span>
                                            </div>
                                        @empty
                                            No Options
                                        @endforelse
                                    </div>
                                @endif

                            </div>


                            <div class="pro-qty">
                                <span class="qty">Quantity:</span>
                                <div class="plus-minus">
                                    <span>
                                        <a href="javascript:void(0)" class=" decrement text-black">-</a>
                                        <input type="text" id="quantity" name="quantity" value="1" readonly>
                                        <a href="javascript:void(0)" class=" increment text-black">+</a>
                                    </span>
                                </div>
                            </div>


                            <div class="pro-qty">
                                <span class="qty">Total:</span>
                                <span class="total">
                                    {{ currencyPosition($product->offer_price == '' ? $product->price : $product->offer_price) }}</span>
                            </div>



                            <div class="pro-btn">
                                <a onclick="addWishlist('{{ $product->id }}')" class="btn btn-danger mx-3"><i
                                        class="fa fa-heart"></i></a>

                                @if ($product->quantity > 0)
                                    <button type="submit" class="btn btn-dark cartBtn"><i class="fa fa-shopping-bag"></i>
                                        Add
                                        to
                                        cart</button>
                                @else
                                    <button class="btn btn-danger">
                                        Stock Out</button>
                                @endif



                                <button class="btn btn-primary d-none spinnerBtn" type="button" disabled>

                                </button>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- product info end -->

    <!-- product page tab start -->
    <section class="section-b-padding pro-page-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pro-page-tab">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab-1">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Reviews</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-1">
                                <div class="tab-1content">
                                    <h4>More detail</h4>
                                    <ul class="tab-description">
                                        <li>{!! $product->long_description !!}</li>
                                    </ul>
                                </div>

                            </div>

                            <div class="tab-pane fade show" id="tab-2">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="reviews-title">Customer reviews</h4>

                                        <div class="customer-reviews t-desk-2">
                                            <p class="review-desck">Based on {{ count($ratings) }} reviews</p>
                                        </div>

                                        @foreach ($ratings as $review)
                                            <div class="customer-reviews">
                                                <span class="p-rating">
                                                    @for ($i = 1; $i <= $review->rating; $i++)
                                                        <i class="fa fa-star e-star"></i>
                                                    @endfor
                                                </span>

                                                <span class="reviews-editor">{{ $review->user->name }} </span>
                                                <p class="r-description">{{ $review->review }}</p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="col-lg-8 my-5">
                                        @auth
                                            <div class="card">
                                                <div class="card-header btn-style1">
                                                    <h4 class="text-center">Write a review</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('product_rating.store') }}" method="POST">
                                                        @csrf

                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                        <div class="form-group my-3">
                                                            <label>Select Rating* </label>
                                                            <select name="rating"
                                                                class="form-control @error('rating')
                                                        is-invalid
                                                    @enderror">
                                                                <option value="5">5</option>
                                                                <option value="4">4</option>
                                                                <option value="3">3</option>
                                                                <option value="2">2</option>
                                                                <option value="1">1</option>
                                                            </select>
                                                            @error('rating')
                                                                <strong class="text-danger">
                                                                    {{ $message }}
                                                                </strong>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group my-3">
                                                            <label>Review* </label>
                                                            <textarea name="review"
                                                                class="form-control @error('review')
                                                        is-invalid
                                                    @enderror"
                                                                placeholder="Write your review"></textarea>
                                                            @error('review')
                                                                <strong class="text-danger">
                                                                    {{ $message }}
                                                                </strong>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group my-3">
                                                            <button type="submit" class="btn-style1">Submit</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        @else
                                            <div class="my-5">
                                                <h6>Please Login to write a review. <a href="{{ route('login') }}">Login</a>
                                                </h6>

                                            </div>
                                        @endauth
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product page tab end -->
    <!-- releted product start -->
    <section class="section-b-padding pro-releted">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                    <div class="releted-products owl-carousel owl-theme">

                        @forelse ($relatedProducts as $product)
                            <div class="items">
                                <div class="tred-pro">
                                    <div class="tr-pro-img">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <img class="img-fluid" style="height: 200px; width: 300px;"
                                                src="{{ asset('/uploads/product') }}/{{ $product->image }}"
                                                alt="pro-img1">
                                        </a>
                                    </div>


                                </div>
                                <div class="caption">
                                    <h3><a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                    </h3>


                                    @if ($product->reviews_avg_rating != '')
                                        <div class="rating">
                                            @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                                                <i class="fa fa-star b-star"></i>
                                            @endfor

                                            <span>({{ $product->reviews_count }})</span>
                                        </div>
                                    @endif


                                    <div class="pro-price">
                                        @if ($product->offer_price != '')
                                            <span class="old-price">
                                                <del>{{ currencyPosition($product->price) }}</del></span>

                                            <span class="new-price">{{ currencyPosition($product->offer_price) }}</span>
                                        @else
                                            <span class="new-price">{{ currencyPosition($product->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @empty
                            No Related Product Found
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- releted product end -->
    <!-- quick veiw start -->
    <section class="quick-view">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product quickview</h5>
                        <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"><i
                                class="ion-close-round"></i></a>
                    </div>
                    <div class="quick-veiw-area">
                        <div class="quick-image">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="image-1">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-2">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/prro-page-image01.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-3">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image1-1.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-4">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image1.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-5">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image2.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-6">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image2-2.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-7">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image3.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-8">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image03.jpg" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                            </div>
                            <ul class="nav nav-tabs quick-slider owl-carousel owl-theme">
                                <li class="nav-item items">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#image-1"><img
                                            src="image/pro-page-image/image1.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-2"><img
                                            src="image/pro-page-image/image2.jpg" class="img-fluid" alt="iamge"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-3"><img
                                            src="image/pro-page-image/image3.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-4"><img
                                            src="image/pro-page-image/image4.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-5"><img
                                            src="image/pro-page-image/image5.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-6"><img
                                            src="image/pro-page-image/image6.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-7"><img
                                            src="image/pro-page-image/image8.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-8"><img
                                            src="image/pro-page-image/image7.jpg" class="img-fluid" alt="image"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="quick-caption">
                            <h4>Fresh organic reachter</h4>
                            <div class="quick-price">
                                <span class="new-price">$350.00 USD</span>
                                <span class="old-price"><del>$399.99 USD</del></span>
                            </div>
                            <div class="quick-rating">
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-description">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and</p>
                            </div>
                            <div class="pro-size">
                                <label>Size: </label>
                                <select>
                                    <option>1 ltr</option>
                                    <option>3 ltr</option>
                                    <option>5 ltr</option>
                                </select>
                            </div>
                            <div class="plus-minus">
                                <span>
                                    <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                    <input type="text" name="name" value="1">
                                    <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                </span>
                                <a href="cart.html" class="quick-cart"><i class="fa fa-shopping-bag"></i></a>
                                <a href="wishlist.html" class="quick-wishlist"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- quick veiw end -->
@endsection

@push('scripts')
    <script>
        $('input[name="variant"]').on('change', function() {
            updateCart();
        });


        $('input[name="option[]"]').on('change', function() {
            updateCart();
        })



        $(".increment").on('click', function(e) {
            e.preventDefault();

            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            quantity.val(currentQuantity + 1);
            updateCart();
        });



        $(".decrement").on('click', function(e) {
            e.preventDefault();

            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            if (currentQuantity > 1) {
                quantity.val(currentQuantity - 1);
            }

            updateCart();
        })


        function updateCart() {
            let basePrice = parseFloat($('.base_price').val());
            let optionPrice = 0;
            let totalPrice = 0;
            let variantPrice = 0;
            let amount = parseFloat($('#quantity').val());

            let selectedVariant = $('input[name="variant"]:checked');

            if (selectedVariant.length > 0) {
                variantPrice = parseFloat(selectedVariant.data('price'));
            }

            let selectedOption = $('input[name="option[]"]:checked');

            selectedOption.each(function() {
                optionPrice += parseFloat($(this).data('price'));
            });


            totalPrice += (basePrice + optionPrice + variantPrice) * amount;

            $('.total').text('{{ currencyPosition(':totalPrice') }}'.replace(':totalPrice', totalPrice));

        }
    </script>

    <script>
        $('#cartForm').on('submit', function(e) {
            e.preventDefault();

            // variant validation
            // let selectedSize = $('input[name="variant"]');

            // if (selectedSize.length > 0) {
            //     if ($('input[name="variant"]:checked').val() === undefined) {
            //         toastr.error('Please select a size');
            //     }
            // }


            let formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route('cart.add') }}',
                data: formData,
                success: function(res) {
                    if (res.status === 'error') {
                        toastr.error(res.message);
                    } else {
                        cartItems();
                        toastr.success(res.message);
                    }

                },

                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    console.error(errorMessage);
                    toastr.error(errorMessage);
                }
            });

        });
    </script>

    <script>
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
    </script>

    {{-- remove cart --}}
    <script>
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
        document.addEventListener('DOMContentLoaded', function() {
            const detailsImg = document.querySelector('#detailsImg');
            detailsImg.click();
        });
    </script>
@endpush
