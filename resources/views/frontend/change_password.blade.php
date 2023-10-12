@extends('frontend.front_master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img style="height: 270px; width: 270px;border-radius: 50%;margin: auto;display: block;" src="{{ !empty('images/user/'.$profile->profile_photo_path) ? url('images/user/'.$profile->profile_photo_path) : url('images/joker.jpg') }}" alt="">
                <a class="btn btn-primary btn-block" href="{{ url('/dashboard') }}">Home</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.profile') }}">Profile Update</a>
                <a class="btn btn-primary btn-block" href="#">Change Password</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.order') }}">My Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.return.order') }}">Return Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.cancel.order') }}">Cancel Order</a>
                <a class="btn btn-danger btn-block" href="{{ route('home.logout') }}">Logout</a>
            </div>

            <div class="col-md-9">
                <h2>Change Your Password</h2>
                <form action="{{ route('change.password.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="#">Current Password<span class="text-danger">*</span></label>
                        <input name="old_password" class="form-control"  type="password">
                    </div>
                    <div class="form-group">
                        <label for="#">New Password<span class="text-danger">*</span></label>
                        <input name="password" class="form-control"  type="password">
                    </div>
                    <div class="form-group">
                        <label for="#">Confirm Password<span class="text-danger">*</span></label>
                        <input name="password_confirmation" class="form-control"  type="password">
                    </div>

                    <div class="form-group">
                        <input value="Update" class="btn btn-info btn-sm" type="submit">
                    </div>

                </form>

            </div>
        </div>
    </div>






@endsection
