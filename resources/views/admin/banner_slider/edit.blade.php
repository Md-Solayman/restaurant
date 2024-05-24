@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.banner_slider.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Update Banner Slider</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.banner_slider.update', $bannerslider->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title')
                                            is-invalid
                                        @enderror"
                                        value="{{ $bannerslider->title }}" placeholder="Title">
                                    @error('title')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Description</label>
                                    <input type="text" name="desc"
                                        class="form-control @error('desc')
                                            is-invalid
                                        @enderror"
                                        value="{{ $bannerslider->desc }}" placeholder="Description">
                                    @error('desc')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>URL</label>
                                    <input type="text" name="url"
                                        class="form-control @error('url')

                                    @enderror"
                                        value="{{ $bannerslider->url }}" placeholder="URL">
                                    @error('url')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>




                                <div class="col-lg-6 my-2">
                                    <label>Status</label>
                                    <select name="status"
                                        class="form-control @error('status')
                                        is-invalid
                                    @enderror">
                                        <option value="0" {{ $bannerslider->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                        <option value="1" {{ $bannerslider->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>





                                <div class="col-lg-12 my-2">
                                    <label>Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image')
                                        is-invalid
                                    @enderror"
                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    @error('image')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror

                                    <div class="my-3">
                                        <img id="blah" height="100"
                                            src="{{ asset('/uploads/banner_slider') }}/{{ $bannerslider->image }}"
                                            width="100" alt="">
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-6 my-2">
                                <button class="btn btn-primary" type="submit">
                                    Update
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
