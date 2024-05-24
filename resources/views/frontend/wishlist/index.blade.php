@extends('frontend.master')

@section('content')
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding"
            style="background-image: url({{ asset('/frontend_assets/image/about-image.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <h3 class="text-center">Wishlist</h3>
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
                                    class="list-group-item list-group-item-action">Address</a>


                                <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action">My
                                    Orders</a>

                                <a href="{{ route('reservation.list') }}" class="list-group-item list-group-item-action">My
                                    Reservations</a>


                                <a href="{{ route('wishlist') }}"
                                    class="list-group-item list-group-item-action bg-dark text-white">Wishlist</a>
                                <a type="button" class="list-group-item list-group-item-action"
                                    href="{{ route('logout') }}">Logout</a>

                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-12 col-md-12 col-lg-9 col-xl-9" style="margin-bottom: 50px;">

                    <div class="row align-items-center">
                        <div class="card my-3">
                            <div class="card-header bg-dark">
                                <h3 class="text-center text-white">
                                    Wishlists List
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Stock</th>
                                    </tr>
                                    @foreach ($wishlists as $sl => $wishlist)
                                        <tr>
                                            <td>{{ $sl + 1 }}</td>
                                            <td>{{ $wishlist->product->name }}</td>
                                            <td>
                                                @if ($wishlist->product->quantity > 0)
                                                    <span class="badge bg-success">Stock In</span>
                                                @else
                                                    <span class="badge bg-danger">Stock Out</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>




            </div>
        </div>
    </section>
    <!-- ======================= Dashboard Detail End ======================== -->
@endsection
