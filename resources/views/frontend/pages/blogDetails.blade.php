@extends('frontend.master')


@section('meta_blog')
    <meta property="og:title" content="{{ $blog->seo_title }}" />
    <meta property="og:description" content="{{ $blog->seo_desc }}" />
    <meta property="og:image" content="{{ asset('/uploads/blog/' . $blog->image) }}" />
    <meta property="og:site_url" content="{{ url()->current() }}" />
@endsection

@section('content')
    <!-- mobile menu end -->

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
                                <li class="about-p"><span>Blog Details</span></li>
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
            <div class="row style-6-right-column">
                <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                    <div class="right-blog-details-style-6">
                        <div class="single-image">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img width="900" height="400" src="{{ asset('/uploads/blog') }}/{{ $blog->image }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="single-blog-content my-3">
                            <div class="single-b-title">
                                <h4>{{ $blog->title }}</h4>



                            </div>
                            <div class="date-edit-comments my-2">
                                <div class="blog-info-wrap">
                                    <span class="blog-data date">
                                        <i class="icon-clock"></i>
                                        <span class="blog-d-n-c">{{ date('d F Y', strtotime($blog->created_at)) }}</span>
                                    </span>
                                    <span class="blog-data blog-edit mx-3">
                                        <i class="icon-user"></i>
                                        <span class="blog-d-n-c">By <span
                                                class="editor">{{ $blog->admin->name }}</span></span>
                                    </span>
                                    <span class="blog-data comments mx-3">
                                        <i class="icon-bubble"></i>
                                        <span class="blog-d-n-c">{{ count($blogComments) }} <span
                                                class="add-comments">comments</span></span>
                                    </span>
                                </div>
                            </div>
                            <div class="blog-description my-4">
                                <p>{!! $blog->desc !!}</p>


                            </div>


                            <div class="float-end">
                                <h3 class="h4">Share Now</h3>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}
                                "
                                    style="font-size: 24px; border-radius: 50%; padding: 5px; width: 50px; height: 30px;">
                                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                </a>

                                <a href="http://twitter.com/share?text={{ $blog->title }}&url={{ url()->current() }}&hashtags=hashtag1,hashtag2,hashtag3
                                "
                                    style="font-size: 24px; border-radius: 50%; padding: 5px; width: 50px; height: 30px;">
                                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                                </a>

                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $blog->title }}
                                "
                                    style="font-size: 24px; border-radius: 50%; padding: 5px; width: 50px; height: 30px;">
                                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                </a>
                            </div>


                            {{-- prev & next blog --}}
                            <div class="d-flex justify-content-between align-items-center" style="margin-top: 140px;">

                                @if ($prevBlog)
                                    <div class="col-lg-6 mx-2">
                                        <div class="card">
                                            <div class="d-flex justify-content-between">

                                                <div>
                                                    <img src="{{ asset('/uploads/blog') }}/{{ $prevBlog->image }}"
                                                        style="width: 100px; height: 100px;" alt="">
                                                </div>

                                                <div>
                                                    <p class="p-3">{{ $prevBlog->title }}</p>

                                                    <a href="{{ route('blog.details', $prevBlog->slug) }}">
                                                        <i class="fa fa-arrow-left" aria-hidden="true" class="p-3"></i>
                                                        Previous Blog</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if ($nextBlog)
                                    <div class="col-lg-6 mx-2">
                                        <div class="card">
                                            <div class="d-flex justify-content-between">

                                                <div>
                                                    <img src="{{ asset('/uploads/blog') }}/{{ $nextBlog->image }}"
                                                        style="width: 100px; height: 100px;" alt="">
                                                </div>

                                                <div>
                                                    <p class="p-3">
                                                        {{ $nextBlog->title }}</p>

                                                    <a class="text-center" class="p-3"
                                                        href="{{ route('blog.details', $nextBlog->slug) }}">

                                                        Next Blog <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif




                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="left-column" style="margin-left: 40px;">
                        <div class="blog-search">

                            <form class="d-flex" action="{{ route('blogs') }}" method="GET">
                                <input type="text" name="search" placeholder="Search blog" class="form-control mx-2">
                                <button type="submit" class="btn btn-dark btn-sm">Search</button>
                            </form>
                        </div>

                        <div class="blog-title my-4">
                            <h4>Recent post</h4>
                            @if ($recentBlogs)
                                <div class="left-blog">
                                    @foreach ($recentBlogs as $recentBlog)
                                        <div class="d-flex align-items-center">

                                            <div>
                                                <a href="{{ route('blog.details', $recentBlog->slug) }}"></a>
                                                <img src="{{ asset('/uploads/blog') }}/{{ $recentBlog->image }}"
                                                    style="width: 100px; height: 60px; margin-top: 10px;" alt="">
                                            </div>

                                            <div class="mx-3">
                                                <p>{{ date('d F Y', strtotime($recentBlog->created_at)) }}</p>
                                                <a class="text-center"
                                                    href="{{ route('blog.details', $recentBlog->slug) }}">
                                                    <h5>{{ $recentBlog->title }}</h5>
                                                </a>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>



                    {{-- blog categories --}}
                    <div class="blog-tag my-5" style="margin-left: 40px;">
                        <h4>Blog Categories</h4>
                        <ul class="list-group my-3">
                            @foreach ($blogCategories as $category)
                                <a href="{{ route('blogs', ['category' => $category->name]) }}">
                                    <li class="list-group-item">
                                        <span>{{ $category->name }}</span>
                                        <span class="float-end">{{ $category->blog_count }}</span>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>


                    {{-- tags --}}
                    <div class="blog-tag my-5" style="margin-left: 40px;">
                        <h4>Tags</h4>
                        <ul class="tegs row">
                            <div class="col-lg-4 my-2">
                                <li class="tags-link"><a href="">Freshmeat</a></li>
                            </div>
                            <div class="col-lg-4 my-2">
                                <li class="tags-link"><a href="">Freshmeat</a></li>
                            </div>
                            <div class="col-lg-4 my-2">
                                <li class="tags-link"><a href="">Freshmeat</a></li>
                            </div>
                            <div class="col-lg-4 my-2">
                                <li class="tags-link"><a href="">Freshmeat</a></li>
                            </div>
                            <div class="col-lg-4 my-2">
                                <li class="tags-link"><a href="">Freshmeat</a></li>
                            </div>
                            <div class="col-lg-4 my-2">
                                <li class="tags-link"><a href="">Freshmeat</a></li>
                            </div>
                        </ul>
                    </div>
                </div>



                {{-- comments --}}
                <div class="col-lg-12">
                    <div class="blog-comments my-5">
                        <h4>

                            @if (count($blogComments) > 1)
                                <span>{{ count($blogComments) }} Comments</span>
                            @else
                                <span>{{ count($blogComments) }} Comment</span>
                            @endif
                        </h4>

                        <div class="blog-comment-info my-4">

                            @foreach ($blogComments as $blogComment)
                                <div class="d-flex">

                                    <div>
                                        @if ($blogComment->user->image == '')
                                            <img width="32"
                                                src="{{ Avatar::create($blogComment->user->name)->toBase64() }}" />
                                        @else
                                            <img src="{{ asset('/uploads/user') }}/{{ $blogComment->user->image }}"
                                                style="width: 50px; height: 50px;" alt="">
                                        @endif

                                    </div>

                                    <div class="mx-3">
                                        <p class="lead">{{ $blogComment->user->name }}</p>
                                        <p class="text-muted">{{ $blogComment->comment }}</p>
                                        <a type="submit"><i class="fa fa-reply" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>


                {{-- comment form --}}
                <!--Leave-comments-->

                @auth
                    <div class=" col-lg-8 comments-form">
                        <h4>Leave a Comment</h4>

                        <!--form-->
                        <form class="form " action="{{ route('comment.store', $blog->id) }}" method="POST"
                            id="main_contact_form">
                            @csrf


                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ Auth::user()->name }}" required="required" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email*" required="required" value="{{ Auth::user()->email }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="form-group">
                                        <textarea name="comment" id="message" cols="10" rows="3"
                                            class="form-control @error('comment')
                                            is-invalid
                                        @enderror"
                                            placeholder="Message*"></textarea>
                                        @error('comment')
                                            <strong class="text-danger">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 my-2">
                                    <button type="submit" name="submit" class="btn btn-dark">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!--/-->
                    </div>
                @else
                    <span>Please login to leave a comment
                        <a href="{{ route('login') }}" class="btn btn-dark btn-sm">Login</a>
                    </span>
                @endauth

            </div>
    </section>
    <!-- blog end -->
@endsection
