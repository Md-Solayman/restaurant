@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Update Testimonial</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                        value="{{ $testimonial->name }}" placeholder="Name">
                                    @error('name')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title')
                                            is-invalid
                                        @enderror"
                                        value="{{ $testimonial->title }}" placeholder="Title">
                                    @error('title')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Review</label>
                                    <textarea name="desc"
                                        class="form-control @error('desc')
                                            is-invalid
                                        @enderror "placeholder="Review">{{ $testimonial->desc }}</textarea>
                                    @error('desc')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Rating</label>
                                    <input type="number" name="count" value="{{ $testimonial->count }}" placeholder="1"
                                        class="form-control">
                                    @error('count')
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
                                        <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                        <option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>




                                <div class="col-lg-6 my-2">
                                    <label>Show Homepage</label>
                                    <select name="show_homepage"
                                        class="form-control @error('show_homepage')
                                        is-invalid
                                    @enderror">
                                        <option value="0" {{ $testimonial->show_homepage == 0 ? 'selected' : '' }}>No
                                        </option>
                                        <option value="1" {{ $testimonial->show_homepage == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                    </select>
                                    @error('show_homepage')
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
                                            src="{{ asset('/uploads/testimonial') }}/{{ $testimonial->image }}"
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
