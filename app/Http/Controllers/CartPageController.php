<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function ViewMyCert(){
        $divisions = Division::all();

        return view('frontend.cart.cart_view',compact('divisions'));
    }

    public function ShowDistrict($id){
        $districts = District::where('division_id',$id)->get();

        return json_encode($districts);
    }

    public function showState($id){
        $states = State::where('district_id',$id)->get();

        return json_encode($states);
    }

    public function showShippingCharge($id){
        $charge = State::where('id',$id)->get();

        return json_encode($charge);
    }

    public function addShipping(Request $request){
        $charge = $request->ship_charge;

        Session::put('charge',[
            'ship_charge' => $charge
        ]);
        return response()->json(['success'=>'ShipCharge apply successfully']);
    }


    public function LoadMyCert(){
        $cart = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'cart' => $cart,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal)
        ));
    }
    public function RemoveMyCart($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success'=>'Successfully remove cart from MyCart']);
    }
    public function cartIncrement($rowId){
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty+1);


        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount' => $coupon->discount_amount,
                'discount_amount' => round(Cart::total()*($coupon->discount_amount/100)),
                'total_price' => round(Cart::total() - Cart::total()*$coupon->discount_amount/100),
            ]);
        }


        return response()->json(['success'=>'cart quantity increment successfully']);
    }
    public function cartDecrement($rowId){
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty-1);

        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'discount' => $coupon->discount_amount,
                'discount_amount' => round(Cart::total()*($coupon->discount_amount/100)),
                'total_price' => round(Cart::total() - Cart::total()*$coupon->discount_amount/100),
            ]);
        }

        return response()->json(['success'=>'cart quantity decrement successfully']);
    }

    public function shippingAddress(Request $request){
        Session::put('address',[
            'division' => $request->div,
            'district' => $request->dis,
            'state' => $request->st,
            'division_id' => $request->div_id,
            'district_id' => $request->dis_id,
            'state_id' => $request->st_id,
        ]);
    }


}
