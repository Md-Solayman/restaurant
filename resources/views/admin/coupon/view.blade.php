@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.coupon.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Coupon View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>:{{ $coupon->name }}</td>
                            </tr>

                            <tr>
                                <td>Code</td>
                                <td>:{{ $coupon->code }}</td>
                            </tr>


                            <tr>
                                <td>Quantity</td>
                                <td>:{{ $coupon->quantity }}</td>
                            </tr>

                            <tr>
                                <td>Min Purchase Amount</td>
                                <td>:{{ $coupon->min_purchase_amount }}</td>
                            </tr>

                            <tr>
                                <td>Discount Type</td>
                                <td>:{{ $coupon->discount_type }}</td>
                            </tr>

                            <tr>
                                <td>Discount</td>
                                <td>:{{ $coupon->discount }}</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>:{{ $coupon->status == 0 ? 'Inactive' : 'Active' }}</td>
                            </tr>


                        </table>



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
