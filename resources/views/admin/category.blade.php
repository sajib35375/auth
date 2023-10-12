@extends('admin.admin_master')
@section('admin')




    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Category <span class="badge badge-pill badge-danger">{{ count($cat) }}</span></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category Name English</th>
                                        <th>Category Name Bangla</th>
                                        <th>Category Icon</th>
                                        <th width="30%">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $cat as $category )
                                        <tr>
                                            <td>{{ $category->category_name_en }}</td>
                                            <td>{{ $category->category_name_ban }}</td>
                                            <td><span><i class="{{ $category->category_icon }}"></i></span></td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('category.edit',$category->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="{{ route('category.delete',$category->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Category Name English</th>
                                        <th>Category Name Bangla</th>
                                        <th>Category Icon</th>
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
                       <h2>Add New Category</h2>
                   </div>
                   <div class="card-body">

                           <h2>Add Category</h2>
                           <hr>
                           <form action="{{ route('category.store') }}" method="POST" >
                               @csrf
                               <div class="form-group">
                                   <label for="#">Category Name English</label>
                                   <input name="name_en" class="form-control" type="text">
                                   @error('name_en')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="#">Category Name Bangla</label>
                                   <input name="name_ban" class="form-control" type="text">
                                   @error('name_ban')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="#">Category Icon</label>
                                   <input name="icon" class="form-control" type="text">
                                   @error('icon')
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
