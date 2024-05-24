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
                            <h3 class=" text-white text-center">Login</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div>
                                    <label>Email*</label>
                                    <input type="text" name="email" class="w-100 my-2" placeholder="Email address">
                                    @error('email')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div>
                                    <label>Password*</label>
                                    <input type="password" name="password" placeholder="Password" class="w-100 my-2">
                                    @error('password')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between my-2">
                                    <span class="text-sm">Haven't any account? <a href="{{ route('register') }}"
                                            class="text-primary">Register</a></span>

                                    <span class="text-sm"><a href="" class="re-password">Forgot
                                            password?</a></span>

                                </div>

                                <button type="submit" class="btn btn-dark">Sign in</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
    <!-- login end -->
@endsection
