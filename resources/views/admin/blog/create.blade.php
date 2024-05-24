@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto">Create Blog</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title')
                                            is-invalid
                                        @enderror"
                                        value="{{ old('title') }}" placeholder="Title">
                                    @error('title')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Select Category</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id')
                                        is-invalid
                                    @enderror">
                                        <option selected disabled>Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
                                    <label>Description</label>
                                    <textarea name="desc"
                                        class="ckeditor form-control @error('desc')
                                        is-invalid
                                    @enderror">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>




                                <div class="col-lg-6 my-2">
                                    <label>Seo Title</label>
                                    <input type="text" name="seo_title" value="{{ old('seo_title') }}"
                                        class="form-control" placeholder="Seo Title">
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Seo Description</label>
                                    <input type="text" name="seo_desc" class="form-control" placeholder="Seo Description"
                                        value="{{ old('seo_desc') }}">

                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Status</label>
                                    <select name="status"
                                        class="form-control @error('status')
                                        is-invalid
                                    @enderror">
                                        <option value="0" {{ old('status' == 0 ? 'selected' : '') }}>Inactive
                                        </option>
                                        <option value="1" {{ old('status' == 1 ? 'selected' : '') }}>Active
                                        </option>
                                    </select>
                                    @error('status')
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
                                        <img id="blah" width="100" alt="">
                                    </div>

                                </div>
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
