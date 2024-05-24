@extends('frontend.master')

@section('content')
    <div class="container" style="height: 900px;">
        <!-- Start Content-->
        <div class="container-fluid" style="margin-top: 80px;">

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
                                        <p><b>Hello, {{ $order->user->name }}</b></p>
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
                                            {{ $order->payment_approve_date }}</p>
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
                                    <br>
                                    <address>
                                        <b> Address:</b>{{ $order->address }} <br>
                                        <b> Email:</b>{{ $order->addresses->email }} <br>
                                        <b> Phone:</b> {{ $order->addresses->phone }}<br>
                                    </address>
                                </div> <!-- end col-->

                                <div class="col-sm-6">
                                    <h4>Shipping Address</h4>
                                    <br>
                                    <address>
                                        <b> Area:</b> {{ $order->addresses->delivery->area_name }}<br>
                                        <b> Payment Method:</b> <span
                                            class="badge bg-primary mx-2">{{ $order->payment_method }}</span><br>

                                        <b> Payment Status:</b>
                                        payment status

                                        <br>
                                    </address>
                                </div> <!-- end col-->


                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="table table-striped">
                                        <table class="table mt-4">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product</th>
                                                    <th>Unit Price</th>
                                                    <th>Size</th>
                                                    <th>Option</th>
                                                    <th>Quantity</th>
                                                    <th>Product Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderItem as $item)
                                                    @php
                                                        $size = json_decode($item->product_size);
                                                        $options = json_decode($item->product_option);

                                                        $unitPrice = $item->unit_price;
                                                        $sizePrice = @$size->price ?? 0;
                                                        $optionPrice = 0;

                                                        foreach ($options as $option) {
                                                            $optionPrice += @$option->price;
                                                        }

                                                        $productPrice = ($sizePrice + $optionPrice + $unitPrice) * $item->qty;

                                                    @endphp





                                                    <tr>
                                                        <td>{{ ++$loop->index }}</td>
                                                        <td>{{ $item->product_name }}</td>
                                                        <td>{{ currencyPosition($item->unit_price) }}</td>
                                                        <td>{{ @$size->size_name ?? 'NA' }} - {{ @$size->price ?? 'NA' }}
                                                        </td>
                                                        <td>
                                                            @forelse ($options as $option)
                                                                <span>{{ @$option->name }} -
                                                                    {{ @$option->price }}</span><br>
                                                            @empty
                                                                NA
                                                            @endforelse
                                                        </td>
                                                        <td>{{ $item->qty }}</td>
                                                        <td>{{ currencyPosition($productPrice) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row ">

                                <div class="col-lg-12">
                                    <div class="float-end me-5">
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
                                    <a href="javascript:;" class="btn btn-primary printBtn me-5"><i
                                            class="mdi mdi-printer"></i>
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

            // open window
            let printWindow = window.open('', '', 'width=1000, height=800');

            printWindow.document.open();

            printWindow.document.write('<html>');
            printWindow.document.write('<body>');

            printWindow.document.write(printContent);
            printWindow.document.write(
                '<link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/style7.css') }}">'
            );

            printWindow.document.write(
                '<link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/responsive7.css') }}">'
            );


            printWindow.document.write(
                '<link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/bootstrap.min.css') }}">'
            );

            printWindow.document.write('</body>');
            printWindow.document.write('</html>');

            printWindow.document.close();

            printWindow.print();
        });
    </script>
@endpush
