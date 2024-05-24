@extends('admin.admin')

@section('content')
    <div class="container my-5">
        <div class="col-lg-8 m-auto col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @method('PUT')



                        <div class="form-group mb-3">
                            <input type="text" name="name" value="{{ $category->name }}"
                                class="form-control @error('name')
                                is-invalid
                            @enderror">
                            @error('name')
                                <strong class="text-danger">
                                    {{ $message }}</strong>
                                </strong>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="file" name="image"
                                class="form-control @error('image')
                                is-invalid
                            @enderror"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            @error('image')
                                <strong class="text-danger">
                                    {{ $message }}</strong>
                                </strong>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <img width="200" src="{{ asset('/uploads/category') }}/{{ $category->image }}" id="blah"
                                alt="">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
