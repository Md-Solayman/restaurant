@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-8 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Testimonial View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>:{{ $testimonial->name }}</td>
                            </tr>

                            <tr>
                                <td>Title</td>
                                <td>:{{ $testimonial->title }}</td>
                            </tr>


                            <tr>
                                <td>Review</td>
                                <td>:{{ $testimonial->desc }}</td>
                            </tr>

                            <tr>
                                <td>Rating</td>
                                <td>:
                                    @for ($i = 1; $i <= $testimonial->count; $i++)
                                        <i class="fa fa-star b-star"></i>
                                    @endfor
                                </td>
                            </tr>


                            <tr>
                                <td>Show Homepage</td>
                                <td>:{{ $testimonial->show_homepage == 1 ? 'Yes' : 'No' }}</td>
                            </tr>


                            <tr>
                                <td>Status</td>
                                <td>:{{ $testimonial->status == 0 ? 'Inactive' : 'Active' }}</td>
                            </tr>

                            <tr>
                                <td>Image</td>
                                <td>:<img src="{{ asset('/uploads/testimonial') }}/{{ $testimonial->image }}" alt=""
                                        width="100" height="100" class="mx-1"></td>
                            </tr>


                        </table>



                    </div>
                </div>
            </div>



            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Status Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.testimonial.status', $testimonial->id) }}" class="my-3"
                            method="POST">
                            @csrf

                            <div class="col-lg-12">
                                <label>Change Status</label>
                                <select name="status"
                                    class="form-control @error('status')
                                is-invalid
                            @enderror">
                                    <option disabled selected>Status</option>
                                    <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                </select>

                                @error('status')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>



                            <div class="col-lg-12 my-2">
                                <label>Show Homepage</label>
                                <select name="show_homepage"
                                    class="form-control @error('show_homepage')
                                    is-invalid
                                @enderror">
                                    <option value="0" {{ $testimonial->show_homepage == 0 ? 'selected' : '' }}>No
                                    </option>
                                    <option value="1" {{ $testimonial->show_homepage == 1 ? 'selected' : '' }}>Yes
                                    </option>
                                </select>
                                @error('show_homepage')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>




                            <div class="my-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
