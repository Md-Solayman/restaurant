@extends('frontend.master')


@section('content')
    <div class="container" style="height: 300px;">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="order-details" style="margin-top: 100px;">
                    <span class="text-success order-i text-center"><i class="fa fa-check-circle"
                            style="font-size: 40px;"></i></span>
                    <h4>Thank you for order</h4>
                    <span class="order-s">Your order will ship within few hours</span>
                    <br>
                    <br>
                    <a href="{{ route('home') }}" class="tracking-link btn btn-style1">Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
