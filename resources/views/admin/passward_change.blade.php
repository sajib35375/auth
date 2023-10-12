
@extends('admin.admin_master')
@section('admin')


    <div class="container">
        <div class="row">
            <div style="margin-top: 100px;" class="col-md-8">
                @if($errors->any())
                    <p>{{ $errors->first() }}</p>
                @endif
                <form action="{{ route('admin.password.update') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="#">Current Password</label><span class="text-danger">*</span>
                        <input name="old_password" class="form-control"  type="password">
                    </div>
                    <div class="form-group">
                        <label for="#">New Password</label><span class="text-danger">*</span>
                        <input name="password" class="form-control"  type="password">
                    </div>
                    <div class="form-group">
                        <label for="#">Confirm Password</label><span class="text-danger">*</span>
                        <input  name="password_confirmation" class="form-control"  type="password">
                    </div>
                    <div class="form-group">
                        <input value="Change" class="btn btn-info" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>





@endsection
