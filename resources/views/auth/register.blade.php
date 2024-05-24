@extends('frontend.master')

@section('content')
    <!-- breadcrumb end -->
    <!-- login start -->
    <section class="section-tb-padding"
        style="background-image: url({{ asset('/frontend_assets/image/slider11.jpg') }}); background-size: cover; background-repeat: no-repeat; height: 600px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto">

                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class=" text-white text-center">Register</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div>
                                    <label>Name*</label>
                                    <input type="text" name="name" class="w-100 my-1" placeholder="Name address">
                                    @error('name')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div>
                                    <label>Email*</label>
                                    <input type="text" name="email" class="w-100 my-1" placeholder="Email address">
                                    @error('email')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div>
                                    <label>Password*</label>
                                    <input type="password" name="password" placeholder="Password" class="w-100 my-1">
                                    @error('password')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div>
                                    <label>Confirm Password*</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                        class="w-100 my-1">
                                    @error('password_confirmation')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div class="my-2 d-flex justify-content-between">
                                    <span class="text-sm">Already Registered?</span>

                                    <a href="{{ route('login') }}" class="text-primary">Login</a>

                                </div>

                                <button type="submit" class="btn btn-dark">Signup</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
    <!-- login end -->
@endsection
