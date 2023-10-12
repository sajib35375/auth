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
                            <h3 class="box-title">State Table</h3>

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
                                        <th>State Name</th>
                                        <th>Shipping Charge</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $state as $data )
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $data->division->division_name }}</td>
                                            <td>{{ $data->district->district_name }}</td>
                                            <td>{{ $data->state_name }}</td>
                                            <td>{{ $data->Shipping_charge }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('state.edit',$data->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="{{ route('state.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Division Name</th>
                                        <th>District Name</th>
                                        <th>State Name</th>
                                        <th>Shipping Charge</th>
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
                        <h2>Add New State</h2>
                    </div>
                    <div class="card-body">
                                <form action="{{ route('store.state') }}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="#">Division Name</label>
                                        <select class="form-control" name="division_id" id="division_id">
                                            <option value="" >-Select-</option>
                                            @foreach( $division as $div )

                                                <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="#">District Name</label>
                                        <select class="form-control" name="district_id" id="district_load">

                                        </select>
                                        @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="#">State Name</label>
                                        <input name="state_name" class="form-control" type="text">
                                        @error('state_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Shipping Charge</label>
                                        <input name="Shipping_charge" class="form-control" type="text">
                                        @error('Shipping_charge')
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
        $(document).ready(function (){
            $('select[name="division_id"]').change(function (){
                let id = $(this).val();
                if (id){
                    $.ajax({
                        url:"{{ url('/district/show/') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            var d = $('select[name="district_id"]').empty();
                            $.each(data,function (key,value){
                                $('select[name="district_id').append('<option value="'+value.id+'">'+value.district_name+'</option>');
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
