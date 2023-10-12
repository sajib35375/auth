<?php

namespace App\Http\Controllers;

use App\Models\AddPost;
use App\Models\BlogCategory;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Image;

class BlogPostController extends Controller
{
    public function blogCategory(){
        $all_cat = BlogCategory::latest()->get();
        return view('admin.blog.blog_category',compact('all_cat'));
    }
    public function blogCategoryStore(Request $request){
        $this->validate($request,[
            'blog_cat_eng' => 'required',
            'blog_cat_ban' => 'required',
        ]);
        BlogCategory::insert([
            'blog_category_name_eng' => $request->blog_cat_eng,
            'blog_category_name_ban' => $request->blog_cat_ban,
            'blog_category_slug_eng' => Str::slug($request->blog_cat_eng),
            'blog_category_slug_ban' => Str::slug($request->blog_cat_ban),
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'Blog Category added Successfully'
        );
        return redirect()->back()->with($notification);

    }
    public function AddNewPost(){
        $all_cat = BlogCategory::latest()->get();
        return view('admin.blog.add_posts',compact('all_cat'));
    }

    public function AddNewPostStore(Request $request){
        $this->validate($request,[
            'title_eng' => 'required',
            'title_ban' => 'required',
            'photo' => 'required',
            'long_des_eng' => 'required',
            'long_des_ban' => 'required',
        ]);

        if ($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(780,433)->save('images/blog/'.$unique_name);
        }
            Post::insert([
                'blog_category_id' => $request->category_id,
                'title_eng' => $request->title_eng,
                'title_ban' => $request->title_ban,
                'title_slug_eng' => Str::slug($request->title_eng),
                'title_slug_ban' => Str::slug($request->title_ban),
                'photo' => $unique_name,
                'long_des_eng' => $request->long_des_eng,
                'long_des_ban' => $request->long_des_ban,
                'created_at' => Carbon::now()
            ]);

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Blog new Post added Successfully'
        );
        return redirect()->back()->with($notification);

    }
    public function ViewNewPost(){
        $posts = Post::with('category')->latest()->get();
        return view('admin.blog.view_post',compact('posts'));
    }











}
