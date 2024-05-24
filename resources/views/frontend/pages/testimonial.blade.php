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
                                <li class="about-p"><span>Testimonials</span></li>
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

                @forelse ($testimonials as $testimonial)
                    <div class="col-lg-3 my-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="items" style="height: 350px;">
                                    <div class="h-t-pro">
                                        <div class="tred-pro">
                                            <div class="tr-pro-img"
                                                style="display: flex; justify-content: center; align-items: center;">
                                                <div class="img-container">
                                                    <img src="{{ asset('/uploads/testimonial') }}/{{ $testimonial->image }}"
                                                        class="img-circle" alt="person">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="caption">
                                            <h4 class="text-center">{{ $testimonial->name }}
                                            </h4>

                                            <span class="text-center text-danger">{{ $testimonial->title }}
                                            </span>

                                            <blockquote class="my-3">
                                                {{ $testimonial->desc }}
                                            </blockquote>

                                            <div class="rating">
                                                @for ($i = 1; $i <= $testimonial->count; $i++)
                                                    <i class="fa fa-star b-star"></i>
                                                @endfor
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @empty
                    <p class="text-center text-danger">No Testimonials Found</p>
                @endforelse


            </div>
        </div>


    </section>
    <!-- login end -->
@endsection
