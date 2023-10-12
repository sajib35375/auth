@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Sub-SubCategory<span class="badge badge-pill badge-danger">{{ count($sub_sub) }}</span></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>SubCategory Name</th>
                                        <th>SubSubCategory Name English</th>
                                        <th>SubSubCategory Name Bangla</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $sub_sub as $category )
                                        <tr>
                                            <td>{{ $category->category->category_name_en }}</td>
                                            <td>{{ $category->subcategory->sub_cat_name_eng }}</td>
                                            <td>{{ $category->sub_subcategory_name_eng }}</td>
                                            <td>{{ $category->sub_subcategory_name_bang }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('sub.subcategory.edit',$category->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="{{ route('sub.subcategory.delete',$category->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Category Name </th>
                                        <th>SubCategory Name </th>
                                        <th>SubSubCategory Name English </th>
                                        <th>SubSubCategory Name Bangla</th>
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
                       <h2>Add New SubSubCategory</h2>
                   </div>
                   <div class="card-body">


                           <form action="{{ route('sub.subcategory.store') }}" method="POST" >
                               @csrf
                               <div class="form-group">
                                   <label for="#">Category Name</label>
                                   <select name="category_id" id="" class="form-control">
                                       <option  value="">Select</option>
                                       @foreach( $cat as $category )
                                           <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                       @endforeach
                                   </select>
                                   @error('category_id')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="#">SubCategory Name</label>
                                   <select name="subcategory_id" id="" class="form-control">
                                       <option class="disabled">Select</option>
                                   </select>
                                   @error('subcategory_id')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="#">Sub-SubCategory Name English</label>
                                   <input name="name_en" class="form-control" type="text">
                                   @error('name_en')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="#">Sub-SubCategory Name Bangla</label>
                                   <input name="name_ban" class="form-control" type="text">
                                   @error('name_ban')
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
        </div>
    </section>

<script>
    $(document).ready(function(){
      $('select[name="category_id"]').change(function (){
        let id = $(this).val();
        if (id){
         $.ajax({
           url:"{{ url('show-subcategory') }}/"+id,
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
