<?php

namespace App\Jobs;

use Exception;
use App\Product;
use App\MySql\Seller;
use App\MySql\Category;
use App\MySql\MainCategory;
use Illuminate\Bus\Queueable;
use App\MySql\Product as MyProduct;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Schema;
use Illuminate\Queue\InteractsWithQueue;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        Log::notice('Начало импорта данных из mysql');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Product::truncate();
        $products = MyProduct::select([
            'checked',
            'Keyword',
            'Message_ID',
            'Subdivision_ID',
            'Name',
            'Description',
            'Details',
            'Price',
            'ext_category_id',
            'ext_offer_url',
            'int_category_id',
        ])
            ->where('checked', 1)
            ->get()
            ->toArray();
        $categories = Category::get([
            'ext_category_name',
            'ext_category_id',
            'Subdivision_ID',
        ])->keyBy('ext_category_id')->toArray();
        $main_categories = MainCategory::get([
            'Subdivision_ID',
            'Subdivision_Name',
            'Parent_Sub_ID',
        ])->keyBy('Subdivision_ID')->toArray();
        $sellers = Seller::get([
            'Subdivision_Name',
            'Hidden_URL',
            'phone',
            'email',
            'site',
            'Subdivision_ID',
            'Parent_Sub_ID',
        ])->where('Parent_Sub_ID', Seller::PARENT_SUB_ID)->keyBy('Subdivision_ID')->toArray();

        foreach ($products as $product) {
            $item = new Product();
            $item->name = $product['Name'];
            $item->message_id = $product['Message_ID'];
            $item->desc = str_replace(["\t", "\n"], '', $product['Description']);
            $item->detail = str_replace(["\t", "\n"], '', $product['Details']);
            $item->price = $product['Price'];
            $item->keyword = $product['Keyword'];
            $item->ext_offer_url = $product['ext_offer_url'];

            $ext_category = array_filter($categories, static function ($item) use ($product) {
                return $item['ext_category_id'] === $product['ext_category_id'] && $item['Subdivision_ID'] === $product['Subdivision_ID'];
            }, ARRAY_FILTER_USE_BOTH);

            $item->ext_category = array_values($ext_category)[0]['ext_category_name'] ?? null;
            $item->main_category = $main_categories[$product['int_category_id']]['Subdivision_Name'] ?? null;
            $item->seller = [
                'seller_name' => $sellers[$product['Subdivision_ID']]['Subdivision_Name'],
                'phone'       => $sellers[$product['Subdivision_ID']]['phone'],
                'email'       => $sellers[$product['Subdivision_ID']]['email'],
                'url'         => $sellers[$product['Subdivision_ID']]['Hidden_URL'],
                'site'        => $sellers[$product['Subdivision_ID']]['site'],
            ];

            try {
                $item->save();
            } catch (Exception $e) {
                Log::error('Ошибка сохранения! item: '.json_encode($item));
            }
        }

        try {
            Schema::connection('mongodb')->table('products_collection', static function (Blueprint $collection) {
                $collection->index(
                    [
                        'name'               => 'text',
                        'main_category'      => 'text',
                        'ext_category'       => 'text',
                        'seller.seller_name' => 'text',
                    ],
                    'products_full_text',
                    null,
                    [
                        'weights'          => [
                            'name'               => 32,
                            'ext_category'       => 8,
                            'main_category'      => 16,
                            'seller.seller_name' => 256,
                        ],
                        'default_language' => 'russian',
                        'name'             => 'recipe_full_text',
                    ]
                );
            });
        } catch (Exception $e) {
            Log::error('Ошибка создания текстового индекса'.json_encode(['inner_message' => $e->getMessage()]));
        }

        Log::notice('Конец импорта данных из mysql');
    }
}
