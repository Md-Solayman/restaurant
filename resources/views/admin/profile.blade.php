@extends('admin.admin')


@section('content')
    <div class="container my-5">
        <div class="row">


            <div class="col-lg-6 my-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Admin</h3>
                    </div>
                    <div class="card-body">
                        @if (Auth::guard('admin')->user()->image == '')
                            <img src="{{ Avatar::create(Auth::guard('admin')->user()->name)->toBase64() }}" class="my-2" />
                        @else
                            <img src="{{ asset('/uploads/admin') }}/{{ Auth::guard('admin')->user()->image }}" class="my-2"
                                width="200" height="200" alt="">
                        @endif
                        <p>Name: {{ Auth::guard('admin')->user()->name }}</p>
                        <p>Email: {{ Auth::guard('admin')->user()->email }}</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 my-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Personal Info</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.info.update') }}" method="POST">
                            @csrf

                            @method('PUT')

                            <div class="form-group my-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}"
                                    class="form-control">
                                @error('name')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ Auth::guard('admin')->user()->email }}"
                                    class="form-control">
                                @error('email')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>


                            <div class="my-3">
                                <button class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 my-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.password.update') }}" method="POST">
                            @csrf

                            @method('PUT')


                            <div class="form-group my-3">
                                <label>New Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                @error('password')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" class="form-control">
                                @error('password_confirmation')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>


                            <div class="my-3">
                                <button class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 my-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Image</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.image.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')

                            <div class="form-group my-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>

                            <div>
                                <img id="blah" width="100" alt="">
                            </div>

                            <div class="my-3">
                                <button class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>



    </div>
@endsection
