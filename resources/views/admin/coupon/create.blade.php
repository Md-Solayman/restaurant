@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.coupon.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto">Create Coupon</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                        value="{{ old('name') }}" placeholder="Name">
                                    @error('name')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Code</label>
                                    <input type="text" name="code"
                                        class="form-control @error('code')
                                            is-invalid
                                        @enderror"
                                        value="{{ old('code') }}" placeholder="Code">
                                    @error('code')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity"
                                        class="form-control @error('quantity')

                                    @enderror"
                                        value="{{ old('quantity') }}" placeholder="Quantity">
                                    @error('quantity')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Min Purchase Amount</label>
                                    <input type="number" name="min_purchase_amount"
                                        class="form-control @error('min_purchase_amount')

                                    @enderror"
                                        value="{{ old('min_purchase_amount') }}" placeholder="Min Purchase Amount">
                                    @error('min_purchase_amount')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Discount Type</label>
                                    <select name="discount_type"
                                        class="form-control @error('discount_type')
                                            is-invalid
                                        @enderror">
                                        <option value="percent" @selected(old('discount_type') == 'percent')>percent</option>
                                        <option value="amount" @selected(old('discount_type') == 'amount')>amount</option>
                                    </select>
                                    @error('discount_type')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Discount</label>
                                    <input type="number" name="discount"
                                        class="form-control @error('discount')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('discount') }}" placeholder="Discount">
                                    @error('discount')
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
                                        <option value="0" @selected(old('status') == 0)>Inactive</option>
                                        <option value="1" @selected(old('status') == 1)>Active</option>
                                    </select>
                                    @error('status')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Expire Date</label>
                                    <input type="date"
                                        class="form-control @error('expire_date')
                                        is-invalid
                                    @enderror"
                                        name="expire_date" value="{{ old('expire_date') }}">
                                    @error('expire_date')
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
