@extends('admin.admin_master')
@section('admin')

    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sliders</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Slider Title</th>
                                        <th>Slider content</th>
                                        <th>status</th>
                                        <th>Slider Image</th>
                                        <th width="25%">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $sliders as $slider )
                                        <tr>
                                            <td>{{ $slider->title_eng }}</td>
                                            <td>{{ $slider->short_des_eng }}</td>
                                            <td>
                                                @if( $slider->status == true)
                                                    <span class="badge badge-success">active</span>
                                                    @else
                                                    <span class="badge badge-danger">inactive</span>
                                                @endif
                                            </td>
                                            <td><img style="width: 70px;height: 40px;" src="{{ URL::to('') }}/images/slider/{{ $slider->slider_img }}" alt=""></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{ route('slider.edit',$slider->id) }}">Edit</a>
                                                <a class="btn btn-danger btn-sm" href="{{ route('slider.delete',$slider->id) }}">Delete</a>
                                                @if( $slider->status == true )
                                                    <a class="btn btn-sm btn-danger" href="{{ route('status.active',$slider->id) }}"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a class="btn btn-sm btn-success" href="{{ route('status.inactive',$slider->id) }}"><i class="fa fa-arrow-up"></i></a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Slider Title</th>
                                        <th>Slider content</th>
                                        <th>Status</th>
                                        <th>Slider Image</th>
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
                <!-- /.box -->
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New Slider</h2>
                    </div>
                    <div class="card-body">

                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Slider Title English</label>
                                    <input name="title_eng" class="form-control" type="text">
                                    @error('title_eng')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Slider Title Bangla</label>
                                    <input name="title_ban" class="form-control" type="text">
                                    @error('title_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Slider Content English</label>
                                    <input name="short_des_eng" class="form-control" type="text">
                                    @error('short_des_eng')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Slider content Bangla</label>
                                    <input name="short_des_ban" class="form-control" type="text">
                                    @error('short_des_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Slider Image</label>
                                    <img id="img" src="" alt="">
                                    <input name="slider_img" class="form-control-file" type="file">
                                    @error('slider_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input value="Add" class="btn btn-success" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>





@endsection
