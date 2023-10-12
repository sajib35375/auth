@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="row">
        <div style="margin: 20px;" class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Seo Setting</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('seo.page.update',$seo->id) }}" method="POST" >
                        @csrf

                        <div class="form-group">
                            <label for="#">Meta Title</label><span class="text-danger">*</span>
                            <input name="meta_title" class="form-control" value="{{ $seo->meta_title }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="#">Meta Author</label><span class="text-danger">*</span>
                            <input  name="meta_author" class="form-control" value="{{ $seo->meta_author }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="#">Meta Ketwords</label><span class="text-danger">*</span>
                            <input  name="meta_keywords" class="form-control" value="{{ $seo->meta_keywords }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="#">Meta Description</label><span class="text-danger">*</span>
                            <input  name="meta_description" class="form-control" value="{{ $seo->meta_description }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="#">Google Analytics</label><span class="text-danger">*</span>
                            <input  name="google_analytics" class="form-control" value="{{ $seo->google_analytics }}" type="text">
                        </div>

                        <div class="form-group">
                            <input value="Update" class="btn btn-info" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function (){
            $(document).on('change','#logo',function (e){
                let url = URL.createObjectURL(e.target.files[0]);
                $('#logo_load').attr('src',url).width(120).height(100);
            });
        });
    </script>



@endsection
