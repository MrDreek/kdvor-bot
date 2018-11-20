<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use App\Product;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function cost(NameRequest $request)
    {
        $products = Product::findCost($request->name);
        return response()->json($products);
    }

    public function cheapest(NameRequest $request)
    {
        $products = Product::findLowCost($request->name);
        return response()->json($products);
    }

    public function dearest(NameRequest $request)
    {
        $products = Product::findHighCost($request->name);
        return response()->json($products);
    }
}
