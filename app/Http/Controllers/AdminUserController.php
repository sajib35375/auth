<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AdminUserController extends Controller
{
    public function AdminUser(){
        $admin_user = Admin::where('type',2)->latest()->get();
        return view('admin.role.admin_user_role',compact('admin_user'));
    }
    public function AddAdminUser(){
        return view('admin.role.add_admin_user');
    }
    public function AddAdminUserStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ( $request->hasFile('profile_photo_path') ){
            $img = $request->file('profile_photo_path');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(360,360)->save('images/profile/'.$unique_name);

        }




        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password,PASSWORD_DEFAULT),
            'phone' => $request->phone,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupon' => $request->coupon,
            'shipping' => $request->shipping,
            'order' => $request->order,
            'report' => $request->report,
            'user' => $request->user,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $unique_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Admin user role inserted successfully'
        );
        return redirect()->route('admin.user')->with($notification);



    }
    public function AdminUserEdit($id){
        $edit_admin = Admin::find($id);
        return view('admin.role.edit_admin_user',compact('edit_admin'));
    }

    public function AdminUserUpdate(Request $request,$id){
        $update_data = Admin::find($id);

        $unique_name = '';
        if ($request->hasFile('profile_photo_path')){
            $img = $request->file('profile_photo_path');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(360,360)->save('images/admin/'.$unique_name);
            unlink('images/admin/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }



        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->phone = $request->phone;
        $update_data->category = $request->category;
        $update_data->product = $request->product;
        $update_data->slider = $request->slider;
        $update_data->coupon = $request->coupon;
        $update_data->shipping = $request->shipping;
        $update_data->order = $request->order;
        $update_data->report = $request->report;
        $update_data->user = $request->user;
        $update_data->brand = $request->brand;
        $update_data->stock = $request->stock;
        $update_data->returnorder = $request->returnorder;
        $update_data->review = $request->review;
        $update_data->blog = $request->blog;
        $update_data->setting = $request->setting;
        $update_data->adminuserrole = $request->adminuserrole;
        $update_data->profile_photo_path = $unique_name;
        $update_data->updated_at = Carbon::now();
        $update_data->update();

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Admin User Role Update Successfully'
        );

        return redirect()->route('admin.user')->with($notification);
    }
    public function AdminUserDelete($id){
        $delete_data = Admin::find($id);
        $delete_data->delete();
        unlink('images/admin/'.$delete_data->profile_photo_path);

        $notification = array(
            'alert_type' => 'warning',
            'message' => 'Admin User Role Delete Successfully'
        );
        return redirect()->back()->with($notification);
    }
    public function TrackingOrder(Request $request){
        $invoice = $request->order_track;
        $track = Order::where('invoice_number',$invoice)->first();

        if ($track){

            return view('frontend.tracking.order_track',compact('track'));

        }else{
            $notification = array(
                'alert_type' => 'error',
                'message' => 'Invalid Invoice Number'
            );
            return redirect()->back()->with($notification);
        }
    }


}
