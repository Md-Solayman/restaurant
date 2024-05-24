@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">


            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Product Size</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Size Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variants as $sl => $variant)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $variant->size_name }}</td>
                                        <td>{{ $variant->price }}</td>
                                        <td>
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.product.variant.destroy', $variant->id) }}">X</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Create Variant</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.variant.store', $id) }}" method="POST">
                            @csrf

                            <div class="form-group my-3">
                                <label>Size Name</label>
                                <input type="text" name="size_name"
                                    class="form-control @error('size_name')
                                   is-invalid
                               @enderror">
                                @error('size_name')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror

                            </div>


                            <div class="form-group my-3">
                                <label>Price</label>
                                <input type="number" name="price"
                                    class="form-control @error('price')
                                   is-invalid
                               @enderror">
                                @error('price')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror


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
