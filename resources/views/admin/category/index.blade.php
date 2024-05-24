@extends('admin.admin')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Category List</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-sm" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($categories as $sl => $category)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <img class="rounded-circle" width="70" height="70"
                                            src="{{ asset('/uploads/category') }}/{{ $category->image }}" alt="">
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="btn-sm btn btn-primary">Edit</a>

                                            {{-- <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                method="POST">

                                                @csrf

                                                @method('DELETE')
                                                <button type="submit" class="btn-sm btn btn-danger">Delete</button>

                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Create New</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="form-group my-2">
                                <label>Category Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Category Name">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <label>Category Image</label>
                                <input type="file"
                                    class="form-control @error('image')
                                    is-invalid
                                @enderror"
                                    name="image"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <img width="100" id="blah" alt="">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
