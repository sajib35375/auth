<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    public function ReturnOrder(){
        $orders = Order::where('return_order',1)->latest()->get();
        return view('admin.return_order.return_request',compact('orders'));
    }
    public function ReturnOrderApprove($id){
        Order::where('id',$id)->update([
            'return_order' => 2
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'Return Order Approve Successfully'
        );
        return redirect()->back()->with($notification);


    }
    public function AllReturnOrderApprove(){
        $orders = Order::where('return_order',2)->latest()->get();
        return view('admin.return_order.request_approve',compact('orders'));
    }

}
