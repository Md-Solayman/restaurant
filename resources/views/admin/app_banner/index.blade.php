@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.app_banner.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">App Banner List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Background Image</th>
                                    <th>Playstore Link</th>
                                    <th>Appstore Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appBanners as $sl => $appBanner)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $appBanner->title }}</td>
                                        <td>{{ $appBanner->description }}</td>
                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/app_banner') }}/{{ $appBanner->image }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/app_banner/background') }}/{{ $appBanner->background_image }}"
                                                alt="">
                                        </td>

                                        <td>{{ $appBanner->playstore_link ?? '' }}</td>
                                        <td>{{ $appBanner->appstore_link ?? '' }}</td>

                                        <td>

                                            <a href="{{ route('admin.app_banner.destroy', $appBanner->id) }}"
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
