@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.reservation_time.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto text-center">Create Reservation Time</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.reservation_time.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Start Time</label>
                                    <div class="input-group" id="timepicker-input-group1">
                                        <input id="timepicker" name="start_time" type="text"
                                            class="form-control @error('start_time')
                                            is-invalid
                                        @enderror"
                                            data-provide="timepicker">
                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                    </div>
                                    @error('start_time')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>End Time</label>
                                    <div class="mb-0">
                                        <div id="timepicker-input-group3" class="input-group">
                                            <input name="end_time" id="timepicker3" type="text"
                                                class="form-control @error('end_time')
                                            is-invalid
                                        @enderror"
                                                data-provide='timepicker'>
                                            <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                        </div>
                                    </div>
                                    @error('end_time')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
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
