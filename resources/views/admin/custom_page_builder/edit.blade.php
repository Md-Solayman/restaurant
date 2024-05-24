@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.custom_page_builder.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto">Update Page</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.custom_page_builder.update', $custompagebuilder->id) }}"
                            method="POST">
                            @csrf

                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title')
                                            is-invalid
                                        @enderror"
                                        value="{{ $custompagebuilder->title }}" placeholder="Title">
                                    @error('title')
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
                                    @enderror">{{ $custompagebuilder->desc }}</textarea>
                                    @error('desc')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
                                    <label>Status</label>
                                    <select name="status"
                                        class="form-control @error('status')
                                        is-invalid
                                    @enderror">
                                        <option value="0" {{ $custompagebuilder->status == 0 ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                        <option value="1" {{ $custompagebuilder->status == 1 ? 'selected' : '' }}>
                                            Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
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
