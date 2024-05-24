@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create Social Link</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.social_link.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <label>Facebook Link</label>
                                    <input type="text" name="facebook_link"
                                        class="form-control @error('facebook_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$socialLink['facebook_link'] }}" placeholder="Facebook Link">
                                    @error('facebook_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
                                    <label>Twitter Link</label>
                                    <input type="text" name="twitter_link"
                                        class="form-control @error('twitter_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$socialLink['twitter_link'] }}" placeholder="Twitter Link">
                                    @error('twitter_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
                                    <label>Instagram Link</label>
                                    <input type="text" name="instagram_link"
                                        class="form-control @error('instagram_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$socialLink['instagram_link'] }}" placeholder="Instagram Link">
                                    @error('instagram_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
                                    <label>Linkedin Link</label>
                                    <input type="text" name="linkedin_link"
                                        class="form-control @error('linkedin_link')
                                            is-invalid
                                        @enderror"
                                        value="{{ @$socialLink['linkedin_link'] }}" placeholder="Linkedin Link">
                                    @error('linkedin_link')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>



                                <div class="col-lg-12 my-2">
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
