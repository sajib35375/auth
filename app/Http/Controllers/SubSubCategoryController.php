<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    public function AllSubSubCategory(){
        $cat = Category::all();
//        $sub_cat = SubCategory::all();
        $sub_sub = SubSubCategory::latest()->get();
        return view('admin.sub_subcategory',compact('cat','sub_sub'));
    }
    public function ShowSubCategory($id){
        $All_sub_cat = SubCategory::where('category_id',$id)->get();
        return json_encode($All_sub_cat);
    }
    public function showSubSubCategory($sub_id){
        $SubSub = SubSubCategory::where('subcategory_id',$sub_id)->get();
        return json_encode($SubSub);
    }
    public function SubSubCategory_store(Request $request){
        $this->validate($request,[
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name_en' => 'required',
            'name_ban' => 'required',
        ]);
        SubSubCategory::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_name_eng' => $request->name_en,
            'sub_subcategory_slug_eng' => str::slug($request->name_en),
            'sub_subcategory_name_bang' => $request->name_ban,
            'sub_subcategory_slug_ban' => str::slug($request->name_ban),
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory Added Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubSubCategory_edit($id){
        $cat = Category::all();
        $sub_cat = SubCategory::all();
        $sub_sub_cat = SubSubCategory::find($id);
        return view('admin.sub_subcategory_edit',compact('cat','sub_cat','sub_sub_cat'));
    }
    public function SubSubCategory_update(Request $request,$id){
        $update_data = SubSubCategory::find($id);
        $update_data->category_id = $request->category_id;
        $update_data->subcategory_id = $request->subcategory_id;
        $update_data->sub_subcategory_name_eng = $request->name_en;
        $update_data->sub_subcategory_name_bang = $request->name_ban;
        $update_data->	sub_subcategory_slug_eng = str::slug($request->name_en);
        $update_data->	sub_subcategory_slug_ban = str::slug($request->name_ban);
        $update_data->update();

        $notification = array(
            'message' => 'SubSubCategory Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('sub.subcategory')->with($notification);
    }
    public function SubSubCategory_delete($id){
            $delete_data = SubSubCategory::find($id);
            $delete_data->delete();
        $notification = array(
            'message' => 'SubSubCategory Deleted Successfully',
            'alert_type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function SelectSubCategory_edit($id){
        $subcat = SubCategory::where('category_id',$id)->get();
        return json_encode($subcat);
    }
//    public function EditSubShow(){
//       $product = SubCategory::all();
//        return response()->json($product->category_id);
//    }
}
