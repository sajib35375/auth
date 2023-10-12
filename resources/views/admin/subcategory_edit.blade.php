@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Sub Category Edit</h2>
                </div>
                <div class="card-body">


                        <form action="{{ route('update.sub',$edit_sub->id) }}" method="POST" >
                            @csrf


                            <div class="form-group">
                                <label for="#">Select Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option  value="">Select</option>
                                    @foreach( $cat as $category )
                                        <option value="{{ $category->id }}" {{ $category->id == $edit_sub->category_id ?'selected':'' }}>{{ $category->category_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="#">SubCategory Name English</label>
                                <input name="name_en" class="form-control" value="{{  $edit_sub->sub_cat_name_eng }}" type="text">
                                @error('name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="#">SubCategory Name Bangla</label>
                                <input name="name_ban" class="form-control" value="{{  $edit_sub->sub_cat_name_ban }}" type="text">
                                @error('name_ban')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input value="update" class="btn btn-success " type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
