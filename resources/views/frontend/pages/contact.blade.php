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


    <section class="contact section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="map-title">
                    <h1 class="text-center">Contact us</h1>
                </div>


                <div class="col-lg-11 m-auto my-3">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-info">
                                <div class="contact-details">
                                    <h4>Drop us message</h4>
                                    <form action="{{ route('contact.message.send') }}" method="POST">
                                        @csrf


                                        <div class="my-3 form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Name"
                                                class="form-control my-1 @error('name')
                                                    is-invalid
                                                @enderror">
                                            @error('name')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>


                                        <div class="my-3 form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Email"
                                                class="form-control my-1 @error('email')
                                                    is-invalid
                                                @enderror">
                                            @error('email')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>

                                        <div class="my-3 form-group">
                                            <label>Subject</label>
                                            <input type="text" name="subject" placeholder="Subject"
                                                class="form-control my-1 @error('subject')
                                                    is-invalid
                                                @enderror">
                                            @error('subject')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>


                                        <div class="my-3 form-group">
                                            <label>Message</label>
                                            <textarea rows="3" name="message"
                                                placeholder="Your message hare..."class="form-control my-1 @error('message')
                                                is-invalid
                                            @enderror"></textarea>
                                            @error('message')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>

                                        <div class="form-group my-3">
                                            <button type="submit" class="btn-style1">Submit
                                                <i class="ti-arrow-right"></i></button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="contact-info">
                                <div class="information">
                                    <h4>Get in touch</h4>
                                    <div class="contact-in">
                                        <ul class="info-details my-3">
                                            <li>
                                                <h4><i class="fa fa-street-view"></i> Address</h4>
                                                <p>{{ @$contact->address }}</p>
                                            </li>
                                        </ul>

                                        <ul class="info-details  my-3">

                                            <li>
                                                <h4><i class="fa fa-phone"></i> Phone</h4>
                                                <a href="tel:12345678999">{{ @$contact->phone }}</a>
                                            </li>
                                        </ul>

                                        <ul class="info-details  my-3">
                                            <li>
                                                <h4><i class="fa fa-envelope"></i> Email</h4>
                                                <a href="mailto:{{ @$contact->email }}">{{ @$contact->email }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- map area end -->
@endsection
