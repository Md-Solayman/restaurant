@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Reservation List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Reservation ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Total Person</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $sl => $reservation)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $reservation->reservation_id }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->phone }}</td>
                                        <td>{{ date('d m Y', strtotime($reservation->date)) }}</td>
                                        <td>{{ $reservation->reservation_time->start_time }} -
                                            {{ $reservation->reservation_time->end_time }}</td>

                                        <td>{{ $reservation->total_person }}</td>
                                        <td>
                                            <form>
                                                @csrf

                                                <select name="status" class="form-control reservation-status"
                                                    data-id="{{ $reservation->id }}">
                                                    <option value="Pending" @selected($reservation->status == 'Pending')>Pending</option>

                                                    <option value="Approve" @selected($reservation->status == 'Approve')>Approve</option>

                                                    <option value="Complete" @selected($reservation->status == 'Complete')>Complete</option>
                                                </select>
                                            </form>
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

@push('scripts')
    <script>
        $('.reservation-status').on('change', function() {

            let status = $(this).val();
            let reservationId = $(this).data('id');


            $.ajax({
                type: 'POST',
                url: '{{ route('admin.reservation.update') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    status: status,
                    id: reservationId,
                },
                success: function(data) {
                    toastr.success(data.message);

                },
                error: function(xhr, status, error) {

                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                }
            });
        });
    </script>
@endpush
