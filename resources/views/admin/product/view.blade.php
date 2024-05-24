@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-8 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Product View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>:{{ $product->name }}</td>
                            </tr>

                            <tr>
                                <td>Category</td>
                                <td>:{{ $product->category->name }}</td>
                            </tr>


                            <tr>
                                <td>Quantity</td>
                                <td>:{{ $product->quantity }}</td>
                            </tr>

                            <tr>
                                <td>Short Description</td>
                                <td>:{{ $product->short_description }}</td>
                            </tr>

                            <tr>
                                <td>Long Description</td>
                                <td>:{!! $product->long_description !!}</td>
                            </tr>

                            <tr>
                                <td>Price</td>
                                <td>:{{ $product->price }}</td>
                            </tr>

                            <tr>
                                <td>Offer Price</td>
                                <td>:{{ $product->offer_price != '' ? $product->offer_price : 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Seo Title</td>
                                <td>:{{ $product->seo_title != '' ? $product->seo_title : 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Seo Description</td>
                                <td>:{{ $product->seo_description != '' ? $product->seo_description : 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Show Homepage</td>
                                <td>:{{ $product->show_homepage == 1 ? 'Yes' : 'No' }}</td>
                            </tr>


                            <tr>
                                <td>Status</td>
                                <td>:{{ $product->status == 0 ? 'Inactive' : 'Active' }}</td>
                            </tr>

                            <tr>
                                <td>Image</td>
                                <td>:<img src="{{ asset('/uploads/product') }}/{{ $product->image }}" alt=""
                                        width="100" height="100" class="mx-1"></td>
                            </tr>


                        </table>



                    </div>
                </div>
            </div>



            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Status Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.status', $product->id) }}" class="my-3" method="POST">
                            @csrf


                            <div class="my-3">
                                <label>Change Status</label>
                                <select name="status"
                                    class="form-control @error('status')
                                    is-invalid
                                @enderror">
                                    <option disabled selected>Status</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                </select>

                                @error('status')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>


                            <div class="my-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
