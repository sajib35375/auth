
@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <div class="row">
        <div style="margin: 20px;" class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Site Setting</h2>
               </div>
               <div class="card-body">
                        <form action="{{ route('site.setting.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group">
                               <img id="logo_load" src="{{ URL::to('') }}/images/logo/{{ $setting->logo }}" alt="">
                               <input name="old_logo" value="{{ $setting->logo }}" type="hidden">
                               <label for="#">Logo</label><span class="text-danger">*</span>
                               <input id="logo" name="logo" class="form-control-file"   type="file">
                           </div>
                           <div class="form-group">
                               <label for="#">Email</label><span class="text-danger">*</span>
                               <input name="email" class="form-control" value="{{ $setting->email }}" type="text">
                           </div>
                           <div class="form-group">
                               <label for="#">Company Name</label><span class="text-danger">*</span>
                               <input  name="company_name" class="form-control" value="{{ $setting->company_name }}" type="text">
                           </div>
                            <div class="form-group">
                                <label for="#">Company Address</label><span class="text-danger">*</span>
                                <input  name="company_address" class="form-control" value="{{ $setting->company_address }}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Phone One</label><span class="text-danger">*</span>
                                <input  name="phone_one" class="form-control" value="{{ $setting->phone_one }}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Phone Two</label><span class="text-danger">*</span>
                                <input  name="phone_two" class="form-control" value="{{ $setting->phone_two }}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Facebook</label><span class="text-danger">*</span>
                                <input  name="facebook" class="form-control" value="{{ $setting->facebook }}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Twitter</label><span class="text-danger">*</span>
                                <input  name="twitter" class="form-control" value="{{ $setting->twitter }}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Linkedin</label><span class="text-danger">*</span>
                                <input  name="linkedin" class="form-control" value="{{ $setting->linkedin }}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="#">Youtube</label><span class="text-danger">*</span>
                                <input  name="youtube" class="form-control" value="{{ $setting->youtube }}" type="text">
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
