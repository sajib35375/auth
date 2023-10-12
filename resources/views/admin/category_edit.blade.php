@extends('admin.admin_master')
@section('admin')



<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h2>Edit Category</h2>
        </div>


   <div class="card-body">
       <form action="{{ route('category.update',$edit_cat->id) }}" method="POST" >
           @csrf
           <div class="form-group">
               <label for="#">Category Name English</label>
               <input name="name_en" class="form-control" value="{{ $edit_cat->category_name_en }}" type="text">
               @error('name_en')
               <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
           <div class="form-group">
               <label for="#">Category Name Bangla</label>
               <input name="name_ban" class="form-control" value="{{ $edit_cat->category_name_ban }}" type="text">
               @error('name_ban')
               <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
           <div class="form-group">
               <label for="#">Category Icon</label>
               <input name="icon" class="form-control" value="{{ $edit_cat->category_icon }}" type="text">
               @error('icon')
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
@endsection
