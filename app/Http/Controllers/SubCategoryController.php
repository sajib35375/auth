<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Livewire\str;

class SubCategoryController extends Controller
{
    public function AllSubCategory(){
        $cat = Category::all();
        $sub_cat = SubCategory::latest()->get();
        return view('admin.sub_category',compact('cat','sub_cat'));
    }
    public function StoreSubCategory(Request $request){
        $this->validate($request,[
            'name_en' => 'required',
            'name_ban' => 'required',
            'category_id' => 'required',
        ]);
        SubCategory::create([
            'sub_cat_name_eng' => $request->name_en,
            'sub_cat_name_ban' => $request->name_ban,
            'sub_cat_slug_eng' => str::slug( $request->name_en),
            'sub_cat_slug_ban' => str::slug( $request->name_ban),
            'category_id' => $request->category_id,
        ]);
        $notification = array(
            'message' => 'SubCategory inserted successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function EditSub($id){
        $edit_sub = SubCategory::find($id);
        $cat = Category::all();
        return view('admin.subcategory_edit',compact('edit_sub','cat'));
    }
    public function UpdateSub(Request $request,$id){
            $update_data = SubCategory::find($id);
            $update_data->category_id = $request->category_id;
            $update_data->sub_cat_name_eng = $request->name_en;
            $update_data->sub_cat_name_ban = $request->name_ban;
            $update_data->sub_cat_slug_eng = str::slug($request->name_en);
            $update_data->sub_cat_slug_ban = str::slug($request->name_ban);
            $update_data->update();

            $notification = array(
                'message' => 'SubCategory updated successfull',
                'alert_type' => 'success'
            );
            return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubShow($id){
        $subcategory = SubCategory::where('category_id',$id)->get();

        return response()->json($subcategory);
    }




    public function DeleteSub($id){
        $delete_sub = SubCategory::find($id);
        $delete_sub->delete();
        $notification = array(
            'message' => 'Delete Subcategory Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
