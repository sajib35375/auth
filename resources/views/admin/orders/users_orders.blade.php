@extends('admin.admin_master')
@section('admin')

    <div class="row">
        <div style="margin: 15px;" class="col-md-5 col-12">  {{--start col-md-6--}}
            <div class="box box-solid box-inverse box-info">
                <div class="box-header with-border">
                    <h4 class="box-title">Shipping <strong>Details</strong></h4>
                </div>
                <div class="box-body">
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
        </div>{{--end col-md-6--}}



        <div style="margin: 15px;" class="col-md-5 col-12">  {{--start col-md-6--}}
            <div class="box box-solid box-inverse box-info">
                <div class="box-header with-border">
                    <h4 class="box-title">Order <strong>Details</strong></h4>
                    <ul class="box-controls pull-right">

                    </ul>
                </div>

                <div class="box-body">
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
                    @if( $order->status=='pending' )
                    <a class="btn btn-success btn-block" href="{{ route('confirmed.order',$order->id) }}">Confirm</a>
                        @elseif( $order->status=='confirm' )
                        <a class="btn btn-success btn-block" href="{{ route('process.order',$order->id) }}">Processing</a>
                        @elseif( $order->status=='processing' )
                        <a class="btn btn-success btn-block" href="{{ route('pick.order',$order->id) }}">Picked</a>
                        @elseif( $order->status=='picked' )
                        <a class="btn btn-success btn-block" href="{{ route('ship.order',$order->id) }}">Shipped</a>
                        @elseif( $order->status=='shipped' )
                        <a class="btn btn-success btn-block" href="{{ route('delivery.order',$order->id) }}">Delivered</a>
                         @elseif( $order->status=='delivered' )
                        <a class="btn btn-success btn-block" href="{{ route('canceled.order',$order->id) }}">Cancel</a>
                        @endif
                </div>
            </div>
        </div>{{--end col-md-6--}}


        <div style="margin: 15px;" class="col-md-10 col-12">
            <div class="box box-slided-up">
                <div class="box-header with-border">
                    <h4 class="box-title">Box <strong>slided up</strong></h4>
                    <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide rotate-180" href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                </div>

                <div class="box-body" style="display: block;">
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


    </div>


@endsection
