<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\District;
use App\Models\State;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showDistrict($id){
        $district = District::where('division_id',$id)->get();
        return json_encode($district);
    }
    public function showState($id){
        $state = State::where('district_id',$id)->get();
        return json_encode($state);
    }
    public function checkOutStore(Request $request){



       $data = array();
       $data['division_id'] = $request->division_id;
       $data['district_id'] = $request->district_id;
       $data['state_id'] = $request->state_id;
       $data['shipping_name'] = $request->name;
       $data['shipping_email'] = $request->email;
       $data['shipping_phone'] = $request->phone;
       $data['post_code'] = $request->post_code;
       $data['note'] = $request->note;
        $cartTotal = Cart::total() + session()->get('charge')['ship_charge'];


        if ($request->payment=='stripe') {

            return view('frontend.checkout.stripe', compact('data','cartTotal'));
        }elseif($request->payment=='cash'){

            return view('frontend.checkout.cash', compact('data','cartTotal'));
        }else{
            return 'card';
        }
    }
}
