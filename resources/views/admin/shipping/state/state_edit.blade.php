@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h2>State Edit</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ route('state.update',$state->id) }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="#">Division Name</label>
                                    <select class="form-control" name="division_id" id="division_id">
                                        <option value="" >-Select-</option>
                                        @foreach( $division as $div )

                                            <option {{ $div->id == $state->division_id ?'selected':'' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="#">District Name</label>
                                    <select class="form-control" name="district_id" id="district_load">
                                        @foreach( $district as $dis )

                                            <option {{ $dis->id == $state->district_id ?'selected':'' }} value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">State Name</label>
                                    <input name="state_id" value="{{ $state->state_name }}" class="form-control" type="text">
                                    @error('state_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="#">Ship Charge</label>
                                    <input name="Shipping_charge" value="{{ $state->Shipping_charge }}" class="form-control" type="text">
                                    @error('Shipping_charge')
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
        </div>
    </div>


@endsection
