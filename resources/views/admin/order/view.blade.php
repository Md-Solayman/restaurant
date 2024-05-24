@extends('admin.admin')

@section('content')
    <div class="container">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Invoice</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body printContent">

                            <!-- Invoice Logo-->
                            <div class="clearfix">

                                <div class="float-end">
                                    <h4 class="m-0 d-print-none">Invoice</h4>
                                </div>
                            </div>

                            <!-- Invoice Detail-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="float-end mt-3">
                                        <p><b>Hello, {{ $order->addresses->name }}</b></p>
                                        <p class="text-muted font-13">Please find below a cost-breakdown for
                                            the
                                            recent
                                            work completed. Please make payment at your earliest convenience,
                                            and do
                                            not
                                            hesitate to contact me with any questions.</p>
                                    </div>

                                </div><!-- end col -->
                                <div class="col-sm-4 offset-sm-2">
                                    <div class="mt-3 float-sm-end">

                                        <p class="font-13"><strong>Order ID: </strong> <span
                                                class="float-end">#{{ $order->invoice_id }}</span></p>

                                        <p class="font-13"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp;
                                            {{ date('d-F-Y', strtotime($order->payment_approve_date)) }}</p>
                                        <p class="font-13"><strong>Order Status: </strong>

                                            {{-- order status --}}
                                            @if ($order->order_status == 'delivered')
                                                <span class="badge float-end bg-success">{{ $order->order_status }}</span>
                                            @elseif($order->order_status == 'processed')
                                                <span class="badge float-end bg-secondary">{{ $order->order_status }}</span>
                                            @elseif($order->order_status == 'pending')
                                                <span class="badge float-end bg-warning">{{ $order->order_status }}</span>
                                            @elseif($order->order_status == 'declined')
                                                <span class="badge float-end bg-danger">{{ $order->order_status }}</span>
                                            @endif

                                        </p>

                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <h4>Billing Address</h4>
                                    <address>
                                        <b> Address:</b> {{ $order->address }}<br>
                                        <b> Email:</b> {{ $order->addresses->email }}<br>
                                        <b> Phone:</b> {{ $order->addresses->phone }}<br>
                                    </address>
                                </div> <!-- end col-->

                                <div class="col-sm-6">
                                    <h4>Shipping Address</h4>
                                    <address>
                                        <b> Area:</b> {{ $order->addresses->delivery->area_name }}<br>
                                        <b> Payment Method:</b> <span
                                            class="badge bg-primary mx-2">{{ $order->payment_method }}</span><br>

                                        <b> Payment Status:</b>
                                        @if ($order->payment_status == 'completed')
                                            <span class="badge bg-success mx-2">{{ $order->payment_status }}</span>
                                        @elseif ($order->payment_status == 'pending')
                                            <span class="badge bg-danger mx-2">{{ $order->payment_status }}</span>
                                        @endif

                                        <br>
                                    </address>
                                </div> <!-- end col-->


                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product</th>
                                                    <th>Unit Price</th>
                                                    <th>Size</th>
                                                    <th>Option</th>
                                                    <th>Quantity</th>
                                                    <th class="text-end">Product Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($order->orderItem as $item)
                                                    <tr>
                                                        @php
                                                            $size = json_decode($item->product_size);
                                                            $options = json_decode($item->product_option);
                                                        @endphp

                                                        @php
                                                            $qty = $item->qty;
                                                            $unitPrice = $item->unit_price;
                                                            $sizePrice = @$size->price ?? 0;
                                                            $optionPrice = 0;

                                                            foreach ($options as $option) {
                                                                $optionPrice += @$option->price ?? 0;
                                                            }

                                                            $productPrice = ($unitPrice + $sizePrice + $optionPrice) * $qty;
                                                        @endphp

                                                        <td>{{ ++$loop->index }}</td>
                                                        <td>
                                                            {{ $item->product_name }}
                                                        </td>
                                                        <td>
                                                            {{ $item->unit_price }}
                                                        </td>
                                                        <td>
                                                            @if (@$size->size_name == '')
                                                                NA
                                                            @else
                                                                {{ @$size->size_name }} -
                                                                {{ @$size->price }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @forelse ($options as $option)
                                                                {{ @$option->name }} -
                                                                {{ @$option->price }}

                                                            @empty
                                                                NA
                                                            @endforelse
                                                        </td>
                                                        <td>{{ $item->qty }}</td>
                                                        <td class="text-end">
                                                            {{ currencyPosition($productPrice) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="clearfix pt-3">
                                        <form action="{{ route('admin.order.status.update', $order->id) }}" method="POST">
                                            @csrf

                                            <div class="row  d-print-none">
                                                <div class="col-lg-6 my-2">
                                                    <label>Payment Status</label>
                                                    <select name="payment_status" class="form-control">
                                                        <option>Payment Status</option>
                                                        <option value="pending" @selected($order->payment_status == 'pending')>pending
                                                        </option>
                                                        <option value="completed" @selected($order->payment_status == 'completed')>completed
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-6 my-2">
                                                    <label>Order Status</label>
                                                    <select name="order_status" class="form-control">
                                                        <option>Order Status</option>
                                                        <option value="pending" @selected($order->order_status == 'pending')>pending
                                                        </option>
                                                        <option value="processed" @selected($order->order_status == 'processed')>processed
                                                        </option>
                                                        <option value="declined" @selected($order->order_status == 'declined')>declined
                                                        </option>
                                                        <option value="delivered" @selected($order->order_status == 'delivered')>delivered
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="my-2">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="float-end mt-3 mt-sm-0">
                                        <p>
                                            <b>Subtotal:</b>
                                            <span class="float-end">{{ currencyPosition($order->subtotal) }}</span>
                                        </p>

                                        <p>
                                            <b>Discount:</b>
                                            <span class="float-end">{{ currencyPosition($order->discount) }}</span>
                                        </p>

                                        <p>
                                            <b>Delivery:</b>
                                            <span class="float-end">{{ currencyPosition($order->delivery_charge) }}</span>
                                        </p>

                                        <p>
                                            <b>Total:</b>
                                            <span class="float-end">{{ currencyPosition($order->grand_total) }}</span>
                                        </p>

                                    </div>
                                    <div class="clearfix"></div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->

                            <div class="d-print-none mt-4">
                                <div class="text-end">
                                    <a href="javascript:;" class="btn btn-primary printBtn"><i class="mdi mdi-printer"></i>
                                        Print</a>

                                </div>
                            </div>
                            <!-- end buttons -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card -->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container -->
    </div>
@endsection

@push('scripts')
    <script>
        $('.printBtn').on('click', function() {
            let printContent = $('.printContent').html();
            let printWindow = window.open('', '', 'width=1000, height=800');

            printWindow.document.open();

            printWindow.document.write('<html>');
            printWindow.document.write('<body>');

            printWindow.document.write(printContent);

            printWindow.document.write(
                '<link href="{{ asset('/admin_assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />'
            );

            printWindow.document.write('</body>');
            printWindow.document.write('</html>');

            printWindow.document.close();
            printWindow.print();
        });
    </script>
@endpush
