@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create Contact Page</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.contact.store') }}" method="POST">
                            @csrf


                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <label>Phone</label>
                                    <input type="number" name="phone"
                                        class="form-control @error('phone')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$contact->phone }}" placeholder="Phone">
                                    @error('phone')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$contact->email }}" placeholder="Email">
                                    @error('email')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
                                    <label>Map Link</label>
                                    <input type="text" name="map_link"
                                        class="form-control @error('map_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$contact->map_link }}" placeholder="Map Link">
                                    @error('map_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
                                    <label>Address</label>
                                    <textarea name="address"
                                        class="form-control @error('address')
                                        is-invalid
                                    @enderror"
                                        cols="10" rows="3">{{ @$contact->address }}</textarea>
                                    @error('address')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="my-2">
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
