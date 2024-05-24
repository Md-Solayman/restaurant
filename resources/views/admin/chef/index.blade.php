@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.chef.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Chef List</h3>
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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Show Homepage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chefs as $sl => $chef)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $chef->name }}</td>
                                        <td>{{ $chef->title }}</td>
                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/chef') }}/{{ $chef->image }}" alt="">
                                        </td>

                                        <td>{{ $chef->show_homepage == 0 ? 'No' : 'Yes' }}</td>
                                        <td>{{ $chef->status == 0 ? 'Inactive' : 'Active' }}</td>

                                        <td>

                                            <a href="{{ route('admin.chef.edit', $chef->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>


                                            <a href="{{ route('admin.chef.show', $chef->id) }}"
                                                class="btn btn-info mx-2 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>



                                            <a href="{{ route('admin.chef.destroy', $chef->id) }}"
                                                class="btn btn-danger mx-2 btn-sm">
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
