@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.blog_category.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Blog Category List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm" id="myTable"
                            style=" width: 100%;
                        overflow-x: auto;
                        white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogCategories as $sl => $category)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->status == 0 ? 'Inactive' : 'Active' }}</td>

                                        <td>

                                            <a href="{{ route('admin.blog_category.edit', $category->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a data-link="{{ route('admin.blog_category.destroy', $category->id) }}"
                                                class="btn btn-danger mx-2 btn-sm delete">
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
