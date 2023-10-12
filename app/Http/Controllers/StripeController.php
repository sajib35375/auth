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

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {


        \Stripe\Stripe::setApiKey('sk_test_51JQXKXEeQL3aThfwXWkUmLfrkq2GvG3dXlz2wArOqavl6w5dzwYoMkbhU9s30NhUWAjxNNhFVzC7ddUXkdksFwr900W8ZEzCdP');
        if (Session::has('coupon') && Session::has('charge')) {
            $total_amount = Session::get('coupon')['total_price'] + Session::get('charge')['ship_charge'];
        } elseif (Session::has('charge')) {
            $total_amount = Cart::total() + Session::get('charge')['ship_charge'];

        }
            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create([
                'amount' => $total_amount * 100,
                'currency' => 'usd',
                'description' => 'Sajib Online Shop',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

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

                'payment_type' => 'Strip',
                'payment_method' => 'Strip',
                'payment_type' => $charge->payment_method,
                'transaction_id' => $charge->balance_transaction,
                'currency' => $charge->currency,
                'amount' => $total_amount,
                'order_number' => $charge->metadata->order_id,
                'invoice_number' => 'SOS' . mt_rand(10000000, 99999999),
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
            Mail::to($request->email)->send(new OrderMail($data));

            $carts = Cart::content();

            foreach ($carts as $cart) {
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
            if (Session::has('coupon')) {
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
