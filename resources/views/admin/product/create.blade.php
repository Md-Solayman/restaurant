@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">List</a>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto">Create Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <label>Product Name</label>
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




                                <div class="col-lg-6 my-2">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity"
                                        class="form-control @error('quantity')

                                    @enderror"
                                        value="{{ old('quantity') }}" placeholder="Quantity">
                                    @error('quantity')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Short Description</label>
                                    <input type="text" name="short_description"
                                        class="form-control @error('short_description')

                                    @enderror"
                                        value="{{ old('short_description') }}" placeholder="Short Description">
                                    @error('short_description')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>




                                <div class="col-lg-12 my-2">
                                    <label>Long Description</label>
                                    <textarea name="long_description"
                                        class="ckeditor form-control @error('long_description')
                                        is-invalid
                                    @enderror">{{ old('long_description') }}
                                    </textarea>
                                    @error('long_description')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Product Price</label>
                                    <input type="number" name="price"
                                        class="form-control @error('price')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('price') }}" placeholder="Price">
                                    @error('price')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Offer Price</label>
                                    <input type="number" name="offer_price"
                                        class="form-control @error('offer_price')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('offer_price') }}" placeholder="Offer Price">
                                    @error('offer_price')
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
                                    <label>Seo Title</label>
                                    <input type="text" name="seo_title" value="{{ old('seo_title') }}"
                                        class="form-control" placeholder="Seo Title">
                                </div>


                                <div class="col-lg-6 my-2">
                                    <label>Seo Description</label>
                                    <input type="text" name="seo_description" class="form-control"
                                        placeholder="Seo Description" value="{{ old('seo_description') }}">

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
