@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.delivery.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Delivery List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Area</th>
                                    <th>Min Time</th>
                                    <th>Max Time</th>
                                    <th>Charge</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliveries as $sl => $delivery)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $delivery->area_name }}</td>
                                        <td>{{ $delivery->min_delivery_time }}</td>
                                        <td>{{ $delivery->max_delivery_time }}</td>
                                        <td>{{ $delivery->delivery_charge }}</td>
                                        <td>{{ $delivery->status == 0 ? 'Inactive' : 'Active' }}</td>
                                        <td>

                                            <a href="{{ route('admin.delivery.edit', $delivery->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a href="{{ route('admin.delivery.show', $delivery->id) }}"
                                                class="btn btn-info mx-2 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.delivery.destroy', $delivery->id) }}"
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
