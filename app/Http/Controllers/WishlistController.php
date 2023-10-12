<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller

{

    public function AddToWishlist($id){

        if ( Auth::check() ){
            $exists = Wishlist::where('user_id',Auth::user()->id)->where('product_id',$id)->first();

            if (!$exists){
                Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                ]);
                return response()->json(['success'=>'Successfully added to your wishlist']);
            }else{
                return response()->json(['error'=>'This product is already in your Wishlist']);
            }


        }else{
            return response()->json(['error'=>'At first login your Account']);
        }


    }
    public function ViewWishlist(){
        return view('frontend.wishlist.wishlist_view');
    }
    public function ShowWishlist(){
        $wish_data = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wish_data);
    }
    public function RemoveWishlist($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success'=>'Successfully product remove from wishlist']);

    }

}
