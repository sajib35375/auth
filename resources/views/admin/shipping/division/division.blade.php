@extends('admin.admin_master')
@section('admin')




    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Division Table</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Division Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $div as $data )
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $data->division_name }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('division.edit',$data->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="{{ route('division.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Division Name</th>
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
                        <h2>Add New Division</h2>
                    </div>
                    <div class="card-body">



                                <form action="{{ route('division.store') }}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="#">Division Name</label>
                                        <input name="division_name" class="form-control" type="text">
                                        @error('division_name')
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
