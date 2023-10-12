@extends('frontend.front_master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img style="height: 270px; width: 270px;border-radius: 50%;margin: auto;display: block;" src="{{ !empty('images/user/'.$profile->profile_photo_path) ? url('images/user/'.$profile->profile_photo_path) : url('images/joker.jpg') }}" alt="">
                <a class="btn btn-primary btn-block" href="{{ url('/dashboard') }}">Home</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.profile') }}">Profile Update</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.change.password') }}">Change Password</a>
                <a class="btn btn-primary btn-block" href="{{ route('user.order') }}">My Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.return.order') }}">Return Order</a>
                <a class="btn btn-primary btn-block" href="{{ route('show.cancel.order') }}">Cancel Order</a>
                <a class="btn btn-danger btn-block" href="{{ route('home.logout') }}">Logout</a>
            </div>

            <div class="col-md-9">
                <h2>Update Your Profile</h2>
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="#">Name</label>
                        <input name="name" class="form-control" value="{{ $profile->name }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="#">Email</label>
                        <input name="email" class="form-control" value="{{ $profile->email }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="#">Phone</label>
                        <input name="phone" class="form-control" value="{{ $profile->phone }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="#">Photo</label>
                        <input name="old_photo" value="{{ $profile->profile_photo_path }}" type="hidden">
                        <input name="photo" class="form-control-file"  type="file">
                    </div>
                    <div class="form-group">
                        <input value="Update" class="btn btn-info btn-sm" type="submit">
                    </div>

                </form>

            </div>
        </div>
    </div>






@endsection
