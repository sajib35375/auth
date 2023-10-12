@extends('frontend.front_master')
@section('content')

<div class="content">
    <div class="row">
        <div style="margin: 20px;padding: 30px;" class="col-md-3">
            <img style="height: 270px; width: 270px;border-radius: 50%;margin: auto;display: block;" src="{{ !empty('images/user/'.$user_profile->profile_photo_path) ? url('images/user/'.$user_profile->profile_photo_path) : url('images/joker.jpg') }}" alt="">
            <a class="btn btn-primary btn-block" href="{{ url('/dashboard') }}">Home</a>
            <a class="btn btn-primary btn-block" href="{{ route('user.profile') }}">Profile Update</a>
            <a class="btn btn-primary btn-block" href="{{ route('user.change.password') }}">Change Password</a>
            <a class="btn btn-primary btn-block" href="{{ route('user.order') }}">My Order</a>
            <a class="btn btn-primary btn-block" href="{{ route('show.return.order') }}">Return Order</a>
            <a class="btn btn-primary btn-block" href="{{ route('show.cancel.order') }}">Cancel Order</a>
            <a class="btn btn-danger btn-block" href="{{ route('home.logout') }}">Logout</a>
        </div>
        <div style="margin: 50px auto 0px;" class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr style="background-color: #0bb2d4;">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Payment Method</th>
                    <th>Total Amount</th>
                    <th>Invoice</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $orders as $order )
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>${{ $order->amount }}</td>
                        <td>{{ $order->invoice_number }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td><span class="badge badge-success">{{ $order->status }}</span></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('order.details',$order->id) }}"><i class="fa fa-eye"></i>View</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('invoice.download',$order->id) }}"><i class="fa fa-download"></i>Invoice</a>
                        </td>
                    </tr>
                @empty
                    <h2 class="text-danger">Order not Found</h2>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
