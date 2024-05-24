@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create Counter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.counter.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Counter Count One</label>
                                    <input type="number" name="counter_count_one"
                                        class="form-control @error('counter_count_one')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$counter->counter_count_one }}" placeholder="Counter Count One">
                                    @error('counter_count_one')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Counter Name One</label>
                                    <input type="text" name="counter_name_one"
                                        class="form-control @error('counter_name_one')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$counter->counter_name_one }}" placeholder="Counter Name One">
                                    @error('counter_name_one')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Counter Count Two</label>
                                    <input type="number" name="counter_count_two"
                                        class="form-control @error('counter_count_two')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$counter->counter_count_two }}" placeholder="Counter Count Two">
                                    @error('counter_count_two')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Counter Name Two</label>
                                    <input type="text" name="counter_name_two"
                                        class="form-control @error('counter_name_two')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$counter->counter_name_two }}" placeholder="Counter Name Two">
                                    @error('counter_name_two')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Counter Count Three</label>
                                    <input type="number" name="counter_count_three"
                                        class="form-control @error('counter_count_three')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$counter->counter_count_three }}" placeholder="Counter Count Three">
                                    @error('counter_count_three')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Counter Name Three</label>
                                    <input type="text" name="counter_name_three"
                                        class="form-control @error('counter_name_three')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$counter->counter_name_three }}" placeholder="Counter Name Three">
                                    @error('counter_name_three')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
                                    <label>Background Image</label>
                                    <input type="file" name="background"
                                        class="form-control @error('background')
                                        is-invalid
                                    @enderror"
                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    @error('background')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror

                                    <div class="my-3">
                                        <img src="{{ asset('/uploads/counter') }}/{{ @$counter->background }}"
                                            id="blah" width="100" alt="">
                                    </div>

                                </div>
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
