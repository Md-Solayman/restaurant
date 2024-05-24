@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.delivery.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Delivery View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Area Name</td>
                                <td>:{{ $deliveryarea->area_name }}</td>
                            </tr>

                            <tr>
                                <td>Min Delivery Time</td>
                                <td>:{{ $deliveryarea->min_delivery_time }}</td>
                            </tr>


                            <tr>
                                <td>Max Delivery Time</td>
                                <td>:{{ $deliveryarea->max_delivery_time }}</td>
                            </tr>

                            <tr>
                                <td>Delivery Charge</td>
                                <td>:{{ $deliveryarea->delivery_charge }}</td>
                            </tr>


                            <tr>
                                <td>Status</td>
                                <td>:{{ $deliveryarea->status == 0 ? 'Inactive' : 'Active' }}</td>
                            </tr>


                        </table>



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
