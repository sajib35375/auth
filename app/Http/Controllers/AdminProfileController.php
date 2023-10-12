<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profile = Admin::find($id);
        return view('admin.profile',compact('profile'));
    }
    public function AdminProfileEdit(){
        $id = Auth::user()->id;
        $edit_profile = Admin::find($id);
        return view('admin.admin_edit',compact('edit_profile'));
    }
    public function AdminProfileUpdate(Request $request,$id){
        $update_data = Admin::find($id);

        $unique_name = '';
        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(360,360)->save('images/profile/'.$unique_name);
            unlink('images/profile/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }

        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->profile_photo_path = $unique_name;
        $update_data->update();

        $notification = array(
            'message' => 'profile updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminPasswordChange(){
        return view('admin.passward_change');
    }

    public function AdminPasswordUpdate(Request $request){
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hash_pass = Auth::user()->password;
        if (password_verify($request->old_password,$hash_pass)){
            $pass_data = Admin::find(Auth::id());
            $pass_data->password = password_hash($request->password,PASSWORD_DEFAULT);
            $pass_data->update();

        }
        $notification = array(
            'message' => 'password change successful',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
//    for user

    public function allUser(){
        $all_user = User::latest()->get();
        return view('admin.user.all_user',compact('all_user'));
    }


    public function UserEdit($id){
        $edit_user = User::find($id);

        return view('admin.user.edit_user',compact('edit_user'));

    }

    public function UserUpdate(Request $request,$id){
        $update_data = User::find($id);
        $unique_name = '';
        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(200,200)->save('images/user/'.$unique_name);
        }else{
            $unique_name = $request->old_photo;
        }


        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->phone = $request->phone;
        $update_data->profile_photo_path = $unique_name;
        $update_data->update();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }











}
