<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    // Ensure user logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $product = Product::all();

        return view('product', ['products' => $product]);
    }

    function show($id)
    {
        $product = Product::find($id);

        return view('show', ['products' => $product]);
    }

    function addToCart(Request $request)
    {

        /*
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $request->auth()->user()->id;
            $cart->product_id = $request->product_id;
            $cart->save();
return redirect('/');

        } else


            return view('auth/login');
    }

    */

        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->save();
        return redirect('/');
    }

    static function cartItem()
    {

        $user_id = optional(Auth::user())->id;

        return Cart::where('user_id', $user_id)->count();
    }

    function cartList()
    {

        $user_id = auth()->user()->id;
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'product_id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('cartList', ['products' =>$products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);

        return redirect('cartList');
    }

    function orderNow()
    {

        $user_id = auth()->user()->id;
        $total = $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'product_id')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');
            

        return view('orderNow', ['total' =>$total]);
    }

    function placeOrder(Request $req)
    {
        $user_id = auth()->user()->id;
        $fullCart = Cart::where('user_id', $user_id)
        ->get();

        foreach($fullCart as $cart)
        {
            $order = new Order;
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->status = "pending";
            $order->address = $req->address;
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->save();
            Cart::where('user_id', $user_id)->delete();

        }
return redirect('/');
    }

    function myOrders()
    {
        
        $user_id = auth()->user()->id;
         $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'product_id')
            ->where('orders.user_id', $user_id)
            ->get();
            

        return view('myOrders', ['orders' =>$orders]);
    }
}
