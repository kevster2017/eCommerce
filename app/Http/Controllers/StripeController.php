<?php

namespace App\Http\Controllers;
use Session;
use Stripe;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('orders.stripe');
    }

    public function stripePost(Request $request)
    {
        $user_id = auth()->user()->id;
        $fullCart = Cart::where('user_id', $user_id)
        ->get();

        foreach($fullCart as $cart)
        {
            $order = Order::where('user_id', $user_id)->get();

           
            $order->user_id = $cart->user_id;
            $order->status = "Pending";
          
            $order->payment_status = "Paid";
          //  $order->save();
           

        }

        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');

            // Total is in pence. Multiply by 100 for £1, multiply by 1000 for £10
            $total = ($total * 100) + 1000;

     //dd($total);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose Kev's eCommerce",
        ]);

        Cart::where('user_id', $user_id)->delete();
   
        Session::flash('success', 'Payment Successful!');
           
        return redirect('/orders/myOrders')->with('success', 'Payment Successful');
    }



    function placeOrder(Request $req)
    {
        $user_id = auth()->user()->id;
        $fullCart = Cart::where('user_id', $user_id)
        ->get();

        $req->validate([
            'address' => 'required',
            'payment' => 'required'
        ]);

        foreach($fullCart as $cart)
        {
            $order = new Order;
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->status = "Pending";
            $order->address = $req->address;
            $order->payment_method = $req->payment;
            $order->payment_status = "Pending";
            $order->save();
          //  Cart::where('user_id', $user_id)->delete();

        }
return redirect('/orders/stripe')->with('success', 'Order Successful, proceed to payment');
    }
}
