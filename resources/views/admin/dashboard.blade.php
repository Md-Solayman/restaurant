@extends('admin.admin')


@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row my-3">

            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Todays Orders</h6>
                        <h2 class="my-2 text-primary" id="active-users-count">{{ $todaysOrders }}</h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-usd" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Todays Earnings</h6>
                        <h2 class="my-2 text-danger" id="active-users-count"> {{ currencyPosition($todaysEarnings) }}</h2>

                    </div> <!-- end card-body-->
                </div>
            </div>



            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">This Month Orders</h6>
                        <h2 class="my-2 text-primary" id="active-users-count">{{ $thisMonthOrders }}</h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-usd" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">This Month Earnings</h6>
                        <h2 class="my-2 text-danger" id="active-users-count"> {{ currencyPosition($thisMonthEarnings) }}
                        </h2>

                    </div> <!-- end card-body-->
                </div>
            </div>



            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">This Year Orders</h6>
                        <h2 class="my-2 text-primary" id="active-users-count">{{ $thisYearOrders }}</h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-usd" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">This Year Earnings</h6>
                        <h2 class="my-2 text-danger" id="active-users-count"> {{ currencyPosition($thisYearEarnings) }}
                        </h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Total Orders</h6>
                        <h2 class="my-2 text-primary" id="active-users-count">{{ $totalOrders }}</h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-cutlery" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Total Products</h6>
                        <h2 class="my-2 text-danger" id="active-users-count"> {{ $totalProducts }}
                        </h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-rss" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Total Blogs</h6>
                        <h2 class="my-2 text-primary" id="active-users-count"> {{ $totalBlogs }}
                        </h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-male" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Total Admins</h6>
                        <h2 class="my-2 text-danger" id="active-users-count"> {{ $totalAdmins }}
                        </h2>

                    </div> <!-- end card-body-->
                </div>
            </div>




            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-user" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Total Users</h6>
                        <h2 class="my-2 text-primary" id="active-users-count"> {{ $totalUsers }}
                        </h2>

                    </div> <!-- end card-body-->
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class="fa fa-users" aria-hidden="true"></i>

                        <h6 class="text-uppercase mt-0">Total Subscribers</h6>
                        <h2 class="my-2 text-danger" id="active-users-count"> {{ $totalSubscribers }}
                        </h2>

                    </div> <!-- end card-body-->
                </div>
            </div>

        </div>


        <div class="row my-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mt-3 text-center">Todays Orders List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm myTable" id="myTable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order Id</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Delivery Charge</th>
                                        <th>Grand Total</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todaysOrdersList as $sl => $order)
                                        <tr>
                                            <td>{{ $sl + 1 }}</td>
                                            <td>{{ $order->invoice_id }}</td>
                                            <td>{{ $order->subtotal }}</td>
                                            <td>{{ $order->discount ?? 0 }}</td>
                                            <td>{{ $order->delivery_charge ?? 0 }}</td>
                                            <td>{{ $order->grand_total }}</td>
                                            <td>
                                                @if ($order->payment_status == 'completed')
                                                    <span class="badge bg-success">{{ $order->payment_status }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($order->order_status == 'delivered')
                                                    <span class="badge bg-success">{{ $order->order_status }}</span>
                                                @elseif($order->order_status == 'processed')
                                                    <span class="badge bg-secondary">{{ $order->order_status }}</span>
                                                @elseif($order->order_status == 'pending')
                                                    <span class="badge bg-warning">{{ $order->order_status }}</span>
                                                @elseif($order->order_status == 'declined')
                                                    <span class="badge bg-danger">{{ $order->order_status }}</span>
                                                @endif
                                            </td>

                                            <td class="d-flex">



                                                <a href="{{ route('admin.order.show', $order->id) }}"
                                                    class="btn btn-primary mx-2 btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>


                                                <a data-id="{{ $order->id }}"
                                                    class="btn btn-info mx-2 btn-sm orderStatusBtn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>



                                                <a href="{{ route('admin.order.destroy', $order->id) }}"
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
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Status Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="submitForm" method="POST">
                        @csrf


                        <div class="row">
                            <div class="col-lg-12 my-2">
                                <label>Payment Status</label>
                                <select name="payment_status" class="form-control paymentStatus">
                                    <option>Payment Status</option>
                                    <option value="pending">pending
                                    </option>
                                    <option value="completed">completed
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-12 my-2">
                                <label>Order Status</label>
                                <select name="order_status" class="form-control orderStatus">
                                    <option>Order Status</option>
                                    <option value="pending">pending
                                    </option>
                                    <option value="processed">processed
                                    </option>
                                    <option value="declined">declined
                                    </option>
                                    <option value="delivered">delivered
                                    </option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        var orderId = '';
        // get data from order table
        $(document).on('click', '.orderStatusBtn', function() {
            let id = $(this).data('id');
            let orderStatus = $('.orderStatus option');
            let paymentStatus = $('.paymentStatus option');

            orderId = id;

            $.ajax({
                method: 'GET',
                url: '{{ route('admin.order.status', ':id') }}'.replace(':id', id),
                beforeSend: function() {
                    $('.submitBtn').prop('disabled', true);
                },
                success: function(data) {
                    paymentStatus.each(function() {
                        if ($(this).val() == data.payment_status) {
                            $(this).attr('selected', 'selected');
                        }
                    });


                    orderStatus.each(function() {
                        if ($(this).val() == data.order_status) {
                            $(this).attr('selected', 'selected');
                        }
                    });

                    $('.submitBtn').prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });


        // update status
        $('.submitForm').on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: '{{ route('admin.order.status.update', ':id') }}'.replace(':id', orderId),
                data: formData,
                success: function(data) {
                    toastr.success(data.message);

                    // close modal
                    $('#exampleModal').modal('hide');

                    // reload page
                    location.reload();
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });
    </script>
@endpush
