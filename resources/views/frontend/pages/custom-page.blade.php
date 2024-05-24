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
                                <li class="about-p"><span>{{ $page->title }} Page</span></li>
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
            <div class="row ">
                <div class="col-lg-12">
                    <h3 class="text-center mb-4">{{ $page->title }}</h3>

                    <div>
                        <p class="my-5">{!! $page->desc !!}</p>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- blog end -->
@endsection
