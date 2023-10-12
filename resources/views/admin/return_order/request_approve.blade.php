@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div style="margin-top: 10px;" class="card">
                <div class="card-header">
                    <h2>All Return Order Approve Request</h2>
                </div>
                <div class="card-body">
                    <div  class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Order Date</th>
                                <th>Invoice</th>
                                <th>Payment Type</th>
                                <th>Amount</th>
                                <th>Order Date</th>
                                <th>Return Reason</th>
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
                                    <td>{{ $order->return_reason }}</td>
                                    <td>
                                        @if( $order->return_order == 1 )
                                            <span class="badge badge-info">Pending</span>
                                        @elseif( $order->return_order == 2 )
                                            <span class="badge badge-success">Success</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-info">Return Success</span>
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
