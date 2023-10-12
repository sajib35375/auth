@extends('admin.admin_master')

@section('admin')



    <div style="margin: 15px;" class="card">
        <div class="card-header">
            <h2>Edit District</h2>
            <hr>
        </div>
        <div class="card-body">
            <div class="col-md-4">
                <div class="card-body">
                    <form action="{{ route('update.district',$edit_data->id) }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="#">Division Name</label>
                            <select class="form-control" name="division_id" id="">
                                <option value="" >-Select-</option>
                                @foreach( $div_data as $div )
                                    <option {{ $div->id==$edit_data->division_id ?'selected':'' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                @endforeach
                            </select>
                            @error('division_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="#">District Name</label>
                            <select class="form-control" name="district_id" id="">
                                <option value="">-Select-</option>
                            </select>
                            @error('district_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input value="Update" class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>









@endsection
