@extends('frontend.master')


@section('content')
    <div class="container" style="height: 300px;">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="order-details" style="margin-top: 100px;">
                    <span class="order-i text-center"><i class="fa fa-solid fa-ban"
                            style="font-size: 40px; color: red;"></i></span>
                    <h4>Incomplete Order</h4>
                    <span class="order-s">
                        @if (session()->has('error'))
                            <span class="text-danger">
                                {{ session('error') }}
                            </span>
                        @else
                            <span class="text-danger">
                                Something Went Wrong
                            </span>
                        @endif


                    </span>
                    <br>
                    <br>
                    <a href="{{ route('home') }}" class="tracking-link btn btn-style1">Home</a>
                </div>


            </div>
        </div>
    </div>
@endsection
