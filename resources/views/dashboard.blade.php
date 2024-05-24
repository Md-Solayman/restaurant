@extends('frontend.master')

@section('content')
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding"
            style="background-image: url({{ asset('/frontend_assets/image/about-image.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <h3 class="text-center">Profile</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================= Dashboard Detail ======================== -->
    <section class="middle" style="margin: 50px 0px;">
        <div class="container">

            <div class="row my-5">
                <div class="col-lg-3">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            <h6 class="text-uppercase mt-0">Total Orders</h6>
                            <h2 class="my-2 text-primary" id="active-users-count">{{ $totalOrders }}</h2>

                        </div> <!-- end card-body-->
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            <h6 class="text-uppercase mt-0">Completed Orders</h6>
                            <h2 class="my-2 text-danger" id="active-users-count">{{ $completedOrders }}</h2>

                        </div> <!-- end card-body-->
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            <h6 class="text-uppercase mt-0">Pending Orders</h6>
                            <h2 class="my-2 text-warning" id="active-users-count">{{ $pendingOrders }}</h2>

                        </div> <!-- end card-body-->
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            <h6 class="text-uppercase mt-0">Processed Orders</h6>
                            <h2 class="my-2 text-warning" id="active-users-count">{{ $processedOrders }}</h2>

                        </div> <!-- end card-body-->
                    </div>
                </div>
            </div>

            <div class="row align-items-start justify-content-between">

                <div class="col-12 col-md-12 col-lg-3 col-xl-3 text-center miliods">
                    <div class="d-block border rounded mfliud-bot">
                        <div class="dashboard_author px-2 py-5">
                            <div class="dash_auth_thumb circle p-1 border d-inline-flex mx-auto mb-3">

                                @if (Auth::user()->image == null)
                                    <img width="50" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"
                                        alt="" class="my-2">
                                @else
                                    <img src="{{ asset('/uploads/user') }}/{{ Auth::user()->image }}"
                                        class="rounded-circle my-2" width="100" height="100" alt="" />
                                @endif


                            </div>
                            <div class="dash_caption">
                                <h4 class="text-left lh-1">{{ Auth::user()->name }}</h4>
                                <p class="text-left my-2">{{ Auth::user()->email }}</p>
                                <p class="text-left text-muted my-2">
                                    Country: {{ Auth::user()->country == '' ? 'NA' : Auth::user()->country }}</p>
                                <p class="text-left text-muted my-2">
                                    Address: {{ Auth::user()->address == '' ? 'NA' : Auth::user()->address }}</p>
                            </div>
                        </div>

                        <div class="dashboard_author" style="padding-top: 50px;">


                            <div class="list-group">
                                <a type="button" class="list-group-item list-group-item-action bg-dark text-white"
                                    aria-current="true" href="{{ route('dashboard') }}">
                                    Profile
                                </a>
                                <a href="{{ route('customer.address') }}"
                                    class="list-group-item list-group-item-action">Address</a>

                                <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action">My
                                    Orders</a>



                                <a href="{{ route('wishlist') }}"
                                    class="list-group-item list-group-item-action">Wishlist</a>
                                <a type="button" class="list-group-item list-group-item-action"
                                    href="{{ route('logout') }}">Logout</a>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-9 col-xl-9" style="margin-bottom: 50px;">
                    <!-- row -->
                    <div class="row align-items-center">
                        <form class="row m-0" action="{{ route('profile.update') }}" method="POST">
                            @csrf



                            <div class="col-lg-6 my-2">
                                <div class="form-group">
                                    <label>Full Name *</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ Auth::user()->name }}" />

                                    @error('name')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-lg-6 my-2">
                                <div class="form-group">
                                    <label>Email Address *</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ Auth::user()->email }}" />
                                    @error('email')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>New Password *</label>
                                    <input type="password" class="form-control" name="password" />
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 my-2 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Country *</label>
                                    <input type="text" class="form-control" name="country"
                                        value="{{ Auth::user()->country == '' ? old('country') : Auth::user()->country }}" />
                                    @error('country')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 my-2 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Address *</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ Auth::user()->address == '' ? old('address') : Auth::user()->address }}" />
                                    @error('address')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                            </div>





                            <div class="col-lg-12 my-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark">Update</button>
                                </div>
                            </div>

                        </form>


                        <form action="{{ route('profile.image.update') }}" method="POST" style="margin-top: 20px;"
                            enctype="multipart/form-data">
                            @csrf



                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Image *</label>
                                    <input type="file" class="form-control" name="image"
                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    @error('image')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div class="my-3">
                                    <img id="blah" width="100" height="100" alt="">
                                </div>
                            </div>

                            <button class="btn btn-dark my-3" type="submit">Update</button>

                        </form>
                    </div>
                    <!-- row -->
                </div>

            </div>
        </div>
    </section>
    <!-- ======================= Dashboard Detail End ======================== -->
@endsection
