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



    function index()
    {
        $CarProducts = Product::all();

        $products = Product::latest()
        ->take(4)  
        ->get();

        $trends = Product::all()
            ->take(-4);

        return view('products.product', compact('products', 'trends', 'CarProducts'));
    }

    function ordersIndex()
    {
        $orders = DB::table('orders')
            ->paginate(5);

        return view('orders.index', compact('orders'));
    }
    // Ensure user logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    function show($id)
    {
        $product = Product::find($id);

        return view('products.show', ['products' => $product]);
    }

    function addToCart(Request $request)
    {


        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->save();
        return redirect('/products')->with('success', 'Item added to cart');
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
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('orders.cartList', ['products' => $products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);

        return redirect()->back()->with('success', 'Item successfully removed from cart');
    }

    function orderNow()
    {

        $user_id = auth()->user()->id;
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');


        return view('orders.orderNow', ['total' => $total]);
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

        foreach ($fullCart as $cart) {
            $order = new Order;
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->status = "Pending";
            $order->address = $req->address;
            $order->payment_method = $req->payment;
            $order->payment_status = "Pending";
            $order->save();
            // Cart::where('user_id', $user_id)->delete();

        }
        return redirect('/orders/stripe');
    }

    function myOrders()
    {

        $user_id = auth()->user()->id;
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $user_id)
            ->paginate(5);


        return view('orders.myOrders', ['orders' => $orders]);
    }


    public function create()
    {

        return view('products.create');
    }

    public function store(Request $request, Product $product)
    {


        $request->validate([


            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable | mimes:jpg,jpeg,png,gif',


        ]);

        // dd($request);

        $imagePath = (request('image')->store('images', 'public'));

        // dd($imagePath);

        if ($request->hasFile('image') == null) {
            $imagePath = "/uploads/profileImage.jpg";
        } else {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->image = $imagePath;



        $product->save();

        return redirect('/products')->with('success', 'Product successfully added');
    }




    public function edit($id)
    {
        $product = Product::findOrFail($id);


        $arr['product'] = $product;
        return view('products.edit')->with($arr);
    }

    public function editOrder($id)
    {
        $order= Order::findOrFail($id);


        $arr['order'] = $order;
        return view('orders.edit')->with($arr);
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        if (!empty($request->input('name'))) {
            $product->name = $request->input('name');
        }

        if (!empty($request->input('price'))) {
            $product->price = $request->input('price');
        }

        if (!empty($request->input('description'))) {
            $product->description = $request->input('description');
        }

        if (!empty($request->input('category'))) {
            $product->category = $request->input('category');
        }

        if (!empty($request->hasFile('image'))) {

            $product->image = (request('image')->store('uploads', 'public'));
        }

        //  dd($request);
        $product->save();

        return redirect()->route('products.show', $product->id)->with('success', 'Product details updated');
    }

    public function updateOrder(Request $request, $id)
    {

       
        $order= Order::find($id);

        if (!empty($request->input('address'))) {
            $order->address = $request->input('address');
        }

        if (!empty($request->input('status'))) {
            $order->status = $request->input('status');
        }

        if (!empty($request->input('payment_status'))) {
            $order->payment_status = $request->input('payment_status');
        }

        

        //  dd($request);
        $order->save();

        return back()->with('success', 'Order details updated');
    }


    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/products')->with('success', 'Product successfully deleted!');
    }
}
