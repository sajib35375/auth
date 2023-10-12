@extends('admin.admin_master')

@section('admin')


    <div  style="margin:10px;" class="card">
        <div class="card-header">
            <h2>Coupon Edit</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <h2>Add Category</h2>
                <hr>
                <form action="{{ route('coupon.update',$coupon_edit->id) }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="#">Coupon Name</label>
                        <input name="coupon_name" class="form-control" value="{{ $coupon_edit->coupon_name }}" type="text">
                        @error('coupon_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="#">Coupon Amount(%)</label>
                        <input name="discount_amount" value="{{ $coupon_edit->discount_amount }}" class="form-control" type="text">
                        @error('discount_amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="#">Coupon Validity</label>
                        <input name="coupon_validity" value="{{ $coupon_edit->coupon_validity }}" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" type="date">
                        @error('coupon_validity')
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









@endsection
