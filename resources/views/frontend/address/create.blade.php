@extends('frontend.master')

@section('content')
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding"
            style="background-image: url({{ asset('/frontend_assets/image/about-image.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <h3 class="text-center">Create Address</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================= Dashboard Detail ======================== -->
    <section class="middle" style="margin: 50px 0px;">
        <div class="container">
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
                                <a type="button" class="list-group-item list-group-item-action" aria-current="true"
                                    href="{{ route('dashboard') }}">
                                    Profile
                                </a>
                                <a href="{{ route('customer.address') }}"
                                    class="list-group-item list-group-item-action bg-dark text-white">Address</a>
                                <a type="button" class="list-group-item list-group-item-action">My Orders</a>
                                <a type="button" class="list-group-item list-group-item-action">Wishlist</a>
                                <a type="button" class="list-group-item list-group-item-action"
                                    href="{{ route('logout') }}">Logout</a>

                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-12 col-md-12 col-lg-9 col-xl-9" style="margin-bottom: 50px;">

                    <a href="{{ route('customer.address') }}" class="btn btn-dark my-2 btn-sm">List</a>

                    <div class="row align-items-center">
                        <div class="card my-3">
                            <div class="card-header bg-dark">
                                <h3 class="text-center text-white">
                                    Create Address
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('customer.address.store') }}" method="POST">
                                    @csrf



                                    <div class="row">
                                        <div class="col-lg-12 my-2">
                                            <label>Delivery Area</label>
                                            <select name="delivery_area_id"
                                                class="form-control @error('delivery_area_id')
                                                    is-invalid
                                                @enderror">
                                                <option selected disabled>Delivery Area</option>
                                                @foreach ($deliveryAreas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->area_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-lg-6 my-2">
                                            <label>Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name')
                                                    is-invalid
                                                @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>


                                        <div class="col-lg-6 my-2">
                                            <label>Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email')
                                                    is-invalid
                                                @enderror"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>


                                        <div class="col-lg-6 my-2">
                                            <label>Phone</label>
                                            <input type="number" name="phone"
                                                class="form-control @error('phone')
                                                    is-invalid
                                                @enderror"
                                                value="{{ Old('phone') }}">
                                            @error('phone')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>


                                        <div class="col-lg-6 my-2">
                                            <label>Address</label>
                                            <textarea name="address" cols="10" rows="2"
                                                class="form-control @error('address')
                                                   is-invalid
                                               @enderror">{{ old('address') }}</textarea>
                                            @error('address')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>


                                        <div class="col-lg-6 my-2">
                                            <label>Address Type: </label>
                                            <br>
                                            <input type="radio" name="address_type" value="Home"> Home
                                            <input type="radio" name="address_type" value="Office"> Office


                                        </div>
                                        @error('address_type')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror


                                        <div class="my-3">
                                            <button class="btn btn-dark btn-sm" type="submit">Submit</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- row -->
        </div>


    </section>
    <!-- ======================= Dashboard Detail End ======================== -->
@endsection
