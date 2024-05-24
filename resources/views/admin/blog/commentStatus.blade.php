@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.blog.comment') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-8 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Comment View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Blog</td>
                                <td>:{{ $comment->blog->title }}</td>
                            </tr>

                            <tr>
                                <td>User</td>
                                <td>:{{ $comment->user->name }}</td>
                            </tr>

                            <tr>
                                <td>Comment</td>
                                <td>:{{ $comment->comment }}</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>:{{ $comment->status == 1 ? 'Approve' : 'Pending' }}</td>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Update Status</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.blog.comment.status.update', $comment->id) }}" method="POST">
                            @csrf

                            @method('PUT')

                            <div class="form-group my-2">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="0" @selected($comment->status == 0)>Pending</option>
                                    <option value="1" @selected($comment->status == 1)>Approved</option>
                                </select>
                            </div>

                            <div class="my-2">
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
