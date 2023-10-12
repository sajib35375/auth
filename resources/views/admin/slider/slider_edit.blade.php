@extends('admin.admin_master')
@section('admin')


<div class="wrap">
    <div class="row">
        <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2>Slider Edit</h2>
            </div>
            <div class="card-body">

                    <form action="{{ route('slider.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="#">Slider Title English</label>
                            <input name="title_eng" class="form-control" value="{{ $edit_data->title_eng }}" type="text">
                            @error('title_eng')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="#">Slider Title Bangla</label>
                            <input name="title_ban" class="form-control" value="{{ $edit_data->title_ban }}" type="text">
                            @error('title_ban')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="#">Slider Content English</label>
                            <input name="short_des_eng" class="form-control" value="{{ $edit_data->short_des_eng }}" type="text">
                            @error('short_des_eng')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="#">Slider content Bangla</label>
                            <input name="short_des_ban" class="form-control" value="{{ $edit_data->short_des_ban }}" type="text">
                            @error('short_des_ban')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="#">Slider Image</label>
                            <input name="old_photo" value="{{ $edit_data->slider_img }}" type="hidden">
                            <input id="file" name="slider_img" class="form-control-file" type="file">
                            <img style="width: 100px;height: 100px;" id="img" src="{{ URL::to('') }}/images/slider/{{ $edit_data->slider_img }}" alt="">
                            @error('slider_img')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input value="update" class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
