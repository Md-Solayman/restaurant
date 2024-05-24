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
                                <li class="go-home"><a href="{{ route('home') }}l">Home</a></li>
                                |
                                <li class="about-p"><span>Chef</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->


    <section class="section-tb-padding" style="height: 1200px;">
        <div class="container">
            <div class="row">
                @foreach ($chefs as $chef)
                    <div class="col-lg-3 mb-5">
                        <div class="items">
                            <div class="h-t-pro">
                                <div class="tred-pro">
                                    <div class="tr-pro-img" style="background-color: #eae7e2;">
                                        <a href="product-style-7.html">
                                            <img src="{{ asset('/uploads/chef') }}/{{ $chef->image }}" class="img-fluid"
                                                alt="image" style="height: 350px;">
                                        </a>
                                    </div>

                                    <div class="pro-icn">
                                        @if ($chef->fb_link)
                                            <a href="{{ $chef->fb_link }}" class="w-c-q-icn mx-2" target="_blank">
                                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                            </a>
                                        @endif


                                        @if ($chef->twitter_link)
                                            <a href="{{ $chef->twitter_link }}" class="w-c-q-icn mx-2" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        @endif


                                        @if ($chef->linkedin_link)
                                            <a href="{{ $chef->linkedin_link }}" class="w-c-q-icn mx-2" target="_blank">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                        @endif


                                        @if ($chef->website_link)
                                            <a href="{{ $chef->website_link }}" class="w-c-q-icn mx-2" target="_blank">
                                                <i class="fa fa-chrome" aria-hidden="true"></i>
                                            </a>
                                        @endif


                                    </div>
                                </div>
                                <div class="caption">
                                    <h3 class="badge bg-danger">{{ $chef->title }}</h3>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </section>
    <!-- login end -->
@endsection
