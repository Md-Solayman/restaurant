@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Product Rating List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productRatings as $sl => $productRating)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $productRating->user->name }}</td>
                                        <td>{{ $productRating->product->name }}</td>
                                        <td>{{ $productRating->rating }}</td>
                                        <td>{!! truncate($productRating->review) !!}</td>
                                        <td>
                                            {{ $productRating->status == 1 ? 'Active' : 'Inactive' }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.product_rating.show', $productRating->id) }}"
                                                class="btn btn-info mx-2 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>


                                            <a data-link="{{ route('admin.product_rating.destroy', $productRating->id) }}"
                                                class="btn btn-danger mx-2 btn-sm delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
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


{{-- @push('scripts')
    <script>
        $('body').on('change', '.ratingStatus', function() {
            let ratingStatusValue = $(this).val();
            let productRatingId = $(this).data('id');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: '{{ route('admin.product_rating.status') }}',
                data: {
                    product_rating_id: productRatingId,
                    status: ratingStatusValue,
                }
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    alert(data);

                },
                error: function(xhr, status, error) {
                    hideLoader();
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    hideLoader();
                }
            })
        });
    </script>
@endpush --}}
