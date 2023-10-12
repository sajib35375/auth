@extends('frontend.front_master')
@section('content')

    <div class="container">
        <div class="row">
            <div style="margin: auto;padding: 10px;" class="col-md-3">
                <img style="height: 270px; width: 270px;border-radius: 50%;margin: auto;display: block;" src="{{ !empty('images/user/'.$user_profile->profile_photo_path) ? url('images/user/'.$user_profile->profile_photo_path) : url('images/joker.jpg') }}" alt="">
                <a class="btn btn-primary btn-block" href="{{ url('/dashboard') }}">Home</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.profile') }}">Profile Update</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.change.password') }}">Change Password</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.order') }}">My Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.return.order') }}">Return Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.cancel.order') }}">Cancel Order</a>
                <a class="btn btn-danger btn-block" href="{{ route('home.logout') }}">Logout</a>
            </div>
            <div class="col-md-8">
                <h2>WElCOME <span class="text-info">{{ Auth::user()->name }}</span> TO OUR SHOP</h2>

            </div>
        </div>
    </div>






    @endsection
