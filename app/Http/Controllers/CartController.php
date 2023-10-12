<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\District;
use App\Models\Division;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request,$cart_id){
          if(Session::has('coupon')){
              Session::forget('coupon');
          }

        $products = Product::find($cart_id);
       if ( $products->product_discount_price ){
           Cart::add(
               ['id' => $cart_id,
                   'name' => $request->name,
                   'qty' => $request->quantity,
                   'price' => $products->product_discount_price,
                   'weight' => 1,
                   'options' => [
                       'size' => $request->size,
                       'color' => $request->color,
                       'image' => $products->product_thumbnail,
                   ],
               ]);
           return response()->json(['success'=>'Product Add to Cart Successfully']);
       }else{
           Cart::add(
               ['id' => $cart_id,
                   'name' => $request->name,
                   'qty' => $request->quantity,
                   'price' => $products->product_selling_price,
                   'weight' => 1,
                   'options' => [
                       'size' => $request->size,
                       'color' => $request->color,
                       'image' => $products->product_thumbnail,
                   ],
               ]);
           return response()->json(['success'=>'Product Add to Cart Successfully']);
       }

    }
    public function AddToMiniCart(){
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'cartCount' => $cart,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal)
        ));
    }
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Remove item from mini cart Successfully']);
    }
    public function couponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if($coupon){
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount' => $coupon->discount_amount,
                'discount_amount' => round(Cart::total()*$coupon->discount_amount/100),
                'total_price' => round(Cart::total() - Cart::total()*$coupon->discount_amount/100),
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'coupon applied successfully'
            ));
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }
    public function couponCalculation(){
        if (Session::has('coupon') && Session::has('charge')){
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'discount' => session()->get('coupon')['discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'Grand_total' => session()->get('coupon')['total_price'] + session()->get('charge')['ship_charge'],
                'ship_charge'=> session()->get('charge')['ship_charge']
            ));
        }elseif( Session::has('charge') ){
            return response()->json(array(
                'subtotal' => Cart::total(),
                'total' => Cart::total() + session()->get('charge')['ship_charge'],
                'ship_charge'=> session()->get('charge')['ship_charge']
            ));
        }
    }

    public function removeCoupon(){
        Session::forget('coupon');
        return response()->json(['success'=>'coupon removed successfully']);
    }


//checkout
    public function checkout(){
        if(Auth::check()){
            if ( Cart::total() > 0 ){
                if (Session::has('address')){
                    $cart = Cart::content();
                    $cartQty = Cart::count();
                    $cartTotal = Cart::total();
                    $division = Division::latest()->get();
                    return view('frontend.checkout.view_checkout',compact('cart','cartQty','cartTotal','division'));
                }else{
                    $notification = array(
                        'alert_type' => 'error',
                        'message' => 'At first set your shipping location'
                    );
                    return redirect()->to('/')->with($notification);
                }


            }else{
                $notification = array(
                    'alert_type' => 'error',
                    'message' => 'At least one product need to purchase'
                );
                return redirect()->to('/')->with($notification);
            }
        }else{
            $notification = array(
                'alert_type' => 'error',
                'message' => 'At first login your account'
            );
            return redirect()->to('/login')->with($notification);
        }
    }



}
