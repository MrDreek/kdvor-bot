<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\ProductCollection;
use App\Http\Requests\NameRequest;
use Illuminate\Routing\Controller;
use App\Http\Requests\SellerRequest;

class ProductController extends Controller
{
    public function cost(NameRequest $request)
    {
        $products = ProductCollection::findCost($request->name, $request->page, $request->per_page, $request->sorted);

        if (isset($products['error']) && $products['error'] === true) {
            return response()->json($products, $products['code']);
        }

        return response()->json($products);
    }

    public function costBySeller(SellerRequest $request)
    {
        $products = ProductCollection::findSellerCost(
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
        $products = ProductCollection::findLowCost($request->name);

        return response()->json($products);
    }

    public function dearest(NameRequest $request)
    {
        $products = ProductCollection::findHighCost($request->name);

        return response()->json($products);
    }

    public function byGroup(GroupRequest $request)
    {
        $products = ProductCollection::findHighCost($request->group);

        return response()->json($products);
    }
}
