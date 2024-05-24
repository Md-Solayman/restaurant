@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Blog List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm" id="myTable"
                            style=" width: 100%;
                        overflow-x: auto;
                        white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $sl => $blog)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            <img src="{{ asset('/uploads/blog') }}/{{ $blog->image }}" alt=""
                                                width="50" height="50">
                                        </td>
                                        <td>{{ $blog->status == 1 ? 'Active' : 'Inactive' }}</td>

                                        <td>

                                            <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                                class="btn btn-primary mx-1 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a href="{{ route('admin.blog.show', $blog->id) }}"
                                                class="btn btn-info mx-1 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a data-link="{{ route('admin.blog.destroy', $blog->id) }}"
                                                class="btn btn-danger mx-1 btn-sm delete">
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
