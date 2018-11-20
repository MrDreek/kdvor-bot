<?php

namespace App\Http\Controllers;

use App\MySql\Product;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::first();
        $test = '';
    }

}
