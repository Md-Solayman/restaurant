@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.delivery.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto text-center">Update Delivery</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.delivery.update', $deliveryarea->id) }}" method="POST">
                            @csrf

                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <label>Area Name</label>
                                    <input type="text" name="area_name"
                                        class="form-control @error('area_name')
                                            is-invalid
                                        @enderror"
                                        value="{{ $deliveryarea->area_name }}" placeholder="Area Name">
                                    @error('area_name')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Min Delivery Time</label>
                                    <input type="text" name="min_delivery_time"
                                        class="form-control @error('min_delivery_time')
                                            is-invalid
                                        @enderror"
                                        value="{{ $deliveryarea->min_delivery_time }}" placeholder="Min Delivery Time">
                                    @error('min_delivery_time')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Max Delivery Time</label>
                                    <input type="text" name="max_delivery_time"
                                        class="form-control @error('max_delivery_time')

                                    @enderror"
                                        value="{{ $deliveryarea->max_delivery_time }}" placeholder="Max Delivery Time">
                                    @error('max_delivery_time')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Delivery Charge</label>
                                    <input type="number" name="delivery_charge"
                                        class="form-control @error('delivery_charge')

                                    @enderror"
                                        value="{{ $deliveryarea->delivery_charge }}" placeholder="Delivery Charge">
                                    @error('delivery_charge')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Status</label>
                                    <select name="status"
                                        class="form-control @error('status')
                                        is-invalid
                                    @enderror">
                                        <option value="0" @selected($deliveryarea->status == 0)>Inactive</option>
                                        <option value="1" @selected($deliveryarea->status == 1)>Active</option>
                                    </select>
                                    @error('status')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
