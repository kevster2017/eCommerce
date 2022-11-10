<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;

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
$user_id = auth()->user()->id;
return Cart::where('user_id', $user_id)->count();
}
}