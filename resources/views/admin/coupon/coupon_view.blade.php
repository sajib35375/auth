@extends('admin.admin_master')
@section('admin')




    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Coupon Table</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Amount(%)</th>
                                        <th>Coupon Validity</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $coupon_data as $data )
                                        <tr>
                                            <td>{{ $data->coupon_name }}</td>
                                            <td>{{ $data->discount_amount }}%</td>
                                            <td>{{ Carbon\Carbon::parse( $data->coupon_validity )->format('D,d-m-y') }}</td>
                                            <td>
                                                @if( $data->coupon_validity >=Carbon\Carbon::now()->format('Y-m-d') )
                                                    <span class="btn btn-sm btn-success" href="#">Valid</span>
                                                @else
                                                    <span class="btn btn-sm btn-danger" href="#">Invalid</span>
                                                    @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('coupon.edit',$data->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="{{ route('coupon.delete',$data->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Amount(%)</th>
                                        <th>Coupon Validity</th>
                                        <th>Status</th>
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
                    <h2>Add Coupon</h2>
                    <hr>
                    <form action="{{ route('coupon.store') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="#">Coupon Name</label>
                            <input name="coupon_name" class="form-control" type="text">
                            @error('coupon_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="#">Coupon Amount(%)</label>
                            <input name="discount_amount" class="form-control" type="text">
                            @error('discount_amount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="#">Coupon Validity</label>
                            <input name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" type="date">
                            @error('coupon_validity')
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
    </section>







@endsection
