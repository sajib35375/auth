@extends('admin.admin_master')
@section('admin')




    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All SubCategory <span class="badge badge-pill badge-danger">{{ count($sub_cat) }}</span></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>SubCategory Name English</th>
                                        <th>SubCategory Name Bangla</th>
                                        <th width="30%">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $sub_cat as $category )
                                        <tr>
                                            <td>{{ $category->category->category_name_en }}</td>
                                            <td>{{ $category->sub_cat_name_eng }}</td>
                                            <td>{{ $category->sub_cat_name_ban }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('edit.sub',$category->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="{{ route('delete.sub',$category->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Category Name </th>
                                        <th>Category Name English </th>
                                        <th>Category Name Bangla </th>
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
                       <h2>Add New SubCategory</h2>
                   </div>
                   <div class="card-body">

                           <h2>Add SubCategory</h2>
                           <hr>
                           <form action="{{ route('store.subcategory') }}" method="POST" >
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
                                   <label for="#">SubCategory Name English</label>
                                   <input name="name_en" class="form-control" type="text">
                                   @error('name_en')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="#">SubCategory Name Bangla</label>
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







@endsection
