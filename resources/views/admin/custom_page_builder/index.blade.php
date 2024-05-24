@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.custom_page_builder.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Custom Page List</h3>
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
                                    <th>Slug</th>
                                    <th>Page Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customPages as $sl => $page)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->slug }}</td>
                                        <td>
                                            <code>/pages/{{ $page->slug }}</code>
                                        </td>
                                        <td>{{ $page->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>

                                            <a href="{{ route('admin.custom_page_builder.edit', $page->id) }}"
                                                class="btn btn-primary mx-1 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a href="{{ route('admin.custom_page_builder.show', $page->id) }}"
                                                class="btn btn-info mx-1 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a data-link="{{ route('admin.custom_page_builder.destroy', $page->id) }}"
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
