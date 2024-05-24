@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.product_rating.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-8 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Product Rating View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Customer</td>
                                <td>:{{ $productRating->user->name }}</td>
                            </tr>


                            <tr>
                                <td>Product</td>
                                <td>:{{ $productRating->product->name }}</td>
                            </tr>

                            <tr>
                                <td>Rating</td>
                                <td>:{{ $productRating->rating }}</td>
                            </tr>

                            <tr>
                                <td>Review</td>
                                <td>:{!! $productRating->review !!}</td>
                            </tr>


                            <tr>
                                <td>Status</td>
                                <td>:{{ $productRating->status == 0 ? 'Inactive' : 'Active' }}</td>
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
                        <form action="{{ route('admin.product_rating.status', $productRating->id) }}" class="my-3"
                            method="POST">
                            @csrf


                            <div class="my-3">
                                <label>Rating</label>
                                <select name="rating"
                                    class="form-control @error('rating')
                                is-invalid
                            @enderror">
                                    <option value="5" {{ $productRating->rating == 5 ? 'selected' : '' }}>5</option>
                                    <option value="4" {{ $productRating->rating == 4 ? 'selected' : '' }}>4</option>
                                    <option value="3" {{ $productRating->rating == 3 ? 'selected' : '' }}>3</option>
                                    <option value="2" {{ $productRating->rating == 2 ? 'selected' : '' }}>2</option>
                                    <option value="1" {{ $productRating->rating == 1 ? 'selected' : '' }}>1</option>

                                </select>
                            </div>


                            <div class="my-3">
                                <label>Change Status</label>
                                <select name="status"
                                    class="form-control @error('status')
                                is-invalid
                            @enderror">
                                    <option value="0" {{ $productRating->status == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="1" {{ $productRating->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                </select>

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
