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
                                <li class="about-p"><span>About Page</span></li>
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
                    <h3 class="text-center mb-4">{{ @$about->title }}</h3>

                    @if (@$about->image)
                        <div class="image">
                            <img style="width: 100%; height: 500px;" src="{{ asset('/uploads/about/' . @$about->image) }}"
                                alt="">
                        </div>
                    @endif

                    <div>
                        <p class="my-5">{{ @$about->desc }}</p>
                    </div>


                    <div class="my-5">
                        <div class="row">
                            <div class="col-lg-4">
                                <iframe width="400" height="315"
                                    src="https://www.youtube.com/embed/rB9wr8MwjCw?si=Xtff2fezYUnyxdNc"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="col-lg-4">
                                <iframe width="400" height="315"
                                    src="https://www.youtube.com/embed/Rr8Ht_BIhZY?si=0Ie0sV_GFhqSqyCS"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="col-lg-4">
                                <iframe width="400" height="315"
                                    src="https://www.youtube.com/embed/jxVOPjOTKoo?si=LAvcOj4AOx8eN2Po"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- blog end -->
@endsection
