@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="col-md-8">
        <h2>Edit Category</h2>
        <hr>
        <form action="{{ route('sub.subcategory.update',$sub_sub_cat->id) }}" method="POST" >
            @csrf


            <div class="form-group">
                <label for="#">Select Category</label>
                <select name="category_id" id="" class="form-control">
                    <option  value="">Select</option>
                    @foreach( $cat as $category )
                        <option value="{{ $category->id }}" {{ $category->id == $sub_sub_cat->category_id ?'selected':'' }} >{{ $category->category_name_en }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="#">Select SubCategory</label>
                <select name="subcategory_id" id="" class="form-control">
                    <option  value="">Select</option>
{{--                    @foreach( $sub_cat as $category )--}}
{{--                        <option value="{{ $category->id }}" {{ $category->id == $sub_sub_cat->subcategory_id ?'selected':'' }} >{{ $category->sub_cat_name_eng }}</option>--}}
{{--                    @endforeach--}}
                </select>
                @error('subcategory_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="#">SubCategory Name English</label>
                <input name="name_en" class="form-control" value="{{  $sub_sub_cat->sub_subcategory_name_eng }}" type="text">
                @error('name_en')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="#">SubCategory Name Bangla</label>
                <input name="name_ban" class="form-control" value="{{  $sub_sub_cat->sub_subcategory_name_bang }}" type="text">
                @error('name_ban')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input value="update" class="btn btn-success " type="submit">
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function(){
            $('select[name="category_id"]').change(function (){
                let id = $(this).val();
                if (id){
                    $.ajax({
                        url:"{{ url('select-subcategory') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data,function (key,value){
                                $('select[name="subcategory_id').append('<option value="'+value.id+'">'+value.sub_cat_name_eng+'</option>');
                            })
                        }
                    });
                }else{
                    alert('danger');
                }
            });

        });
    </script>



@endsection
