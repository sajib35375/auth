<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function SliderShow(){
        $sliders = Slider::all();
        return view('admin.slider.slider_show',compact('sliders'));
    }
    public function SliderStore(Request $request){
        $this->validate($request,[
            'title_eng' => 'required',
            'title_ban' => 'required',
            'short_des_eng' => 'required',
            'short_des_ban' => 'required',
            'slider_img' => 'required',
        ]);

        if ($request->hasFile('slider_img')){
            $image = $request->file('slider_img');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,628)->save('images/slider/'.$unique_name);

        }

        Slider::create([
                'title_eng' => $request->title_eng,
                'title_ban' => $request->title_ban,
                'short_des_eng' => $request->short_des_eng,
                'short_des_ban' => $request->short_des_ban,
                'slider_img' => $unique_name,
        ]);
        $notification = array(
            'message' => 'Slider Added Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
    public function SliderEdit($id){
        $edit_data = Slider::find($id);
        return view('admin.slider.slider_edit',compact('edit_data'));
    }
    public function SliderUpdate(Request $request,$id){
        $update_data = Slider::find($id);

        if ($request->hasFile('slider_img')){
            $image = $request->file('slider_img');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,628)->save('images/slider/'.$unique_name);
            unlink('images/slider/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }

        $update_data->title_eng = $request->title_eng;
        $update_data->title_ban = $request->title_ban;
        $update_data->short_des_eng = $request->short_des_eng;
        $update_data->short_des_ban = $request->short_des_ban;
        $update_data->short_des_ban = $request->short_des_ban;
        $update_data->slider_img = $unique_name;
        $update_data->update();

        $notification = array(
            'message' => 'Slider update Successfully',
            'alert_type' => 'success',
        );
        return redirect()->route('slider.show')->with($notification);

    }
    public function StatusActive($id){
        $status_active = Slider::find($id);
        $status_active->status = false;
        $status_active->update();

        $notification = array(
            'message' => 'status inactive Successfully',
            'alert_type' => 'success',
        );
        return redirect()->route('slider.show')->with($notification);
    }

    public function StatusInactive($id){
        $status_active = Slider::find($id);
        $status_active->status = true;
        $status_active->update();

        $notification = array(
            'message' => 'status active Successfully',
            'alert_type' => 'success',
        );
        return redirect()->route('slider.show')->with($notification);
    }
    public function SliderDelete($id){
        $delete_data = Slider::findOrFail($id);
        $delete_data->delete();
        unlink($delete_data->slider_img);

        $notification = array(
            'message' => 'slider deleted Successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }




}
