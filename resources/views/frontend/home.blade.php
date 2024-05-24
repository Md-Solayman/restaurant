@extends('frontend.master')



@section('content')
    <!--home page slider start-->
    <section class="slider">
        <div class="home-slider7 owl-carousel owl-theme">
            <div class="items">
                <div class="img-back" style="background-image:url({{ asset('/frontend_assets/image/slider19.jpg') }});">
                    <div class="h-s-content">
                        <span class="slider-slogan">Top selling!</span>
                        <h1>Super broccoli from 100 Tk</h1>
                        <a href="{{ route('products') }}" class="btn btn-style1"><span>Shop now</span></a>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="img-back" style="background-image:url({{ asset('/frontend_assets/image/slider18.jpg') }});">
                    <div class="h-s-content">
                        <span class="slider-slogan">Top selling!</span>
                        <h1>Otas ata pasta 20% off</h1>
                        <a href="{{ route('products') }}" class="btn btn-style1"><span>Shop now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--home page slider start-->
    <!-- service start -->
    <section class="service-7">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="service">
                        <div class="service-box">
                            <div class="s-box">
                                <div class="service-image">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('/frontend_assets/image/s-image01.png') }}" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3>Live drink function</h3>
                                    <span>Unlimited alcoholic drink</span>
                                </div>
                            </div>
                        </div>
                        <div class="service-box">
                            <div class="s-box">
                                <div class="service-image">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('/frontend_assets/image/s-image02.png') }}" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3>Book dinnig table</h3>
                                    <span>Money back guarantee</span>
                                </div>
                            </div>
                        </div>
                        <div class="service-box">
                            <div class="s-box">
                                <div class="service-image">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('/frontend_assets/image/s-image03.png') }}" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3>Master chef dinner</h3>
                                    <span>Alway available timing</span>
                                </div>
                            </div>
                        </div>
                        <div class="service-box">
                            <div class="s-box">
                                <div class="service-image">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('/frontend_assets/image/s-image04.png') }}" class="img-fluid"
                                            alt="image">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3>Balanced diet food</h3>
                                    <span>Food is an important parts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service end -->



    <!-- banner slider start -->
    <section class="category-7 section-top-bottom-padding">
        <div class="container">
            <div class="row">
                <div class="col category-col">
                    <div class="category-main">
                        <div class="cate-7 owl-carousel owl-theme">
                            @foreach ($bannerSliders as $bannerSlider)
                                <div class="items">
                                    <div class="category">
                                        <a class="back-image"
                                            style="background-image: url({{ asset('/uploads/banner_slider') }}/{{ $bannerSlider->image }});">
                                            <div class="cate-content">
                                                <span class="category-title">{{ $bannerSlider->title }}</span>

                                                <h3>{{ $bannerSlider->desc }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner slider end -->
    <!-- Our Products Tab start -->
    <section class="products-tab-7 section-bottom-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <span>Our products</span>
                        <h2>Top recommended dishes</h2>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#all">Starters</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#breakfast">Breakfast</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#dinner">Dinner</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#lunch">Lunch</a>
                            </li>
                        </ul>
                    </div>



                    <div class="tab-content tab-pro-slider">
                        {{-- all menu --}}
                        <div class="tab-pane fade show active" id="all">
                            <div class="home-7-tab swiper-container">
                                <div class="swiper-wrapper">

                                    @php
                                        $products = App\Models\Admin\Product::where('category_id', 1)
                                            ->orWhere('category_id', 2)
                                            ->orWhere('category_id', 3)
                                            ->latest()
                                            ->withAvg('reviews', 'rating')
                                            ->withCount('reviews')
                                            ->get();
                                    @endphp

                                    @foreach ($products as $product)
                                        <div class="swiper-slide">
                                            <div class="h-t-pro">
                                                <div class="tred-pro">
                                                    <div class="tr-pro-img">
                                                        <a href="{{ route('product.details', $product->slug) }}">
                                                            <img style="height: 200px;  width: 300px;"
                                                                src="{{ asset('/uploads/product') }}/{{ $product->image }}"
                                                                class="img-fluid" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="Pro-lable">
                                                        <span class="p-text">New</span>
                                                    </div>
                                                    <div class="pro-icn">

                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <h3><a
                                                            href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                                    </h3>


                                                    {{-- average rating --}}
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
                                                            <span class="old-price"><del>
                                                                    {{ currencyPosition($product->price) }}</del></span>
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->offer_price) }}</span>
                                                        @else
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->price) }}</span>
                                                        @endif

                                                        <a class="form-control btn btn-danger my-3"
                                                            onclick="addWishlist('{{ $product->id }}')">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="content-buttons">
                                    <div class="swiper-button-next" tabindex="0" role="button"
                                        aria-label="Next slide" aria-disabled="false"></div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-disabled="true"></div>
                                </div>
                            </div>
                        </div>


                        {{-- breakfast items --}}
                        <div class="tab-pane fade" id="breakfast">
                            <div class="home-7-tab swiper-container">
                                <div class="swiper-wrapper">

                                    @php
                                        $breakfastProducts = App\Models\Admin\Product::where('category_id', 3)
                                            ->take(8)
                                            ->withAvg('reviews', 'rating')
                                            ->withCount('reviews')
                                            ->get();
                                    @endphp

                                    @foreach ($breakfastProducts as $product)
                                        <div class="swiper-slide">
                                            <div class="h-t-pro">
                                                <div class="tred-pro">
                                                    <div class="tr-pro-img">
                                                        <a href="{{ route('product.details', $product->slug) }}">
                                                            <img style="height: 200px;  width: 300px;"
                                                                src="{{ asset('/uploads/product') }}/{{ $product->image }}"
                                                                class="img-fluid" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="Pro-lable">
                                                        <span class="p-text">New</span>
                                                    </div>
                                                    <div class="pro-icn">

                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <h3><a
                                                            href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                                    </h3>


                                                    {{-- average rating --}}
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
                                                            <span class="old-price"><del>
                                                                    {{ currencyPosition($product->price) }}</del></span>
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->offer_price) }}</span>
                                                        @else
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->price) }}</span>
                                                        @endif

                                                        <a class="form-control btn btn-danger my-3"
                                                            onclick="addWishlist('{{ $product->id }}')">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="content-buttons">
                                    <div class="swiper-button-next" tabindex="0" role="button"
                                        aria-label="Next slide" aria-disabled="false"></div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-disabled="true"></div>
                                </div>
                            </div>
                        </div>

                        {{-- dinner items --}}
                        <div class="tab-pane fade" id="dinner">
                            <div class="home-7-tab swiper-container">
                                <div class="swiper-wrapper">

                                    @php
                                        $dinnerProducts = App\Models\Admin\Product::where('category_id', 1)
                                            ->take(8)
                                            ->withAvg('reviews', 'rating')
                                            ->withCount('reviews')
                                            ->get();
                                    @endphp

                                    @foreach ($dinnerProducts as $product)
                                        <div class="swiper-slide">
                                            <div class="h-t-pro">
                                                <div class="tred-pro">
                                                    <div class="tr-pro-img">
                                                        <a href="product-style-7.html">
                                                            <img style="height: 200px;  width: 300px;"
                                                                src="{{ asset('/uploads/product') }}/{{ $product->image }}"
                                                                class="img-fluid" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="Pro-lable">
                                                        <span class="p-text">New</span>
                                                    </div>
                                                    <div class="pro-icn">

                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <h3><a href="product-style-7.html">{{ $product->name }}</a></h3>


                                                    {{-- average rating --}}
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
                                                            <span class="old-price"><del>
                                                                    {{ currencyPosition($product->price) }}</del></span>
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->offer_price) }}</span>
                                                        @else
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->price) }}</span>
                                                        @endif

                                                        <a class="form-control btn btn-danger my-3"
                                                            onclick="addWishlist('{{ $product->id }}')">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="content-buttons">
                                    <div class="swiper-button-next" tabindex="0" role="button"
                                        aria-label="Next slide" aria-disabled="false"></div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-disabled="true"></div>
                                </div>
                            </div>
                        </div>


                        {{-- lunch items --}}
                        <div class="tab-pane fade" id="lunch">
                            <div class="home-7-tab swiper-container">
                                <div class="swiper-wrapper">

                                    @php
                                        $lunchProducts = App\Models\Admin\Product::where('category_id', 2)
                                            ->take(8)
                                            ->withAvg('reviews', 'rating')
                                            ->withCount('reviews')
                                            ->get();

                                    @endphp

                                    @foreach ($lunchProducts as $product)
                                        <div class="swiper-slide">
                                            <div class="h-t-pro">
                                                <div class="tred-pro">
                                                    <div class="tr-pro-img">
                                                        <a href="product-style-7.html">
                                                            <img style="height: 200px;  width: 300px;"
                                                                src="{{ asset('/uploads/product') }}/{{ $product->image }}"
                                                                class="img-fluid" alt="image">
                                                        </a>
                                                    </div>
                                                    <div class="Pro-lable">
                                                        <span class="p-text">New</span>
                                                    </div>
                                                    <div class="pro-icn">

                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <h3><a href="product-style-7.html">{{ $product->name }}</a></h3>



                                                    {{-- average rating --}}

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
                                                            <span class="old-price"><del>
                                                                    {{ currencyPosition($product->price) }}</del></span>
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->offer_price) }}</span>
                                                        @else
                                                            <span
                                                                class="new-price">{{ currencyPosition($product->price) }}</span>
                                                        @endif


                                                        <a class="form-control btn btn-danger my-3"
                                                            onclick="addWishlist('{{ $product->id }}')">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="swiper-buttons">
                                <div class="content-buttons">
                                    <div class="swiper-button-next" tabindex="0" role="button"
                                        aria-label="Next slide" aria-disabled="false"></div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-disabled="true"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Products Tab end -->

    <!-- News Letter start -->
    <section class="news-letter1">
        <div class="news-7-bg" style="background-image: url(image/layout-7/news-bg3.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home-news">
                            <div class="section-title">
                                <span>Recent news</span>
                                <h2>Get the latest deals</h2>
                            </div>

                            <form id="subscribe-form">
                                <input type="email" class="subscribe-email" name="email"
                                    placeholder="Enter your email address">
                                <button class="news-submit" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News Letter end -->
@endsection

@push('scripts')
    <script>
        $('#subscribe-form').on('submit', function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let email = $('.subscribe-email').val();


            $.ajax({
                type: 'POST',
                url: '{{ route('subscribe.store') }}',
                data: {
                    email: email,
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    toastr.success(data.message);
                    $('#subscribe-form').trigger('reset');
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
@endpush
