@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.chef.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create Chef</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.chef.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                        value="{{ old('name') }}" placeholder="Name">
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
                                        value="{{ old('title') }}" placeholder="Title">
                                    @error('title')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Facebook Link <code>(Leave for hide)</code></label>
                                    <input type="text" name="fb_link"
                                        class="form-control @error('fb_link')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('fb_link') }}" placeholder="Facebook Link">
                                    @error('fb_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Twitter Link <code>(Leave for hide)</code></label>
                                    <input type="text" name="twitter_link"
                                        class="form-control @error('twitter_link')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('twitter_link') }}" placeholder="Twitter Link">
                                    @error('twitter_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Linkedin Link <code>(Leave for hide)</code></label>
                                    <input type="text" name="linkedin_link"
                                        class="form-control @error('linkedin_link')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('linkedin_link') }}" placeholder="Linkedin Link">
                                    @error('linkedin_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Website Link <code>(Leave for hide)</code></label>
                                    <input type="text" name="website_link"
                                        class="form-control @error('website_link')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('website_link') }}" placeholder="Website Link">
                                    @error('website_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-6 my-2">
                                    <label>Show at Homepage</label>
                                    <select name="show_homepage"
                                        class="form-control @error('show_homepage')
                                        is-invalid
                                    @enderror">
                                        <option value="0" {{ old('show_homepage' == 0 ? 'selected' : '') }}>No
                                        </option>
                                        <option value="1" {{ old('show_homepage' == 1 ? 'selected' : '') }}>Yes
                                        </option>
                                    </select>
                                    @error('show_homepage')
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





                                <div class="col-lg-12 my-2">
                                    <label>Image <code>(Backgorund Should Be Removed)</code></label>
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
