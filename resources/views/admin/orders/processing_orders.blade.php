@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div  class="col-md-12">
            <div style="margin-top: 10px;" class="card">
                <div class="card-header">
                    <h2>All Processing Orders</h2>
                </div>
                <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Order Date</th>
                                <th>Invoice</th>
                                <th>Payment Type</th>
                                <th>Amount</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $orders as $order )
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->invoice_number }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->amount }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td><span class="badge badge-pill badge-info">{{ $order->status }}</span></td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('user.orders',$order->id) }}"><i class="fa fa-eye"></i></a>
                                        <a target="_blank" class="btn btn-danger" href="{{ route('invoice.down',$order->id) }}"><i class="fa fa-download"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
