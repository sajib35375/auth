<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function addProduct(){
        $cat = Category::all();
       $brands = Brand::all();
       $sub_cat = SubCategory::all();
        return view('admin.product.add_product',compact('cat','brands','sub_cat'));
    }
    public function storeProduct(Request $request){

        $this->validate($request,[
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sub_subcategory_id' => 'required',
            'product_name_eng' => 'required',
            'product_name_ban' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_tags_eng' => 'required',
            'product_tags_ban' => 'required',
            'product_size_eng' => 'required',
            'product_size_ban' => 'required',
            'product_color_eng' => 'required',
            'product_color_ban' => 'required',
            'product_selling_price' => 'required',
            'product_short_des_eng' => 'required',
            'product_short_des_ban' => 'required',
            'product_long_des_eng' => 'required',
            'product_long_des_ban' => 'required',
        ]);


            $image = $request->file('product_thumbnail');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('images/thumbnail/'.$unique_name);



        $product_id = Product::insertGetId([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'sub_subcategory_id' => $request->sub_subcategory_id,
                'product_name_eng' => $request->product_name_eng,
                'product_name_ban' => $request->product_name_ban,
                'product_slug_eng' => str::slug($request->product_name_eng),
                'product_slug_ban' => str::slug($request->product_name_ban),
                'product_code' => $request->product_code,
                'product_quantity' => $request->product_quantity,
                'product_tags_eng' => $request->product_tags_eng,
                'product_tags_ban' => $request->product_tags_ban,
                'product_size_eng' => $request->product_size_eng,
                'product_size_ban' => $request->product_size_ban,
                'product_color_eng' => $request->product_color_eng,
                'product_color_ban' => $request->product_color_ban,
                'product_selling_price' => $request->product_selling_price,
                'product_discount_price' => $request->product_discount_price,
                'product_short_des_eng' => $request->product_short_des_eng,
                'product_short_des_ban' => $request->product_short_des_ban,
                'product_long_des_eng' => $request->product_long_des_eng,
                'product_long_des_ban' => $request->product_long_des_ban,
                'product_thumbnail' => $unique_name,
                'featured' => $request->featured,
                'hot_deals' => $request->hot_deals,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'created_at' => Carbon::now(),
        ]);
//        for multi image
        $multi_img = $request->file('multi_img');
        foreach ($multi_img as $img){
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('images/multiple/'.$unique_name);
            $multiple = 'images/multiple/'.$unique_name;


            MultiImg::insert([
                'product_id' => $product_id,
                'image' => $multiple,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Added Successfully',
            'alert_type' => 'success',
        );
        return redirect()->route('manage.product')->with($notification);



    }
//    manage product
    public function manageProduct(){
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.product.manage_product',compact('products'));
    }

    public function editProduct($id){
        $products = Product::find($id);
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::where('category_id',$products->category_id)->get();
        $subsubcategory = SubSubCategory::where('subcategory_id',$products->subcategory_id)->get();


        $multi_img = MultiImg::where('product_id',$id)->get();
        return view('admin.product.edit_product',compact('brands','categories','subcategory','subsubcategory','products','multi_img'));
    }
    public function updateProduct(Request $request,$id){
//            $unique_name='';
//
//            $this->validate($request,[
//                'brand_id' => 'required',
//                'category_id' => 'required',
//                'subcategory_id' => 'required',
//                'sub_subcategory_id' => 'required',
//                'product_name_eng' => 'required',
//                'product_name_ban' => 'required',
//                'product_code' => 'required',
//                'product_quantity' => 'required',
//                'product_tags_eng' => 'required',
//                'product_tags_ban' => 'required',
//                'product_size_eng' => 'required',
//                'product_size_ban' => 'required',
//                'product_color_eng' => 'required',
//                'product_color_ban' => 'required',
//                'product_selling_price' => 'required',
//                'product_short_des_eng' => 'required',
//                'product_short_des_ban' => 'required',
//                'product_long_des_eng' => 'required',
//                'product_long_des_ban' => 'required',
//            ]);



        if ($request->hasFile('product_thumbnail')){
            $image = $request->file('product_thumbnail');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('images/thumbnail/'.$unique_name);

        }else{
            $unique_name = $request->old_photo;
        }



        $update_data = Product::find($id);
        $update_data->brand_id = $request->brand_id;
        $update_data->category_id = $request->category_id;
        $update_data->subcategory_id = $request->subcategory_id;
        $update_data->sub_subcategory_id = $request->sub_subcategory_id;
        $update_data->product_name_eng = $request->product_name_eng;
        $update_data->product_name_ban = $request->product_name_ban;
        $update_data->product_slug_eng = str::slug($request->product_name_eng);
        $update_data->product_slug_ban = str::slug($request->product_name_ban);
        $update_data->product_code = $request->product_code;
        $update_data->product_quantity = $request->product_quantity;
        $update_data->product_tags_eng = $request->product_tags_eng;
        $update_data->product_tags_ban = $request->product_tags_ban;
        $update_data->product_size_eng = $request->product_size_eng;
        $update_data->product_size_ban = $request->product_size_ban;
        $update_data->product_color_eng = $request->product_color_eng;
        $update_data->product_color_ban = $request->product_color_ban;
        $update_data->product_selling_price = $request->product_selling_price;
        $update_data->product_discount_price = $request->product_discount_price;
        $update_data->product_short_des_eng = $request->product_short_des_eng;
        $update_data->product_short_des_ban = $request->product_short_des_ban;
        $update_data->product_long_des_eng = $request->product_long_des_eng;
        $update_data->product_long_des_ban = $request->product_long_des_ban;
        $update_data->product_thumbnail = $unique_name;
        $update_data->featured = $request->featured;
        $update_data->hot_deals = $request->hot_deals;
        $update_data->special_offer = $request->special_offer;
        $update_data->special_deals = $request->special_deals;
        $update_data->update();

        $notification = array(
            'message' => 'product update successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }
    public function updateMultiImg(Request $request){
        $imgs = $request->multi_img;
        if (is_array($imgs) || is_object($imgs)) {
            foreach ($imgs as $id => $img) {
                $multi = MultiImg::find($id);
                unlink($multi->image);
                $unique_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('images/multiple/' . $unique_name);
                $multi_img = 'images/multiple/' . $unique_name;

                $multi->image = $multi_img;
                $multi->updated_at = Carbon::now();
                $multi->update();
            }
        }
        $notification = array(
            'message' => 'Multi Image updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteMultiImg($id){
        $multi_delete = MultiImg::find($id);
        unlink($multi_delete->image);
        $multi_delete->delete();

        $notification = array(
            'message' => 'Multiple image deleted successfully',
            'alert_type' => 'info',
        );
        return redirect()->back()->with($notification);
    }
    public function deleteProduct($id){
        $delete_product = Product::find($id);
            unlink('images/thumbnail/'.$delete_product->product_thumbnail);
        $delete_product->delete();
        $delete_multi = MultiImg::where('product_id',$id)->get();
        foreach ($delete_multi as $delete){
            unlink($delete->image);
            $delete->delete();
        }

        $notification = array(
            'message' => 'product deleted successfully',
            'alert_type' => 'info',
        );
        return redirect()->back()->with($notification);
    }
    public function activeProduct($id){
        $active = Product::find($id);
        $active->status=1;
        $active->update();

        $notification = array(
            'message' => 'Product status active successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function inactiveProduct($id){
        $inactive = Product::find($id);
        $inactive->status=0;
        $inactive->update();

        $notification = array(
            'message' => 'Product status inactive successfully',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function ProductStock(){
        $products = Product::latest()->get();
        return view('admin.product.product_stock',compact('products'));
    }











}
