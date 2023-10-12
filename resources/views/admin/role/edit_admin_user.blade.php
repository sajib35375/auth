@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->


    <section>
        <!-- Main content -->
        <div class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Admin User</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('admin.user.update',$edit_admin->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> Name <span class="text-danger">*</span></h5>
                                                    <input name="name" value="{{ $edit_admin->name }}" class="form-control" type="text">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <input name="email" value="{{ $edit_admin->email }}" class="form-control" type="text">
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                        </div> {{-- //end 1st row--}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Phone <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $edit_admin->phone }}" name="phone" class="form-control" > </div>
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div> {{--   end 2nd row--}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input name="old_photo" value="{{ $edit_admin->profile_photo_path }}" type="hidden">
                                                        <input type="file" name="profile_photo_path" class="form-control-file" > </div>
                                                    @error('profile_photo_path')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="image" style="width: 200px;height: 200px;" src="{{ URL::to('') }}/images/admin/{{ $edit_admin->profile_photo_path }}" alt=""> </div>
                                                </div>
                                            </div>

                                        </div> {{--   end 2nd row--}}

                                        <hr>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input name="category" type="checkbox" id="checkbox_1" value="1" {{ $edit_admin->category == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_1">Category</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="product" type="checkbox" id="checkbox_2" value="1" {{ $edit_admin->product == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_2">Product</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="slider" type="checkbox" id="checkbox_3" value="1" {{ $edit_admin->slider == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_3">Slider</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="coupon" type="checkbox" id="checkbox_4" value="1" {{ $edit_admin->coupon == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_4">Coupon</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input name="shipping" type="checkbox" id="checkbox_5" value="1" {{ $edit_admin->shipping == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_5">Shipping</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="order" type="checkbox" id="checkbox_6" value="1" {{ $edit_admin->order == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_6">Order</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="report" type="checkbox" id="checkbox_7" value="1" {{ $edit_admin->report == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_7">Report</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="user" type="checkbox" id="checkbox_8" value="1" {{ $edit_admin->user == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_8">User</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input name="brand" type="checkbox" id="checkbox_9" value="1" {{ $edit_admin->brand == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_9">Brand</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="stock" type="checkbox" id="checkbox_10" value="1" {{ $edit_admin->stock == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_10">Stock</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="returnorder" type="checkbox" id="checkbox_11" value="1" {{ $edit_admin->returnorder == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_11">Return Order</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="review" type="checkbox" id="checkbox_12" value="1" {{ $edit_admin->review == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_12">Review</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input name="blog" type="checkbox" id="checkbox_13" value="1" {{ $edit_admin->blog == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_13">Blog</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="setting" type="checkbox" id="checkbox_14" value="1" {{ $edit_admin->setting == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_14">Setting</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input name="adminuserrole" type="checkbox" id="checkbox_15" value="1" {{ $edit_admin->adminuserrole == 1 ? 'checked':'' }}>
                                                            <label for="checkbox_15">Admin User Role</label>
                                                        </fieldset>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>




                                <div class="text-xs-right">
                                    <input name="submit_button" value="Update Admin Role" class="btn btn-primary" type="submit">
                                </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
    <br><br><br><br><br><br><br><br>

    <script>
        $(document).ready(function (){


            $('input[name="profile_photo_path"]').change(function (e){
                let url = URL.createObjectURL(e.target.files[0]);
                if (url){
                    $('#image').attr('src',url).width(200).height(200);
                }
            });


        });

    </script>


@endsection
