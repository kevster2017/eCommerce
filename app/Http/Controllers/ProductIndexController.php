<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductIndexController extends Controller
{
    function TVindex() {

        $tvs = Product::where('category', 'TV')        
        ->paginate(5);

        return view('productIndex.tvindex',compact('tvs'));
       
    }

    function consoleindex() {

        $consoles = product::where('category', 'Console')
        ->paginate(5);

        return view('productIndex.consoleindex', compact('consoles'));
    }

    function mobileindex() {

        $mobiles = product::where('category', 'Mobile')
        ->paginate(5);

        return view('productIndex.mobileindex', compact('mobiles'));
    }

    function WMIndex() {

        $wms = product::where('category', 'Washing Machine')
        ->paginate(5);

        return view('productIndex.wmindex', compact('wms'));
    }

    function fridgeindex() {

        $fridges = product::where('category', 'Fridge')
        ->paginate(5);

        return view('productIndex.fridgeindex', compact('fridges'));
    }

    function cookerindex() {

        $cookers = product::where('category', 'Cooker')
        ->paginate(5);

        return view('productIndex.cookerindex', compact('cookers'));
    }
}
