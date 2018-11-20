<?php

namespace App\Http\Controllers;

use App\MySql\Category;
use App\MySql\Product as MyProduct;
use App\MySql\Seller;
use App\Product;
use Illuminate\Routing\Controller;

class ImportController extends Controller
{
    public function index()
    {
        $products = MyProduct::limit(10)->get(['Message_ID', 'Subdivision_ID', 'Name', 'Description', 'Details', 'Price', 'ext_category_id', 'ext_offer_url'])->toArray();
        $categories = Category::get(['ext_category_name', 'ext_category_id'])->keyBy('ext_category_id')->toArray();
        $sellers = Seller::get(['Subdivision_Name', 'Hidden_URL', 'phone', 'email', 'Subdivision_ID', 'Parent_Sub_ID'])->where('Parent_Sub_ID', Seller::PARENT_SUB_ID)->keyBy('Subdivision_ID')->toArray();

        foreach ($products as $product) {
            $item = new Product;
            $item->name = $product['Name'];
            $item->message_id = $product['Message_ID'];
            $item->desc = $product['Description'];
            $item->detail = $product['Details'];
            $item->price = $product['Price'];
            $item->ext_offer_url = $product['ext_offer_url'];
            $item->ext_category = $categories[$product['ext_category_id']]['ext_category_name'] ?? null;
            $item->main_category = null;
            $item->seller = [
                'seller_name' => $sellers[$product['Subdivision_ID']]['Subdivision_Name'],
                'phone' => $sellers[$product['Subdivision_ID']]['phone'],
                'email' => $sellers[$product['Subdivision_ID']]['email'],
                'url' => $sellers[$product['Subdivision_ID']]['Hidden_URL'],
            ];
            $item->save();
        }

        $test = '';
    }
}
