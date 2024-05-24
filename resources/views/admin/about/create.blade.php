@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create About Page</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="old_image" value="{{ @$about->image }}">

                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$about->title }}" placeholder="Title">
                                    @error('title')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
                                    <label>Description</label>
                                    <textarea name="desc"
                                        class="form-control @error('desc')
                                        is-invalid
                                    @enderror"
                                        cols="10" rows="3">{{ @$about->desc }}</textarea>
                                    @error('desc')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
                                    <label>Video Link</label>
                                    <input type="text" name="video_link"
                                        class="form-control @error('video_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$about->video_link }}" placeholder="https://www.youtube.com">
                                    @error('video_link')
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



                                    <div class="my-2">
                                        <img src="{{ asset('/uploads/about') }}/{{ @$about->image }}" id="blah"
                                            width="100" />

                                    </div>

                                    @error('image')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>






                                <div class="col-lg-6 my-2">
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
