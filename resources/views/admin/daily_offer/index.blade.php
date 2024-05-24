@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.daily_offer.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Daily Offer List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product</th>
                                    <th>Product Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dailyOffers as $sl => $dailyOffer)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $dailyOffer->product->name }}</td>
                                        <td>
                                            <img width="50"
                                                src="{{ asset('/uploads/product') }}/{{ $dailyOffer->product->image }}"
                                                alt="">
                                        </td>
                                        <td>{{ $dailyOffer->status == 0 ? 'Inactive' : 'Active' }}</td>
                                        <td>

                                            <a href="{{ route('admin.daily_offer.edit', $dailyOffer->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a href="{{ route('admin.daily_offer.destroy', $dailyOffer->id) }}"
                                                class="btn btn-danger mx-2 btn-sm">
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
