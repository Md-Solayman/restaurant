@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.blog_category.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Update Blog Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog_category.update', $blogcategory->id) }}" method="POST">
                            @csrf


                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                        value="{{ $blogcategory->name }}" placeholder="Name">
                                    @error('name')
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
                                        <option value="0" {{ $blogcategory->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                        <option value="1" {{ $blogcategory->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
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
