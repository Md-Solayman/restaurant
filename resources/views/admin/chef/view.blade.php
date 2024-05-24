@extends('admin.admin')

@section('content')
    <div class="container my-3">

        <a href="{{ route('admin.chef.index') }}" class="btn btn-primary my-3">List</a>

        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-2">Chef View</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Item</th>
                                <th>Value</th>

                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>:{{ $chef->name }}</td>
                            </tr>

                            <tr>
                                <td>Title</td>
                                <td>:{{ $chef->title }}</td>
                            </tr>


                            <tr>
                                <td>Facebook Link</td>
                                <td>:{{ $chef->fb_link ?? 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Linkedin Link</td>
                                <td>:{{ $chef->linkedin_link ?? 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Twitter Link</td>
                                <td>:{{ $chef->twitter_link ?? 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Website Link</td>
                                <td>:{{ $chef->website_link ?? 'NA' }}</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>:{{ $chef->status == 0 ? 'Inactive' : 'Active' }}</td>
                            </tr>

                            <tr>
                                <td>Show Homepage</td>
                                <td>:{{ $chef->show_homepage == 0 ? 'No' : 'Yes' }}</td>
                            </tr>

                            <tr>
                                <td>Image</td>
                                <td>: <img src="{{ asset('/uploads/chef') }}/{{ $chef->image }}" width="100"
                                        height="100" alt=""></td>
                            </tr>


                        </table>



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
