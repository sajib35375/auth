@extends('admin.admin_master')
@section('admin')


    <div class="container">
        <div class="row">
            <div style="margin-top: 15px;" class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit User</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',$edit_user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="#">Name</label>
                                <input name="name" value="{{ $edit_user->name }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Email</label>
                                <input name="email" value="{{ $edit_user->email }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Phone</label>
                                <input name="phone" value="{{ $edit_user->phone }}" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Photo</label>
                                <input name="old_photo" value="{{ $edit_user->profile_photo_path }}" type="hidden">
                                <input name="photo" class="form-control-file" type="file">
                            </div>
                            <div class="form-group">
                                <input value="Update" class="btn btn-success" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
