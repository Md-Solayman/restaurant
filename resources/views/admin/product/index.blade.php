@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Product List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $sl => $product)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->price }}</td>

                                        <td>

                                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a href="{{ route('admin.product.show', $product->id) }}"
                                                class="btn btn-info mx-2 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.product.destroy', $product->id) }}"
                                                class="btn btn-danger mx-2 btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>


                                            <a href="{{ route('admin.product.gallery', $product->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">gallery</a>

                                            <a class="btn btn-info mx-2 btn-sm"
                                                href="{{ route('admin.product.variant', $product->id) }}">variants</a>

                                            <a class="btn btn-dark mx-2 btn-sm"
                                                href="{{ route('admin.product.option', $product->id) }}">options</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
