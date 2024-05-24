@extends('frontend.master')

@section('content')
    <!-- breadcrumb start -->
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding"
            @if (config('settings.breadcumb_logo') != '') style="background-image: url({{ asset('/uploads/settings') }}/{{ config('settings.breadcumb_logo') }})"
            @else
            style="background-image: url({{ asset('/frontend_assets/image/about-image.jpg') }})" @endif>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <ul class="about-link text-center">
                                <li class="go-home"><a href="{{ route('home') }}">Home</a></li>
                                |
                                <li class="about-p"><span>Blogs</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- left blog start -->
    <section class="section-tb-padding blog-page">
        <div class="container">
            <div class="row">

                <form action="{{ route('blogs') }}" method="GET">


                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..."
                                        value="{{ @request()->search }}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <select name="category" class="form-control">
                                    <option value="">All</option>
                                    @foreach ($blogCategories as $category)
                                        <option value="{{ $category->name }}" @selected(@request()->category == $category->name)>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-2">
                                <button class="btn-style1" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-xl-12 col-lg-12 col-md-12 col-12 my-5">
                    <div class="blog-style-6-right-3-grid">
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-lg-3 my-2">
                                    <div class="blog-image">
                                        <a href="{{ route('blog.details', $blog->slug) }}">
                                            <img src="{{ asset('/uploads/blog') }}/{{ $blog->image }}" alt="blog-image"
                                                style="height: 180px; width: 300px;">
                                        </a>



                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-title">
                                            <h6><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h6>
                                        </div>



                                        <p class="blog-description">{!! truncate($blog->desc) !!}</p>
                                        <div class="more-blog">
                                            <a href="{{ route('blog.details', $blog->slug) }}" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($blogs->isEmpty())
                                <strong class="text-danger text-center">No Blogs Found</strong>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="m-auto my-5 col-lg-2">
                {{ $blogs->links() }}
            </div>

        </div>
    </section>
    <!-- blog end -->
@endsection
