@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div  class="col-md-12">
            <div style="margin-top: 10px;" class="card">
                <div class="card-header">
                    <h2>Admin User</h2>
                </div>
                <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th width="35%">Access</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $admin_user as $item )
                                <tr>
                                    <td><img style="width: 50px;height: 50px;" src="{{ URL::to('') }}/images/profile/{{ $item->profile_photo_path }}" alt=""></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email  }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if( $item->category == 1 )
                                            <span class="badge" style="background-color: #00CBA0; color: black;">Category</span>
                                        @else
                                        @endif
                                            @if( $item->product == 1 )
                                                <span class="badge" style="background-color: #8c0615; color: black;">Product</span>
                                            @else
                                            @endif
                                            @if( $item->slider == 1 )
                                                <span class="badge" style="background-color: #0b97c4; color: black;">Slider</span>
                                            @else
                                            @endif
                                            @if( $item->coupon == 1 )
                                                <span class="badge" style="background-color: #0D3349; color: black;">Coupon</span>
                                            @else
                                            @endif
                                            @if( $item->shipping == 1 )
                                                <span class="badge" style="background-color: #1ab7ea; color: black;">Shipping</span>
                                            @else
                                            @endif
                                            @if( $item->order == 1 )
                                                <span class="badge" style="background-color: #00E466; color: black;">Order</span>
                                            @else
                                            @endif
                                            @if( $item->report == 1 )
                                                <span class="badge" style="background-color: #4b05a1; color: black;">Report</span>
                                            @else
                                            @endif
                                            @if( $item->user == 1 )
                                                <span class="badge" style="background-color: #4b05a1; color: black;">User</span>
                                            @else
                                            @endif
                                            @if( $item->brand == 1 )
                                                <span class="badge" style="background-color: #8c0615; color: black;">Brand</span>
                                            @else
                                            @endif
                                            @if( $item->stock == 1 )
                                                <span class="badge" style="background-color: #00f0ff; color: black;">Stock</span>
                                            @else
                                            @endif
                                            @if( $item->returnorder == 1 )
                                                <span class="badge" style="background-color: #4b05a1; color: black;">ReturnOrder</span>
                                            @else
                                            @endif
                                            @if( $item->review == 1 )
                                                <span class="badge" style="background-color: #009926; color: black;">Review</span>
                                            @else
                                            @endif
                                            @if( $item->blog == 1 )
                                                <span class="badge" style="background-color: #8e24aa; color: black;">Blog</span>
                                            @else
                                            @endif
                                            @if( $item->setting == 1 )
                                                <span class="badge" style="background-color: #8e24aa; color: black;">Setting</span>
                                            @else
                                            @endif
                                            @if( $item->adminuserrole == 1 )
                                                <span class="badge" style="background-color: #3FA30C; color: black;">AdminUserRole</span>
                                            @else
                                            @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('admin.user.edit',$item->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" href="{{ route('admin.user.delete',$item->id) }}"><i class="fa fa-trash"></i></a>
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
