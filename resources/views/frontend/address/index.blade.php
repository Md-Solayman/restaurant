@extends('frontend.master')

@section('content')
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding"
            style="background-image: url({{ asset('/frontend_assets/image/about-image.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <h3 class="text-center">Address</h3>
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


                                <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action">My
                                    Orders</a>

                                <a href="{{ route('reservation.list') }}" class="list-group-item list-group-item-action">My
                                    Reservations</a>


                                <a href="{{ route('wishlist') }}"
                                    class="list-group-item list-group-item-action">Wishlist</a>
                                <a class="list-group-item list-group-item-action" href="{{ route('logout') }}">Logout</a>

                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-12 col-md-12 col-lg-9 col-xl-9" style="margin-bottom: 50px;">


                    <a href="{{ route('customer.address.create') }}" class="btn btn-dark btn-sm">Create New</a>


                    <div class="row align-items-center">
                        <div class="card my-3">
                            <div class="card-header bg-dark">
                                <h3 class="text-center text-white">
                                    Address List
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Delivery</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($customerAddress as $sl => $address)
                                        <tr>
                                            <td>{{ $sl + 1 }}</td>
                                            <td>{{ $address->delivery->area_name }}</td>
                                            <td>{{ $address->name }}</td>
                                            <td>{{ $address->email }}</td>
                                            <td>{{ $address->phone }}</td>
                                            <td>{{ $address->address }}</td>
                                            <td>{{ $address->address_type }}</td>
                                            <td>
                                                <a data-id="{{ $address->id }}" class="btn btn-primary btn-sm editBtn">
                                                    Edit
                                                </a>


                                                {{-- <a href="{{ route('customer.address.show', $address->id) }}"
                                                    class="btn btn-info mx-2 btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a> --}}

                                                <a data-link="{{ route('customer.address.destroy', $address->id) }}"
                                                    class="btn btn-danger m-1 btn-sm delete">
                                                    x
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>



                <!-- Modal Content -->
                <div class="modal fade col-lg-8" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('customer.address.update') }}" method="POST">
                                @csrf

                                @method('PUT')

                                <input type="hidden" name="id" class="updateId">

                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                            <h3 class="text-center text-white">Create Address</h3>
                                        </div>
                                        <div class="card-body">


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
                                                        class="form-control name @error('name')
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
                                                        class="form-control email @error('email')
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
                                                        class="form-control phone @error('phone')
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
                                                        class="form-control address @error('address')
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
                                                    <input type="radio" name="address_type" id="homeRadio"
                                                        value="Home"> Home
                                                    <input type="radio" name="address_type" id="officeRadio"
                                                        value="Office"> Office


                                                </div>
                                                @error('address_type')
                                                    <strong class="text-danger">
                                                        {{ $message }}
                                                    </strong>
                                                @enderror

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="sumbit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ======================= Dashboard Detail End ======================== -->
@endsection

@push('scripts')


    <script>
        $('.editBtn').on('click', function() {
            let id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $.ajax({
                type: 'POST',
                url: '{{ route('customer.address.edit') }}',
                data: {
                    id: id,
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    // open modal
                    $('#exampleModal').modal('show');

                    // show specific data
                    $('.name').val(data.name);
                    $('.email').val(data.email);
                    $('.phone').val(data.phone);
                    $('.address').val(data.address);
                    $('select[name="delivery_area_id"]').val(data.delivery_area_id);

                    // checked address type
                    if (data.address_type == 'Home') {
                        document.getElementById('homeRadio').checked = true;
                    } else if (data.address_type == 'Office') {
                        document.getElementById('officeRadio').checked = true;
                    }

                    // set hidden value
                    $('.updateId').val(id);

                    console.log(data);
                },
                error: function(xhr, status, error) {
                    hideLoader();
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    hideLoader();
                }
            })
        });
    </script>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif
@endpush
