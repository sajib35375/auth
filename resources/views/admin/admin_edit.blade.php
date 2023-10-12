
@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container">
        <div class="row">
            <div style="margin-top: 100px;" class="col-md-8">
                <form action="{{ route('admin.profile.update',$edit_profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="#">Admin Name</label>
                        <input name="name" class="form-control" value="{{ $edit_profile->name }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="#">Admin Email</label>
                        <input name="email" class="form-control" value="{{ $edit_profile->email }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="#">Admin Profile Photo</label>
                        <input name="old_photo" value="{{ $edit_profile->profile_photo_path }}" type="hidden">
                        <input id="file" name="photo" class="form-control-file"  type="file">
                        <img id="image" style="width: 100px;height: 100px;" src="{{ !empty('images/profile/'.$edit_profile->profile_photo_path) ? url('images/profile/'.$edit_profile->profile_photo_path) : url('images/joker.jpg')}}" alt="">
                    </div>
                    <div class="form-group">
                        <input value="Update" class="btn btn-info" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function (){
       $(document).on('change','#file',function (e){
           let url = URL.createObjectURL(e.target.files[0])
           $('#image').attr('src',url);
       })

    });
    </script>



@endsection
