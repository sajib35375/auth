@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section>
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Post</h2>
                </div>
                <div class="card-body">
                    <div class="row">

                        <form action="{{ route('add.new.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="col-12">
                            <div class="row">
                            <div  class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Title English</label>
                                    <input name="title_eng" class="form-control" type="text">
                                </div>
                            </div>
                            <div  class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Title Bangla</label>
                                    <input name="title_ban" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <img id="img_load" src="" alt="">
                                            <input id="image" name="photo" class="form-control-file" type="file">
                                        </div>

                                </div>
                                <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="">Blog Category</label>
                                            <select class="form-control" name="category_id" id="">
                                                <option value="">-Select-</option>
                                                @foreach( $all_cat as $cat )
                                                <option value="{{ $cat->id }}">{{ $cat->blog_category_name_eng }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                </div>
                            </div>
                            <div class="row">
                                <div  class="col-sm-6">
                                    <div class="form-group">
                                        <textarea id="editor1" name="long_des_eng" rows="10" cols="80">
                                        This is my textarea for English
                                        </textarea>
                                    </div>
                                </div>

                                <div  class="col-sm-6">
                                    <div class="form-group">
                                             <textarea id="editor2" name="long_des_ban" rows="10" cols="80">
                                            This is my textarea for Bangla
                                            </textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input value="Add New" class="btn btn-success" type="submit">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function (){
           $(document).on('change','#image',function (e){
               let url = URL.createObjectURL(e.target.files[0]);
                $('#img_load').attr('src',url).width(100).height(100);
           });
        });
    </script>





@endsection
