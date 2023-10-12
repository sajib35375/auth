<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CouponController extends Controller
{
    public function manageCoupon(){
        $coupon_data = Coupon::latest()->get();
        return view('admin.coupon.coupon_view',compact('coupon_data'));
    }
    public function CouponStore(Request $request){
        $this->validate($request,[
            'coupon_name' => 'required',
            'discount_amount' => 'required',
            'coupon_validity' => 'required',
        ]);
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'discount_amount' => $request->discount_amount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'coupon inserted successfully'
        );
        return redirect()->route('manage.coupon')->with($notification);
    }
    public function CouponEdit($id){
        $coupon_edit = Coupon::find($id);
        return view('admin.coupon.coupon_edit',compact('coupon_edit'));
    }
    public function CouponUpdate(Request $request,$id){
            $update_data = Coupon::find($id);
            $update_data->coupon_name = $request->coupon_name;
            $update_data->discount_amount = $request->discount_amount;
            $update_data->coupon_validity = $request->coupon_validity;
            $update_data->updated_at = Carbon::now();
            $update_data->update();

            $notification = array(
                'alert_type' => 'success',
                'message' => 'coupon updated successfully'
            );
            return redirect()->route('manage.coupon')->with($notification);
    }
    public function CouponDelete($id){
        $delete_data = Coupon::find($id);
        $delete_data->delete();

        $notification = array(
            'alert_type' => 'warning',
            'message' => 'coupon deleted successfully'
        );
        return redirect()->route('manage.coupon')->with($notification);
    }

}
