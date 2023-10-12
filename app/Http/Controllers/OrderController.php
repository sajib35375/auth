<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function UserOrder(){
        $id = Auth::user()->id;
        $user_profile = User::find($id);
        $orders = Order::where('user_id',$id)->latest()->get();
        return view('frontend.orders',compact('user_profile','orders'));
    }
    public function OrderDetail($id){
        $user_id = Auth::user()->id;
        $user_profile = User::find($user_id);
        $order = Order::with('division','district','state','user')->where('id',$id)->where('user_id',Auth::id())->first();
        $order_item = OrderItem::where('order_id',$id)->get();

        return view('frontend.order_details',compact('order','order_item','user_profile'));
    }

    public function InvoiceDownload($id){
        $user_id = Auth::user()->id;
        $user_profile = User::find($user_id);
        $order = Order::with('division','district','state','user')->where('id',$id)->where('user_id',Auth::id())->first();
        $order_item = OrderItem::with('product')->where('order_id',$id)->get();
        $subtotal = Cart::total();

//        return view('frontend.invoice_dwn',compact('order','order_item','user_profile'));
        $pdf = PDF::loadView('frontend.invoice_dwn', compact('order','order_item','user_profile','subtotal'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function ReturnOrder(Request $request,$id){
        Order::find($id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Order Return Successfully'
        );
        return redirect()->route('user.order')->with($notification);
    }
    public function ShowReturnOrder(){
        $id = Auth::user()->id;
        $user_profile = User::find($id);
        $orders = Order::where('user_id',$id)->where('return_reason','!=',null)->latest()->get();
        return view('frontend.return_orders',compact('user_profile','orders'));
    }
    public function ShowCancelOrder(){
        $id = Auth::user()->id;
        $user_profile = User::find($id);
        $orders = Order::where('user_id',$id)->where('status','cancel')->latest()->get();
        return view('frontend.cancel_order',compact('user_profile','orders'));
    }



}
