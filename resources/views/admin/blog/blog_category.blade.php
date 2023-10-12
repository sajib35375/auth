@extends('admin.admin_master')
@section('admin')




    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Blog Category <span class="badge badge-pill badge-danger">{{ count($all_cat) }}</span></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Blog Category Name English</th>
                                        <th>Blog Category Name Bangla</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $all_cat as $category )
                                        <tr>
                                            <td>{{ $category->blog_category_name_eng }}</td>
                                            <td>{{ $category->blog_category_name_ban }}</td>
                                            <td>
                                                <a class="btn btn-info" href="#"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Blog Category Name English</th>
                                        <th>Blog Category Name Bangla</th>
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
                       <h2>Add New Blog Category</h2>
                   </div>
                   <div class="card-body">

                           <form action="{{ route('blag.category.store') }}" method="POST" >
                               @csrf
                               <div class="form-group">
                                   <label for="#">Blog Category Name English</label>
                                   <input name="blog_cat_eng" class="form-control" type="text">
                                   @error('blog_cat_eng')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="#">Blog Category Name Bangla</label>
                                   <input name="blog_cat_ban" class="form-control" type="text">
                                   @error('blog_cat_ban')
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

    </section>







@endsection
