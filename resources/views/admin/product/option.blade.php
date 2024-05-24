@extends('admin.admin')


@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Product Option</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $sl => $option)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $option->name }}</td>
                                        <td>{{ $option->price }}</td>
                                        <td>
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.product.option.destroy', $option->id) }}">X</a>
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
                        <h3 class="mt-3 text-center">Create Option</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.option.store', $id) }}" method="POST">
                            @csrf

                            <div class="form-group my-3">
                                <label>Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name')
                               is-invalid
                           @enderror">
                                @error('name')
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
