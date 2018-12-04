<?php

namespace App\Http\Controllers;

use App\MySql\Category;
use App\MySql\MainCategory;
use App\MySql\Product as MyProduct;
use App\MySql\Seller;
use App\Product;
use Illuminate\Routing\Controller;

class ImportController extends Controller
{
    public function index()
    {
        Product::truncate();
        $products = MyProduct::select(['checked', 'Message_ID', 'Subdivision_ID', 'Name', 'Description', 'Details', 'Price', 'ext_category_id', 'ext_offer_url', 'int_category_id'])
            ->where('checked', 1)
            ->get()
            ->toArray();
        $categories = Category::get(['ext_category_name', 'ext_category_id'])->keyBy('ext_category_id')->toArray();
        $main_categories = MainCategory::get(['Subdivision_ID', 'Subdivision_Name', 'Parent_Sub_ID'])->keyBy('Subdivision_ID')->toArray();
        $sellers = Seller::get(['Subdivision_Name', 'Hidden_URL', 'phone', 'email', 'site', 'Subdivision_ID', 'Parent_Sub_ID'])->where('Parent_Sub_ID', Seller::PARENT_SUB_ID)->keyBy('Subdivision_ID')->toArray();

        foreach ($products as $product) {
            $item = new Product;
            $item->name = $product['Name'];
            $item->message_id = $product['Message_ID'];
            $item->desc = str_replace(["\t", "\n"], '', $product['Description']);
            $item->detail = str_replace(["\t", "\n"], '', $product['Details']);
            $item->price = $product['Price'];
            $item->ext_offer_url = $product['ext_offer_url'];
            $item->ext_category = $categories[$product['ext_category_id']]['ext_category_name'] ?? null;
            $item->main_category = $main_categories[$product['int_category_id']]['Subdivision_Name'] ?? null;
            $item->seller = [
                'seller_name' => $sellers[$product['Subdivision_ID']]['Subdivision_Name'],
                'phone' => $sellers[$product['Subdivision_ID']]['phone'],
                'email' => $sellers[$product['Subdivision_ID']]['email'],
                'url' => $sellers[$product['Subdivision_ID']]['Hidden_URL'],
                'site' => $sellers[$product['Subdivision_ID']]['site'],
            ];
            try {
                $item->save();
            } catch (\Exception $e) {
                return ['message' => 'Ошибка сохранения!', 'code' => 500, 'inner_message' => $e->getMessage()];
            }
        }

        return ['message' => 'OK!', 'code' => 200];
    }
}
