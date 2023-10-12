@extends('admin.admin_master')
@section('admin')




    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">District Table</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Division Name</th>
                                        <th>District Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $district as $data )
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $data->division->division_name }}</td>
                                            <td>{{ $data->district_name }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('edit.district',$data->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="{{ route('delete.district',$data->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Division Name</th>
                                        <th>District Name</th>
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
                        <h2>Add New District</h2>
                    </div>
                    <div class="card-body">


                                <form action="{{ route('store.district') }}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="#">Division Name</label>
                                        <select class="form-control" name="division_id" id="">
                                            <option value="" >-Select-</option>
                                            @foreach( $division as $div )

                                                <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="#">District Name</label>
                                        <input name="district_name" class="form-control" type="text">
                                        @error('district_name')
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
