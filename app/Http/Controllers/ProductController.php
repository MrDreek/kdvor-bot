<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\NameRequest;
use Illuminate\Routing\Controller;
use App\Http\Requests\SellerRequest;

class ProductController extends Controller
{
    public function cost(NameRequest $request)
    {
        $products = Product::findCost($request->name, $request->page, $request->per_page, $request->sorted);

        if (isset($products['error']) && $products['error'] === true) {
            return response()->json($products, $products['code']);
        }

        return response()->json($products);
    }

    public function costBySeller(SellerRequest $request)
    {
        $products = Product::findSellerCost(
            $request->name,
            $request->seller_name,
            $request->page,
            $request->per_page,
            $request->sorted
        );

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
