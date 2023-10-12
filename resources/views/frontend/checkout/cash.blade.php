@extends('frontend.front_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Cash on Delivery</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">



                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <!-- checkout-progress-sidebar -->
                                                    <div class="checkout-progress-sidebar ">
                                                        <div class="panel-group">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                                                </div>
                                                                <div class="">
                                                                    <ul class="nav nav-checkout-progress list-unstyled">

                                                                        @if( Session::has('coupon') && Session::has('charge'))
                                                                            <li><strong>SubTotal :</strong>{{ Cart::subtotal() }}</li>
                                                                            <li><strong>Coupon Name :</strong>{{ session()->get('coupon')['coupon_name'] }}</li>
                                                                            <li><strong>Discount :</strong>{{ session()->get('coupon')['discount'] }}%</li>
                                                                            <li><strong>Discount Amount :</strong>{{ session()->get('coupon')['discount_amount'] }}</li>
                                                                            <li><strong>Shipping Charge :</strong>{{ session()->get('charge')['ship_charge'] }}</li>
                                                                            <li><strong>Grand Total :</strong>{{ session()->get('coupon')['total_price'] + session()->get('charge')['ship_charge'] }}</li>
                                                                        @elseif( Session::has('charge') )
                                                                            <li><strong>SubTotal :</strong>{{ Cart::subtotal() }}</li>
                                                                            <li><strong>Shipping Charge :</strong>{{ session()->get('charge')['ship_charge'] }}</li>
                                                                            <li><strong>Grand Total :</strong>{{ $cartTotal }}</li>
                                                                        @endif


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- already-registered-login -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- checkout-progress-sidebar -->
                                                <form action="{{ route('cashOut.store') }}" method="post" id="payment-form">
                                                    @csrf
                                                    <div class="form-row">
                                                        <label for="card-element">
                                                            <img src="{{ asset('frontend/assets/images/payments/cash.png') }}" alt="">
                                                            <input name="name" value="{{ $data['shipping_name'] }}" type="hidden">
                                                            <input name="email" value="{{ $data['shipping_email'] }}" type="hidden">
                                                            <input name="phone" value="{{ $data['shipping_phone'] }}" type="hidden">
                                                            <input name="division_id" value="{{ $data['division_id'] }}" type="hidden">
                                                            <input name="district_id" value="{{ $data['district_id'] }}" type="hidden">
                                                            <input name="state_id" value="{{ $data['state_id'] }}" type="hidden">
                                                            <input name="post_code" value="{{ $data['post_code'] }}" type="hidden">
                                                            <input name="note" value="{{ $data['note'] }}" type="hidden">

                                                        </label>



                                                    </div>

                                                    <button type="submit" class="btn btn-success">Submit Payment</button>
                                                </form>

                                            </div>

                                        </div>
                                        <!-- panel-body  -->

                                    </div><!-- row -->
                                </div>
                                <!-- checkout-step-01  -->
                                <!-- checkout-step-02  -->

                                <!-- checkout-step-06  -->

                            </div><!-- /.checkout-steps -->
                        </div>

                    </div>

                </div><!-- /.row -->
            </div><!-- /.checkout-box -->







@endsection


