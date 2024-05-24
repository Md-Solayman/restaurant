@extends('admin.admin')

@section('content')
    <div class="container my-3">
        {{-- <a href="{{ route('admin.app_banner.index') }}" class="btn btn-primary my-3">List</a> --}}


        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create App Banner</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.app_banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$appBanner->title }}" placeholder="Title">
                                    @error('title')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Description</label>
                                    <textarea type="text" name="description"
                                        class="form-control @error('description')
                                            is-invalid
                                        @enderror"
                                        placeholder="Description" cols="10" rows="3">{{ @$appBanner->description }}</textarea>
                                    @error('description')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>




                                <div class="col-lg-6 my-2">
                                    <label>Playstore Link</label>
                                    <input type="text" name="playstore_link"
                                        class="form-control @error('playstore_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$appBanner->playstore_link }}" placeholder="Playstore Link">
                                    @error('playstore_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Appstore Link</label>
                                    <input type="text" name="appstore_link"
                                        class="form-control @error('appstore_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$appBanner->appstore_link }}" placeholder="Appstore Link">
                                    @error('appstore_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>




                                <div class="col-lg-6 my-2">
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
                                        @if (@$appBanner->image == '')
                                            <img id="blah" width="100" alt="">
                                        @else
                                            <img src="{{ asset('/uploads/app_banner') }}/{{ @$appBanner->image }}"
                                                id="blah" width="100" alt="">
                                        @endif

                                    </div>

                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Background Image</label>
                                    <input type="file" name="background_image"
                                        class="form-control @error('background_image')
                                        is-invalid
                                    @enderror"
                                        onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">

                                    @error('background_image')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror

                                    <div class="my-3">
                                        @if (@$appBanner->background_image == '')
                                            <img id="img" width="100" alt="">
                                        @else
                                            <img src="{{ asset('/uploads/app_banner/background') }}/{{ @$appBanner->background_image }}"
                                                id="img" width="100" alt="">
                                        @endif
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
