@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-8 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Blog View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Title</td>
                                <td>:{{ $blog->title }}</td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>:{!! $blog->desc !!}</td>
                            </tr>

                            <tr>
                                <td>Category</td>
                                <td>:{{ $blog->category->name }}</td>
                            </tr>

                            <tr>
                                <td>Added By</td>
                                <td>:{{ $blog->admin->name }}</td>
                            </tr>




                            <tr>
                                <td>Seo Title</td>
                                <td>:{{ $blog->seo_title ?? 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Seo Description</td>
                                <td>:{{ $blog->seo_desc ?? 'NA' }}</td>
                            </tr>



                            <tr>
                                <td>Status</td>
                                <td>:{{ $blog->status == 0 ? 'Inactive' : 'Active' }}</td>
                            </tr>

                            <tr>
                                <td>Image</td>
                                <td>:<img src="{{ asset('/uploads/blog') }}/{{ $blog->image }}" alt=""
                                        width="100" height="100" class="mx-1"></td>
                            </tr>


                        </table>

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
