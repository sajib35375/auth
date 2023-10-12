@extends('admin.admin_master')
@section('admin')




    <section>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('validate')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Product<span class="badge badge-pill badge-danger">{{ count($products) }}</span></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product Name </th>
                                        <th>Product Quantity</th>
                                        <th>Product Color</th>
                                        <th>Product Selling Price</th>
                                        <th>Product Discount Percentage</th>
                                        <th>Product status</th>
                                        <th>Product Image</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $products as $product )
                                        <tr>
                                            <td>{{ $product->product_name_eng }}</td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td>{{ $product->product_color_eng }}</td>
                                            <td>{{ $product->product_selling_price }}</td>
                                            <td>
                                                @if( $product->product_discount_price )
                                                    @php
                                                        $discount = ($product->product_selling_price) - ($product->product_discount_price);
                                                    @endphp
                                                @else
                                                    @php
                                                        $discount = ( $product->product_selling_price ) - ( $product->product_selling_price );
                                                    @endphp
                                                @endif
                                                @php
                                                    $amount = ($discount / $product->product_selling_price)*100;
                                                @endphp

                                                {{ round($amount) }}%
                                            </td>
                                            <td>
                                                @if( $product->status==1 )
                                                    <span class="badge badge-success">active</span>
                                                @else
                                                    <span class="badge badge-danger">inactive</span>
                                                @endif
                                            </td>
                                            <td><img style="width: 60px;height: 40px;" src="{{ URL::to('') }}/images/thumbnail/{{ $product->product_thumbnail }}" alt=""></td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Product Color</th>
                                        <th>Product Selling Price</th>
                                        <th>Product Discount Percentage</th>
                                        <th>Product status</th>
                                        <th>Product Image</th>
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


            </div>

        </div>

    </section>







@endsection
