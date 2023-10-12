
@extends('admin.admin_master')
@section('admin')

<div class="container">

<div class="row">
<div style="margin-top: 15px;" class="col-md-12">
    @include('validate')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">All User <span class="badge badge-pill badge-danger">{{ count($all_user) }}</span></h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>User Name </th>
                        <th>User Email </th>
                        <th>User Phone</th>
                        <th>User Image</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $all_user as $user )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email  }}</td>
                            <td>{{ $user->phone  }}</td>
                            <td><img style="width: 70px;height: 40px;" src="{{ !empty('images/user/'.$user->profile_photo_path) ? url('images/user/'.$user->profile_photo_path) : url('images/joker.jpg') }}" alt=""></td>
                            <td>
                                @if( $user->userOnline() )
                                <span class="badge badge-info">Active</span>
                                @else
                                    <span class="badge badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('user.edit',$user->id) }}">Edit</a>
                                <a class="btn btn-danger" href="#">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User Name </th>
                        <th>User Email </th>
                        <th>User Phone</th>
                        <th>User Image</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</div>
</div>
<!-- /.box -->
</div>
@endsection
