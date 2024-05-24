@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create Footer</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.footer.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$footer->email }}" placeholder="Email">
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
                                        value="{{ @$footer->phone }}" placeholder="Phone">
                                    @error('phone')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>

                                <div class="col-lg-12 my-2">
                                    <label>Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$footer->address }}" placeholder="Address">
                                    @error('address')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>




                                <div class="col-lg-12 my-2">
                                    <label>Copyright Text</label>
                                    <textarea name="copyright"
                                        class="form-control @error('copyright')
                                        is-invalid
                                    @enderror">{{ @$footer->copyright }}</textarea>
                                    @error('copyright')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
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
