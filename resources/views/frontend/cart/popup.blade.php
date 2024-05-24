<div class="popup-content" style="margin-top: 40px;">
    <!-- popup close button  start -->
    <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" class="close-btn"><i
            class="ion-close-round"></i></a>
    <!-- popup close button end -->


    <section class="section-tb-padding pro-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 pro-image">
                    <div class="row">


                        <div class="col-lg-4 col-xl-4 col-md-6 col-sm-12">
                            <img width="100" height="100"
                                src="{{ asset('/uploads/product') }}/{{ $product->image }}" alt="">
                        </div>

                        @php
                            $variants = App\Models\Admin\ProductVariant::where('product_id', $product->id)->get();

                            $options = App\Models\Admin\ProductOption::where('product_id', $product->id)->get();
                        @endphp

                        <div class="col-xl-8 col-lg-8 col-md-6 col-12 pro-info">
                            <h4>{{ $product->name }}</h4>

                            <div class="rating">
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>

                            <div class="pro-price">



                                @if ($product->offer_price != '')
                                    <span class="new-price">
                                        {{ currencyPosition($product->offer_price) }}</span>
                                    <span class="old-price">
                                        <del> {{ currencyPosition($product->price) }}</del></span>
                                @else
                                    <span class="new-price"> {{ currencyPosition($product->price) }}</span>
                                @endif


                            </div>

                            <p>{!! $product->long_description !!}</p>
                            <div class="pro-items">
                                <span class="pro-size">Variants:</span>


                                @if ($variants != '')
                                    <div class="mx-3">
                                        @forelse ($variants as $variant)
                                            <div class="form-group">
                                                <input name="variant" value={{ $variant->price }} type="radio"
                                                    id="{{ $variant->id }}">
                                                {{ $variant->size_name }}
                                            </div>
                                        @empty
                                            No Variant
                                        @endforelse
                                    </div>
                                @endif

                            </div>



                            <div class="pro-items">

                                @if ($options != '')
                                    <span class="pro-size">Options</span>

                                    <div class="mx-3">
                                        @forelse ($options as $option)
                                            <div class="form-group">
                                                <input name="option" value={{ $option->price }} type="radio"
                                                    id="{{ $option->id }}"> {{ $option->name }}
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
                                        <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                        <input type="text" name="name" value="1">
                                        <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                    </span>
                                </div>
                            </div>


                            <div class="pro-qty">
                                <span class="qty">Total:</span>
                                <span>400</span>
                            </div>

                            <div class="pro-btn">
                                <a href="wishlist.html" class="btn btn-style1"><i class="fa fa-heart"></i></a>
                                <a href="cart-2.html" class="btn btn-style1"><i class="fa fa-shopping-bag"></i>
                                    Add to
                                    cart</a>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- popup content area end -->
</div>
