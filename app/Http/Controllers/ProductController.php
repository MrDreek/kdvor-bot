<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use App\Product;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{

    public function cost(NameRequest $request)
    {
        //        $gurl = "https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyAi9QPY4xruqwW7Rp5be5W6GtyEXIGqvZI";
        //        $url  = json_encode(array("longUrl" => 'https://google.com'));
        //        $ch   = curl_init();
        //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //        curl_setopt($ch, CURLOPT_POST, 1);
        //        curl_setopt($ch, CURLOPT_URL, $gurl);
        //        curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
        //        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Content-Type: application/json"));
        //
        //        $r = json_decode(curl_exec($ch));

        $products = Product::findCost($request->name, $request->page, $request->per_page, $request->sorted);

        if (isset($products['error']) && $products['error'] === true) {
            return response()->json($products, $products['code']);
        }

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
