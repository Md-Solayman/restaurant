@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Clear Database</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger d-flex justify-content-between">
                            <div>
                                <p>When you clear the database, all your important data will be removed</p>
                            </div>
                            <div>
                                <form>
                                    <button class="btn btn-sm btn-warning clearDatabaseBtn">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        Clear
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $('.clearDatabaseBtn').on('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {



                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.clear_database.store') }}',

                    success: function(data) {
                        if (data.status == 'success') {
                            toastr.success(data.message);
                        }

                        window.location.reload();
                    },
                    error: function(xhr, status, error) {

                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },

                })
            });
        });
    </script>
@endpush
