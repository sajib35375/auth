@extends('admin.admin_master')

@section('admin')

    <div style="margin: 15px;" class="card">
        <div class="card-body">
            <div class="col-md-4">
                <h2>Edit Division</h2>
                <hr>
                <div class="card-body">
                    <form action="{{ route('division.update',$all_data->id) }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="#">Division Name</label>
                            <input name="division_name" value="{{ $all_data->division_name }}" class="form-control" type="text">
                            @error('division_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input value="update" class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
