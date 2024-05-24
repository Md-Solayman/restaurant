@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Testimonial List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Show Homepage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $sl => $testimonial)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->title }}</td>
                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/testimonial') }}/{{ $testimonial->image }}"
                                                alt="">
                                        </td>
                                        <td>{{ $testimonial->status == 0 ? 'Inactive' : 'Active' }}</td>

                                        <td>{{ $testimonial->show_homepage == 0 ? 'No' : 'Yes' }}</td>

                                        <td>

                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                class="btn btn-primary mx-1 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <a href="{{ route('admin.testimonial.show', $testimonial->id) }}"
                                                class="btn btn-info mx-1 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>


                                            <a href="{{ route('admin.testimonial.destroy', $testimonial->id) }}"
                                                class="btn btn-danger mx-1 btn-sm">
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
@endsection
