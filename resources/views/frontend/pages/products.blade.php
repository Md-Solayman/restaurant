@extends('frontend.master')

@section('content')
    <!-- breadcrumb start -->
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding"
            @if (config('settings.breadcumb_logo') != '') style="background-image: url({{ asset('/uploads/settings') }}/{{ config('settings.breadcumb_logo') }})"
            @else
            style="background-image: url({{ asset('/frontend_assets/image/about-image.jpg') }})" @endif>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <ul class="about-link text-center">
                                <li class="go-home"><a href="{{ route('home') }}">Home</a></li>
                                |
                                <li class="about-p"><span>Products</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- left blog start -->
    <section class="section-tb-padding blog-page">
        <div class="container">
            <div class="row">

                <form action="{{ route('products') }}" method="GET">


                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..."
                                        value="{{ @request()->search }}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <select name="category" class="form-control">
                                    <option value="">All</option>
                                    @foreach ($productCategories as $category)
                                        <option value="{{ $category->name }}" @selected(@request()->category == $category->name)>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-2">
                                <button class="btn-style1" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="col-xl-12 col-lg-12 col-md-12 col-12 my-5">
                    <div class="blog-style-6-right-3-grid">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-3">
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($products->isEmpty())
                                <strong class="text-danger text-center">No Products Found</strong>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="m-auto my-5 col-lg-2">
                {{ $products->links() }}
            </div>

        </div>
    </section>
    <!-- blog end -->
@endsection
