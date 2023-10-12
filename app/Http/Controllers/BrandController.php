<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand_index',compact('brands'));
    }
    public function brandStore(Request $request){
        $this->validate($request,[
            'name_en' => 'required',
            'name_ban' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,500)->save('images/brand/'.$unique_name);

        }

        Brand::create([
            'brand_name_en' => $request->name_en,
            'brand_name_ban' => $request->name_ban,
            'brand_slug_en' => str::slug($request->name_en),
            'brand_slug_ban' => str::slug($request->name_ban),
            'brand_image' => $unique_name,
        ]);
        $notification = array(

            'message' => 'brand Added successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function brandEdit($id){
        $edit_brand = Brand::find($id);
        return view('admin.edit_brand',compact('edit_brand'));
    }
    public function brandUpdate(Request $request,$id){
        $update_data = Brand::find($id);

        $unique_name= '';
       if ($request->hasFile('image')){
           $image = $request->file('image');
           $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(500,500)->save('images/brand/'.$unique_name);
            unlink('images/brand/'.$request->old_image);
       }else{
           $unique_name = $request->old_image;
       }

        $update_data->brand_name_en = $request->name_en;
        $update_data->brand_slug_en = str::slug($request->name_en);
        $update_data->brand_name_ban = $request->name_ban;
        $update_data->brand_slug_ban = str::slug($request->name_ban);
        $update_data->brand_image = $unique_name;
        $update_data->update();

        $notification = array(

           'message' => 'brand updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('brand.index')->with($notification);
    }
    public function brandDelete($id){
        $delete_brand = Brand::find($id);
        $delete_brand->delete();
        unlink('images/brand/'.$delete_brand->brand_image);

        $notification = array(
            'message' => 'brand deleted successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
