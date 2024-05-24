@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Comment List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm" id="myTable"
                            style=" width: 100%;
                        overflow-x: auto;
                        white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Blog</th>
                                    <th>User</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogComments as $sl => $comment)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $comment->blog->title }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ truncate($comment->comment) }}</td>
                                        <td>
                                            @if ($comment->status == 0)
                                                <span class="badge bg-dark">Pending</span>
                                            @elseif ($comment->status == 1)
                                                <span class="badge bg-success">Approved</span>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.blog.comment.status', $comment->id) }}"
                                                class="btn btn-info mx-1 btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a data-link="{{ route('admin.blog.comment.destroy', $comment->id) }}"
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
