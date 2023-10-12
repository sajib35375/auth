@extends('admin.admin_master')
@section('admin')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <a class="btn btn-success btn-rounded" href="{{ route('admin.profile.edit') }}">Edit Profile</a>

            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url({{ asset('backend/images/gallery/full/10.jpg') }}) center center;">
                    <h3 style="color:#1A233A;" class="widget-user-username">{{ $profile->name }}</h3>
                    <h6 style="color:#1A233A;" class="widget-user-desc">{{ $profile->email }}</h6>
                </div>
                <div class="widget-user-image">
                    <img class="rounded-circle" src="{{ !empty('images/profile/'.$profile->profile_photo_path) ? url('images/profile/'.$profile->profile_photo_path) : url('images/joker.jpg') }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">12K</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 br-1 bl-1">
                            <div class="description-block">
                                <h5 class="description-header">550</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">158</h5>
                                <span class="description-text">TWEETS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>



        </div>
    </section>
@endsection
