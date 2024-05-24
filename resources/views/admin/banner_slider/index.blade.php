@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.banner_slider.create') }}" class="btn btn-primary my-3">Create New</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-3 text-center">Banner Slider List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>URL</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bannerSliders as $sl => $bannerSlider)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $bannerSlider->title }}</td>
                                        <td>{{ $bannerSlider->desc }}</td>
                                        <td>{{ $bannerSlider->url }}</td>
                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/banner_slider') }}/{{ $bannerSlider->image }}"
                                                alt="">
                                        </td>
                                        <td>{{ $bannerSlider->status == 0 ? 'Inactive' : 'Active' }}</td>

                                        <td>

                                            <a href="{{ route('admin.banner_slider.edit', $bannerSlider->id) }}"
                                                class="btn btn-primary mx-2 btn-sm">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>



                                            <a href="{{ route('admin.banner_slider.destroy', $bannerSlider->id) }}"
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
