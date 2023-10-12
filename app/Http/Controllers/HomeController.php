<?php

namespace App\Http\Controllers;

use App\Models\AddPost;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $all_cat = Category::all();
        $sliders = Slider::where('status',1)->get();
        $products = Product::where('status',1)->latest()->get();
        $featured = Product::where('featured',1)->get();
        $hot_deals = Product::where('hot_deals',1)->where('product_discount_price','!=',NULL)->limit(4)->get();
        $special_offer = Product::where('special_offer',1)->limit(4)->get();
        $special_deals = Product::where('special_deals',1)->limit(4)->get();

        $skip_cat_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_cat_0->id)->get();
        $skip_cat_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_cat_1->id)->get();
        $skip_brand_0 = Brand::skip(0)->first();
        $skip_brand_product_0 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->get();
        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->get();
        $posts = Post::latest()->get();

        return view('frontend.index',compact('all_cat','sliders','products','featured','hot_deals','special_offer','special_deals','skip_cat_0','skip_product_0','skip_brand_0','skip_brand_product_0','posts','skip_cat_1','skip_product_1','skip_brand_1','skip_brand_product_1'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function profile(){
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('frontend.profile_update',compact('profile'));
    }
    public function profileUpdate(Request $request){
        $id = Auth::user()->id;
        $profile_update = User::find($id);
        $image = '';
        if ($img = $request->file('photo')){

            $unique_name = hexdec(uniqid());
            $ex_name = strtolower($img->getClientOriginalExtension());
            $location = 'images/user/';
            $image = $unique_name.'.'.$ex_name;
            $img->move(public_path('images/user/'),$image);

        }else{
            $image = $request->old_photo;
        }

        $profile_update->name = $request->name;
        $profile_update->email = $request->email;
        $profile_update->phone = $request->phone;
        $profile_update->profile_photo_path = $image;
        $profile_update->update();

        $notification = array(
            'message' => 'profile updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('user.profile')->with($notification);
    }
    public function ChangePassword(){
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('frontend.change_password',compact('profile'));
    }
    public function ChangePasswordUpdate(Request $request){
        $id = Auth::user()->id;

        $hash_pass = Auth::user()->password;
        if (password_verify($request->old_password,$hash_pass)){
            $change_password = User::find($id);
            $change_password->password = password_hash($request->password,PASSWORD_DEFAULT);
            $change_password->update();

            $notification = array(
                'message' => 'password updated successfully',
                'alert_type' => 'success'
            );
            return redirect()->route('user.profile')->with($notification);
        }else{
            $notification = array(
                'message' => 'password not changed',
                'alert_type' => 'success'
            );
            return redirect()->route('user.profile')->with($notification);
        }


    }
    public function ProductDetails($id){
        $products = Product::find($id);

        $color_eng = $products->product_color_eng;
        $product_color_eng = explode(',',$color_eng);
        $color_ban = $products->product_color_ban;
        $product_color_ban = explode(',',$color_ban);

        $size_eng = $products->product_size_eng;
        $product_size_eng = explode(',',$size_eng);
        $size_ban = $products->product_size_ban;
        $product_size_ban = explode(',',$size_ban);

        $related_product = Product::where('category_id',$products->category_id)->where('id','!=',$id)->get();
        $multi = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('products','multi','product_color_eng','product_color_ban','product_size_eng','product_size_ban','related_product'));
    }
    public function TagwiseProduct($tag){
        $tag_wise = Product::where('status',1)->where('product_tags_eng',$tag)->orWhere('product_tags_ban',$tag)->paginate(6);
        $categories = Category::all();
        return view('frontend.product.tagwise_product',compact('tag_wise','categories'));
    }
    public function catWiseProduct($id){
        $subcat_wise = Product::where('status',1)->where('subcategory_id',$id)->paginate(6);
        $categories = Category::all();
        $bread = SubCategory::with('category')->where('id',$id)->get();
        return view('frontend.product.categoryWise_product',compact('subcat_wise','categories','bread'));
    }
    public function SubSubCatWise($id){
        $subsubcat_wise = Product::where('status',1)->where('sub_subcategory_id',$id)->paginate(6);
        $categories = Category::all();
        $breadSubSub = SubSubCategory::with('category','subcategory')->where('id',$id)->get();
        return view('frontend.product.subsubcategory_wise',compact('subsubcat_wise','categories','breadSubSub'));
    }
    public function addToCartShow($id){
        $data = Product::with('category','brand')->find($id);
       $color = $data->product_color_eng;
        $product_color = explode(',',$color);

        $size = $data->product_size_eng;
         $product_size = explode(',',$size);
         return response()->json(array(
             'product' => $data,
             'color' => $product_color,
             'size' => $product_size
         ));
    }
    public function SearchProduct(Request $request){
        $this->validate($request,[
            'search' => 'required',
        ]);

        $search = $request->search;
        $categories = Category::all();
        $products = Product::where('product_name_eng','LIKE',"%$search%")->get();
        return view('frontend.product.search',compact('products','categories'));
    }
    public function AdvanceSearch(Request $request){
        $this->validate($request,[
            'search' => 'required',
        ]);

        $search = $request->search;
        $products = Product::where('product_name_eng','LIKE',"%$search%")->limit(5)->get();
        return view('frontend.product.search_product',compact('products'));
    }


}
