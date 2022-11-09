<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


class ProductController extends Controller
{
    function index()
    {
        $product= Product::all();

       return view('product',['products'=>$product]);
    }

    function show($id)
    {
        $product = Product::find($id);

       return view('show',['products'=>$product]);
    }
}
