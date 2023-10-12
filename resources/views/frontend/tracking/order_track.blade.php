@extends('frontend.front_master')
@section('content')


{{--    /////////////////css part Start//////////////////--}}

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    }

    .container {

    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #4767fc
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #4767fc;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #4767fc;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #4767fc;
        border-color: #ff2b00;
        border-radius: 1px
    }
</style>

{{--    /////////////////css part End//////////////////--}}



{{--  /////////////Start  html part////////////////--}}


<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <div style="margin-left: 10px;" class="row">
                <div class="col-md-2">
                    <strong>Name : </strong><br>
                    <b>{{ $track->user->name }}</b>
                </div>
                <div class="col-md-2">
                    <strong>Division : </strong><br>
                    <b>{{ $track->division->division_name }}</b>
                </div>
                <div class="col-md-2">
                    <strong>District : </strong><br>
                    <b>{{ $track->district->district_name }}</b>
                </div>
                <div class="col-md-2">
                    <strong>Payment Type : </strong><br>
                    <b>{{ $track->payment_method }}</b>
                </div>
                <div class="col-md-2">
                    <strong>Order Number : </strong><br>
                    <b>{{ $track->order_number }}</b>
                </div>
                <div class="col-md-2">
                    <strong>Total Amount : </strong><br>
                    <b>${{ $track->amount }}</b>
                </div>
            </div>
            <div class="track">
                @if( $track->status == 'pending' )
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending Order</span> </div>

                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Confirm Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Delivery</span> </div>
                    @elseif( $track->status == 'confirm' )
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Confirm Order</span> </div>

                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Delivery</span> </div>
                @elseif( $track->status == 'processing' )
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Confirm Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing Order</span> </div>

                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Delivery</span> </div>
                @elseif( $track->status == 'picked' )
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Confirm Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked Order</span> </div>

                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped Order</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Delivery</span> </div>
                @elseif( $track->status == 'shipped' )
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Confirm Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped Order</span> </div>

                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Delivery</span> </div>
                @elseif( $track->status == 'delivered' )
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Confirm Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Picked Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped Order</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Delivery</span> </div>
                @endif

            </div>
            <hr>

            <hr> <a href="{{ route('home.index') }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back</a>
        </div>
    </article>
</div>




{{--  /////////////End  html part////////////////--}}



@endsection
