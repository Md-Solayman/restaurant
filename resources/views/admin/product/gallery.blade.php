@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Image Gallery</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $sl => $gallery)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('/uploads/product/gallery') }}/{{ $gallery->image }}"
                                                alt="" width="50" height="50" />
                                        </td>
                                        <td>
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.product.gallery.destroy', $gallery->id) }}">X</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Create New</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.gallery.store', $id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group my-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                @error('image')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror

                                <div class="my-3">
                                    <img id="blah" width="100" height="100" alt="">
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <button class="btn btn-primary my-3" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
