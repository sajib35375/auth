@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div  class="col-md-12">
            <div style="margin-top: 10px;" class="card">
                <div class="card-header">
                    <h2>All Posts</h2>
                </div>
                <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="30%">Title</th>
                                <th width="20%">Category</th>
                                <th width="20%">Photo</th>
                                <th width="10%">Status</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $posts as $post )
                                <tr>
                                    <td>{{ $post->title_eng }}</td>
                                    <td>{{ $post->category->blog_category_name_eng }}</td>
                                    <td><img style="width: 100px;height: 100px;" src="{{ URL::to('') }}/images/blog/{{ $post->photo }}" alt=""></td>
                                    <td>
                                        @if( $post->status ==true )
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="#"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
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
