@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.daily_offer.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto text-center">Update Daily Offer</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.daily_offer.update', $dailyoffer->id) }}" method="POST">
                            @csrf


                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <label>Product</label>
                                    <select name="product_id" id="search" class="form-control select">
                                        <option value="{{ $dailyoffer->product_id }}" selected>
                                            {{ $dailyoffer->product->name }}</option>
                                    </select>
                                    @error('product_id')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
                                    <label>Status</label>
                                    <select name="status"
                                        class="form-control @error('status')
                                        is-invalid
                                    @enderror">
                                        <option value="0" @selected($dailyoffer->status == 0)>Inactive</option>
                                        <option value="1" @selected($dailyoffer->status == 1)>Active</option>
                                    </select>
                                    @error('status')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <button class="btn btn-primary" type="submit">
                                        Update
                                    </button>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        $(document).ready(function() {
            $('#search').select2({
                ajax: {
                    url: '{{ route('admin.daily_offer.search') }}',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },

                    processResults: function(data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: $.map(data, function(product) {
                                return {
                                    id: product.id,
                                    text: product.name,
                                    image_url: product.image,
                                }

                            })
                        };
                    }

                },
                minimumInputLength: 1,
                escapeMarkup: function(m) {
                    return m;
                },
                templateResult: formatProduct,
            })



            function formatProduct(product) {
                var product = $('<span><img src="' + '/uploads/product/' + product.image_url + '" width="30"> ' +
                    product.text + ' </span>');
                return product;
            }
        });
    </script>
@endpush
