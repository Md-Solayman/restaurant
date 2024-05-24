@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.custom_page_builder.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Page View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Title</td>
                                <td>:{{ $custompagebuilder->title }}</td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>:{!! $custompagebuilder->desc !!}</td>
                            </tr>



                            <tr>
                                <td>Status</td>
                                <td>:{{ $custompagebuilder->status == 0 ? 'Inactive' : 'Active' }}</td>
                            </tr>


                        </table>

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
