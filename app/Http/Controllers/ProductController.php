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
        return response()->json($products['data'], $products['code']);
    }

    public function cheapest(NameRequest $request)
    {

    }

    public function dearest(NameRequest $request)
    {

    }
}
