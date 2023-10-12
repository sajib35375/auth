@extends('frontend.front_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
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
                                            <form action="{{ route('checkout.store') }}" method="POST">
                                                @csrf
                                            <!-- guest-login -->
                                            <div class="col-md-4 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>Checkout Form</b></h4>


                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">User Name <span>*</span></label>
                                                        <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">User Email <span>*</span></label>
                                                        <input name="email" type="text" class="form-control" value="{{ Auth::user()->email }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">User Phone <span>*</span></label>
                                                        <input name="phone" type="text" class="form-control" value="{{ Auth::user()->phone }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Post Code<span>*</span></label>
                                                        <input name="post_code" type="text" class="form-control" placeholder="Post Code" >
                                                    </div>


                                            </div>

                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-4 already-registered-login">

                                                @if(Session::has('address'))

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Division Name<span>*</span></label><br>
                                                        <select name="division_id" id="">
                                                            <option value="{{ session()->get('address')['division_id'] }}">{{ session()->get('address')['division'] }}</option>
                                                        </select>

                                                    </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">District Name<span>*</span></label><br>
                                                    <select name="district_id" id="">
                                                        <option value="{{ session()->get('address')['district_id'] }}">{{ session()->get('address')['district'] }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">State Name<span>*</span></label><br>
                                                    <select name="state_id" id="">
                                                        <option value="{{ session()->get('address')['state_id'] }}">{{ session()->get('address')['state'] }}</option>
                                                    </select>
                                                </div>
                                                @endif
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Notes<span>*</span></label>
                                                    <textarea class="form-control" name="note"  cols="30" rows="10"></textarea>


                                                </div>



                                            </div>



                                                <div class="col-md-4">
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
                                                                        @foreach( $cart as $item )
                                                                            <li>
                                                                                <strong>Image:</strong>
                                                                                <img src="{{ URL::to('') }}/images/thumbnail/{{ $item->options->image }}" alt="" style="width: 50px;height: 50px;"><br>
                                                                                <strong>Quantity:</strong>{{ $item->qty }}<br>
                                                                                <strong>Color:</strong>{{ $item->options->color }}<br>
                                                                                <strong>Size:</strong>{{ $item->options->size }}
                                                                            </li>


                                                                        @endforeach
                                                                        @if( Session::has('coupon') && Session::has('charge'))
                                                                            <li><strong>SubTotal :</strong>{{ $cartTotal }}</li>
                                                                            <li><strong>Coupon Name :</strong>{{ session()->get('coupon')['coupon_name'] }}</li>
                                                                            <li><strong>Discount :</strong>{{ session()->get('coupon')['discount'] }}%</li>
                                                                            <li><strong>Discount Amount :</strong>{{ session()->get('coupon')['discount_amount'] }}</li>
                                                                            <li><strong>Shipping Charge :</strong>{{ session()->get('charge')['ship_charge'] }}</li>
                                                                            <li><strong>Grand Total :</strong>{{ session()->get('coupon')['total_price'] + session()->get('charge')['ship_charge'] }}</li>
                                                                        @elseif(Session::has('charge'))
                                                                            <li><strong>SubTotal :</strong>{{ $cartTotal }}</li>
                                                                                <li><strong>Shipping Charge :</strong>{{ session()->get('charge')['ship_charge'] }}</li>
                                                                            <li><strong>Grand Total :</strong>{{ $cartTotal + session()->get('charge')['ship_charge'] }}</li>
                                                                        @endif


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <!-- checkout-progress-sidebar -->
                                                        <div class="checkout-progress-sidebar ">
                                                            <div class="panel-group">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                                                    </div>
                                                                    <div class="">
                                                                        <div class="col-md-4 ">
                                                                            <label for="#">Stripe</label>
                                                                            <input value="stripe"  name="payment" type="radio">
                                                                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="#">Cash</label><br>
                                                                            <input value="cash"  name="payment" type="radio">
                                                                            <img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="#">Card</label><br>
                                                                            <input value="card"  name="payment" type="radio">
                                                                            <img src="{{ asset('frontend/assets/images/payments/1.png') }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <br><br>
                                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>

                                                        </div>

                                                    </div>

                                            <!-- already-registered-login -->
                                                </div>
                                        </div>
                                            </form>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->

                            <!-- checkout-step-06  -->

                        </div><!-- /.checkout-steps -->
                    </div>


                        <!-- checkout-progress-sidebar -->
                    </div>










                </div><!-- /.row -->
            </div><!-- /.checkout-box -->


            <script>
                $(document).ready(function (){
                    $('select[name="division_id"]').change(function (){

                        let id = $(this).val();
                        if (id){
                            $.ajax({
                                url:"{{ url('show-district') }}/"+id,
                                method:"GET",
                                dataType:"json",
                                success:function (data){
                                    var d = $('select[name="district_id"]').empty();
                                    $.each(data,function (key,value){
                                        $('select[name="district_id').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                                    })
                                }
                            });
                        }else{
                            alert('danger');
                        }
                    });

                    $('select[name="district_id"]').change(function (){
                        let id = $(this).val();
                        if (id){
                            $.ajax({
                                url:"{{ url('show-states') }}/"+id,
                                method:"GET",
                                dataType:"json",
                                success:function (data){
                                    var d = $('select[name="state_id"]').empty();
                                    $.each(data,function (key,value){
                                        $('select[name="state_id').append('<option value="'+value.id+'">'+value.state_name+'</option>');
                                    })
                                }
                            });
                        }else{
                            alert('danger');
                        }
                    });


                });

            </script>


@endsection
