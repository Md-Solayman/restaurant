@extends('admin.admin')

@section('content')
    <div class="container my-3">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-auto text-center">Create Title</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.daily_offer_title.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <label>Daily Offer Title</label>
                                    <input type="text" name="daily_offer_title"
                                        class="form-control @error('daily_offer_title')
                                       is-invalid
                                   @enderror"
                                        value="{{ @$sectionTitles['daily_offer_title'] }}">

                                    @error('daily_offer_title')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>


                                <div class="col-lg-12 my-2">
                                    <label>Daily Offer Description</label>
                                    <input type="text" name="daily_offer_desc"
                                        value="{{ @$sectionTitles['daily_offer_desc'] }}"class="form-control @error('daily_offer_desc')
                                       is-invalid
                                   @enderror">
                                    @error('daily_offer_desc')
                                        <strong class="text-danger">
                                            {{ $message }}
                                        </strong>
                                    @enderror
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
