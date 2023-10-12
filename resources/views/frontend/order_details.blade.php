@extends('frontend.front_master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img style="height: 100%; width: 100%;border-radius: 50%;" src="{{ !empty('images/profile/'.$user_profile->profile_photo_path) ? url('images/profile/'.$user_profile->profile_photo_path) : url('images/joker.jpg') }}" alt="">
                <a class="btn btn-primary btn-block" href="{{ url('/dashboard') }}">Home</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.profile') }}">Profile Update</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.change.password') }}">Change Password</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.order') }}">My Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.return.order') }}">Return Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.cancel.order') }}">Cancel Order</a>
                <a class="btn btn-danger btn-block" href="{{ route('home.logout') }}">Logout</a>
            </div>
            <div style="margin: auto;" class="col-md-9">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="background-color: #2ef99f;padding: 15px;">Shipping Details</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Shipping Name :</th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Email :</th>
                                    <th>{{ $order->email }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Phone :</th>
                                    <th>{{ $order->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Division :</th>
                                    <th>{{ $order->division->division_name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping District :</th>
                                    <th>{{ $order->district->district_name }}</th>
                                </tr>
                                <tr>
                                    <th>Postal Code :</th>
                                    <th>{{ $order->post_code }}</th>
                                </tr>
                                <tr>
                                    <th>Order Date :</th>
                                    <th>{{ $order->order_date }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 style="background-color: #2ef99f;padding: 15px;">Order Details</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tr>
                                    <th> Name :</th>
                                    <th>{{ $order->user->name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone :</th>
                                    <th>{{ $order->user->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Payment Type :</th>
                                    <th>{{ $order->payment_method }}</th>
                                </tr>
                                <tr>
                                    <th>Transaction ID :</th>
                                    <th>{{ $order->transaction_id }}</th>
                                </tr>
                                <tr>
                                    <th>Invoice :</th>
                                    <th class="text-danger">{{ $order->invoice_number }}</th>
                                </tr>
                                <tr>
                                    <th>Order Total :</th>
                                    <th>{{ $order->amount }}</th>
                                </tr>
                                <tr>
                                    <th>Order Status:</th>
                                    <th> <span class="badge badge-info">{{ $order->status }}</span></th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>





            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="background-color: #2ef99f;text-align: center;padding: 20px;">Product Details</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product Name </th>
                                <th>Product Code </th>
                                <th>Product Image </th>
                                <th>Product Color </th>
                                <th>Product Size </th>
                                <th>Product Quantity </th>
                                <th>Total Amount </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $order_item as $item )
                            <tr>
                                <td>{{ $item->product->product_name_eng }}</td>
                                <td>{{ $item->product->product_code }}</td>
                                <td><img src="{{ URL::to('') }}/images/thumbnail/{{ $item->product->product_thumbnail }}" alt="" width="50px;" height="50px;"></td>
                                <td>{{ $item->color }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ $item->price * $item->quantity }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if( $order->status=='delivered' )
                @php
                    $return_order = \App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                @endphp
            @if( $return_order )
                <form action="{{ route('return.order.send',$order->id) }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="">Return Reason</label>
                    <textarea class="form-control" name="return_reason" id="" cols="30" rows="10">return reason</textarea>
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Return Order</button>
                    </div>
                </form>
                @endif
            @else

            @endif

        </div>
    </div>






@endsection
