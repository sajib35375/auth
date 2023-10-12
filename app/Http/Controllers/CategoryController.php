<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function AllCategory(){
        $cat = Category::latest()->get();
        return view('admin.category',compact('cat'));
    }
    public function CategoryStore(Request $request){
        $this->validate($request,[
            'name_en' => 'required',
            'name_ban' => 'required',
            'icon' => 'required',
        ]);
        Category::create([
            'category_name_en' => $request->name_en,
            'category_name_ban' => $request->name_ban,
            'category_slug_en' => str::slug($request->name_en),
            'category_slug_ban' => str::slug($request->name_ban),
            'category_icon' => $request->icon,
        ]);
        $notification = array(
            'message' => 'category added successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function CategoryEdit($id){
        $edit_cat = Category::find($id);
        return view('admin.category_edit',compact('edit_cat'));
    }
    public function CategoryUpdate(Request $request,$id){
        $update_cat = Category::find($id);
        $update_cat->category_name_en = $request->name_en;
        $update_cat->category_name_ban = $request->name_ban;
        $update_cat->category_slug_en = str::slug($request->name_en);
        $update_cat->category_slug_ban = str::slug($request->name_ban);
        $update_cat->category_icon = $request->icon;
        $update_cat->update();

        $notification = array(
            'message' => 'category updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
    public function CategoryDelete($id){
        $cat_delete = Category::find($id);
        $cat_delete->delete();

        $notification = array(
            'message' => 'category deleted successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
