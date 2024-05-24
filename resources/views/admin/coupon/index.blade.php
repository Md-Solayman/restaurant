@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Coupon List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $sl => $coupon)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->quantity }}</td>
                                        <td>{{ $coupon->status == 0 ? 'Inactive' : 'Active' }}</td>
                                        <td>

                                            <a href="{{ route('admin.coupon.edit', $coupon->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a href="{{ route('admin.coupon.show', $coupon->id) }}"
                                                class="btn btn-info mx-2 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.coupon.destroy', $coupon->id) }}"
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
