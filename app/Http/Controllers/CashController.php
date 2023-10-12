<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashController extends Controller
{
    public function CashOutStore(Request $request){

        if (Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_price'];
        }else{
            $total_amount = Cart::total();
        }



        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'note' => $request->note,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',
            'currency' => 'usd',
            'amount' => $total_amount,

            'invoice_number' => 'SOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now()

        ]);

        $invoice = Order::find($order_id);
        $data = [
            'invoice' => $invoice->invoice_number,
            'amount' => $total_amount,
            'name' => $request->name,
            'email' => $request->email,

        ];
//        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();

        foreach($carts as $cart){
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'quantity' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }
        if (Session::has('coupon')){
            Session::forget('coupon');
        }
        Cart::destroy();

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Order complete successfully'
        );
        return redirect()->to('/')->with($notification);
    }
}
