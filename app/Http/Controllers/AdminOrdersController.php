<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use PDF;

class AdminOrdersController extends Controller
{
    public function PendingOrders(){
        $orders = Order::where('status','pending')->latest()->get();
        return view('admin.orders.pending_orders',compact('orders'));
    }
    public function UserOrders($id){
        $user_id = Auth::id();
        $user_profile = User::find($user_id);
        $order = Order::with('division','district','state','user')->where('id',$id)->first();
        $order_item = OrderItem::where('order_id',$id)->latest()->get();

        return view('admin.orders.users_orders',compact('order','order_item','user_profile'));
    }
    public function ConfirmedOrder(){

        $orders = Order::where('status','confirm')->latest()->get();
        return view('admin.orders.confirm_order',compact('orders'));
    }

    public function ProcessingOrder(){
        $orders = Order::where('status','processing')->latest()->get();
        return view('admin.orders.processing_orders',compact('orders'));
    }

    public function PickedOrder(){
        $orders = Order::where('status','picked')->latest()->get();
        return view('admin.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrder(){
        $orders = Order::where('status','shipped')->latest()->get();
        return view('admin.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrder(){
        $orders = Order::where('status','delivered')->latest()->get();
        return view('admin.orders.delivered_orders',compact('orders'));
    }

    public function CancelOrder(){
        $orders = Order::where('status','cancel')->latest()->get();
        return view('admin.orders.cancel_orders',compact('orders'));
    }

//    status update
    public function ConfirmOrder($id){
        Order::find($id)->update([
            'status' => 'confirm'
        ]);

        $notification = array(
            'alert_type' => 'success',
            'message' => 'order status update successfully'
        );
        return redirect()->route('confirm.order')->with($notification);
    }
    public function ProcessOrder($id){
        Order::find($id)->update([
            'status' => 'processing'
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'order status update successfully'
        );
        return redirect()->route('processing.order')->with($notification);
    }
    public function PickOrder($id){
        Order::find($id)->update([
            'status' => 'picked'
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'order status update successfully'
        );
        return redirect()->route('picked.order')->with($notification);
    }
    public function ShipOrder($id){
        Order::find($id)->update([
            'status' => 'shipped'
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'order status update successfully'
        );
        return redirect()->route('shipped.order')->with($notification);
    }
    public function DeliveryOrder($id){
        $product = OrderItem::where('order_id',$id)->get();

        foreach( $product as $item ){

           Product::where('id',$item->product_id)->update([
                'product_quantity' => DB::raw('product_quantity-'.$item->quantity)
           ]);
        }
        Order::find($id)->update([
            'status' => 'delivered'
       ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'order status update successfully'
        );
        return redirect()->route('delivered.order')->with($notification);
    }
    public function CanOrder($id){
        Order::find($id)->update([
            'status' => 'cancel'
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'order status update successfully'
        );
        return redirect()->route('cancel.order')->with($notification);
    }

    public function invoiceDown($id){
        $order = Order::with('division','district','state','user')->where('id',$id)->first();
        $order_item = OrderItem::with('product')->where('order_id',$id)->get();
        $subtotal = Cart::total();

//        return view('frontend.invoice_dwn',compact('order','order_item','user_profile'));
        $pdf = PDF::loadView('frontend.invoice_dwn', compact('order','order_item','subtotal'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }







}
