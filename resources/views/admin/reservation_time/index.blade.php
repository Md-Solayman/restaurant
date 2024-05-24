@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.reservation_time.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Reservation Time List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservationTime as $sl => $reservation)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $reservation->start_time }}</td>
                                        <td>{{ $reservation->end_time }}</td>
                                        <td>{{ $reservation->status == 0 ? 'Inactive' : 'Active' }}</td>
                                        <td>

                                            <a href="{{ route('admin.reservation_time.edit', $reservation->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <a href="{{ route('admin.reservation_time.destroy', $reservation->id) }}"
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
