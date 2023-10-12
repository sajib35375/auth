@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div  class="col-md-12">
            <div style="margin-top: 10px;" class="card">
                <div class="card-header">
                    <h2>All Pending Review</h2>
                </div>
                <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="20%">User Name</th>
                                <th>Product Name</th>
                                <th>Summary</th>
                                <th width="30%">Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $reviews as $review )
                                <tr>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->product->product_name_eng }}</td>
                                    <td>{{ $review->summery }}</td>
                                    <td>{{ $review->review }}</td>
                                    <td>
                                        @if( $review->status == false )
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif( $review->status == true )
                                            <span class="badge badge-success">Success</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('approve.review',$review->id) }}">Approve</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
