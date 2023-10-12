@extends('frontend.front_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>

        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;}
    </style>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>strip</li>
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
                <form action="{{ route('stripe.order') }}" method="post" id="payment-form">
                    @csrf
                    <div class="form-row">
                        <label for="card-element">
                            <input name="name" value="{{ $data['shipping_name'] }}" type="hidden">
                            <input name="email" value="{{ $data['shipping_email'] }}" type="hidden">
                            <input name="phone" value="{{ $data['shipping_phone'] }}" type="hidden">
                            <input name="division_id" value="{{ $data['division_id'] }}" type="hidden">
                            <input name="district_id" value="{{ $data['district_id'] }}" type="hidden">
                            <input name="state_id" value="{{ $data['state_id'] }}" type="hidden">
                            <input name="post_code" value="{{ $data['post_code'] }}" type="hidden">
                            <input name="note" value="{{ $data['note'] }}" type="hidden">

                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button class="btn btn-success">Submit Payment</button>
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


            <script type="text/javascript">
                // Create a Stripe client.
                var stripe = Stripe('pk_test_51JQXKXEeQL3aThfwpigQgZyaM0KqiPJcQ0EABriAvfpt6zjbbNbDVMW8qY9WryilJ5vaY2ya84dX8iozki4A4XSJ00qkRppikB');
                // Create an instance of Elements.
                var elements = stripe.elements();
                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                    base: {
                        color: '#32325d',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };
                // Create an instance of the card Element.
                var card = elements.create('card', {style: style});
                // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');
                // Handle real-time validation errors from the card Element.
                card.on('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });
                // Handle form submission.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    stripe.createToken(card).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Send the token to your server.
                            stripeTokenHandler(result.token);
                        }
                    });
                });
                // Submit the form with the token ID.
                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    // Submit the form
                    form.submit();
                }
            </script>




@endsection

