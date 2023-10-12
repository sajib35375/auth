@extends('frontend.front_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>MyCart</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-romove item">Image</th>
                                <th class="cart-description item">Price</th>
                                <th class="cart-product-name item">Product color</th>
                                <th class="cart-edit item">Quantity</th>
                                <th class="cart-sub-total item">Subtotal</th>
                                <th class="cart-total last-item">Remove</th>
                            </tr>
                            </thead>
                                <tbody id="cart">


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            <div class="col-md-4 col-sm-12 estimate-ship-tax">

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <span class="estimate-title">Estimate shipping</span>
                                <p>Enter your destination to get shipping</p>
                            </th>
                        </tr>
                    </thead><!-- /thead -->
                    <tbody>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="info-title control-label">Division <span>*</span></label>
                                        <select class="form-control" name="division_name" id="division">
                                            <option>--Select options--</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">District <span>*</span></label>
                                        <select class="form-control" name="district_name" id="district">
                                            <option>--Select options--</option>


                                        </select>

                                    <div class="form-group">
                                        <label for="#">State</label>
                                        <select class="form-control" name="state_name" id="state">
                                            <option>--Select options--</option>


                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label for="#">Shipping Charge</label>
                                            <select id="ship_charge" class="form-control" name="shipping_charge">




                                            </select>
                                        </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">Zip/Postal Code</label>
                                        <input type="text" class="form-control" placeholder="Zip/Postal Code">
                                    </div>
                                    </div>
                                        <div id="ship_btn" class="form-group">

                                        <button onclick="shippingCharge()" type="submit" class="btn btn-primary">Send</button>
                                    </div>

                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 col-sm-12 estimate-ship-tax">

                <table class="table" id="couponDiscountTable">
                    <thead>
                    <tr>
                        <th>
                            <span class="estimate-title">Discount Code</span>
                            <p>Enter your coupon code if you have one..</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <input id="coupon_name" type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                            </div>
                            <div class="clearfix pull-right">
                                <button  onclick="couponApply()" type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                            </div>
                        </td>
                    </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->

            </div><!-- /.estimate-ship-tax -->

            <div class="col-md-4 col-sm-12 cart-shopping-total">
                <table class="table">
                    <thead id="couponCal">

                    </thead><!-- /thead -->
                    <tbody>
                    <tr>
                        <td >
                            <div id="proceedCheck" class="cart-checkout-btn pull-right">

                                <a onclick="getAddress()" href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>

                            </div>
                        </td>
                    </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div><!-- /.cart-shopping-total -->


        </div>
        </div><!-- /.row -->

<style>
    #proceedCheck {
        display: none;
    }
</style>


        <script>

$(document).ready(function(){
      $('select[name="division_name"]').change(function (){
        let id = $(this).val();
        if (id){
         $.ajax({
           url:"{{ url('show-district-name') }}/"+id,
           method:"GET",
           dataType:"json",
           success:function (data){
               var d = $('select[name="district_name"]').empty();
               $.each(data,function (key,value){
                   $('select[name="district_name').append('<option value="'+value.id+'">'+value.district_name+'</option>');
               })
           }
         });
        }else{
            alert('danger');
        }
      });




});

</script>



<script>

    $(document).ready(function(){
          $('select[name="district_name"]').change(function (){
            let id = $(this).val();
            if (id){
             $.ajax({
               url:"{{ url('show-state-name') }}/"+id,
               method:"GET",
               dataType:"json",
               success:function (data){
                   var d = $('select[name="state_name"]').empty();
                   $.each(data,function (key,value){
                       $('select[name="state_name').append('<option value="'+value.id+'">'+value.state_name+'</option>');

                   })
               }
             });
            }else{
                alert('danger');
            }
          });




    });

    </script>

<script>

    $(document).ready(function(){
          $('select[name="state_name"]').change(function (){
            let id = $(this).val();
            if (id){
             $.ajax({
               url:"{{ url('show-shipping-charge') }}/"+id,
               method:"GET",
               dataType:"json",
               success:function (data){
                   var d = $('select[name="shipping_charge"]').empty();
                   $.each(data,function (key,value){
                       $('select[name="shipping_charge"]').append('<option value="'+value.id+'">'+value.Shipping_charge+'</option>');
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
