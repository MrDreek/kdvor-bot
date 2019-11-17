<?php

namespace App\Jobs;

use App\CategoryCollection;
use App\MySql\Category;
use App\MySql\MainCategory;
use App\MySql\Product as MyProduct;
use App\MySql\Seller;
use App\ProductCollection;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var array */
    private $categories;

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
        ProductCollection::truncate();
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
        $this->categories = Category::get([
            'ext_category_name',
            'ext_category_id',
            'ext_category_parent_id',
            'Subdivision_ID',
        ])->toArray();
        $this->handleCategories();
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
            $item = new ProductCollection();
            $item->name = $product['Name'];
            $item->message_id = $product['Message_ID'];
            $item->desc = str_replace(["\t", "\n"], '', $product['Description']);
            $item->detail = str_replace(["\t", "\n"], '', $product['Details']);
            $item->price = $product['Price'];
            $item->keyword = $product['Keyword'];
            $item->ext_offer_url = $product['ext_offer_url'];

            $productCategory = null;
            foreach ($this->categories as $category) {
                if ($category['ext_category_id'] === $product['ext_category_id'] && $category['Subdivision_ID'] === $product['Subdivision_ID']) {
                    $productCategory = $category;
                    break;
                }
            }
            $extCategory = $this->buildCatTree($productCategory);
            $extCategoryNames = array_pluck($extCategory, 'ext_category_name');
            $item->ext_category = $extCategoryNames;
            $item->ext_category_parent = $this->getParentCategory($extCategoryNames);
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
            } catch (Exception $e) {
                Log::error('Ошибка сохранения! item: ' . json_encode($item));
            }
        }

        try {
            Schema::connection('mongodb')->table('products_collection', static function (Blueprint $collection) {
                $collection->dropIndex('products_full_text');
                $collection->index(
                    [
                        'main_category' => 'text',
                        'ext_category' => 'text',
                        'ext_category_parent' => 'text',
                    ],
                    'products_full_text',
                    null,
                    [
                        'weights' => [
                            'main_category' => 16,
                            'ext_category' => 8,
                            'ext_category_parent' => 4,
                        ],
                        'default_language' => 'russian',
                        'name' => 'recipe_full_text',
                    ]
                );
            });
        } catch (Exception $e) {
            Log::error('Ошибка создания текстового индекса' . json_encode(['inner_message' => $e->getMessage()]));
        }

        Log::notice('Конец импорта данных из mysql');
    }

    private function handleCategories()
    {
        CategoryCollection::truncate();
        foreach ($this->categories as $category) {
            $parent = $category['ext_category_parent_id']
                ? Category::where([
                    'ext_category_id' => $category['ext_category_parent_id'],
                    'Subdivision_ID' => $category['Subdivision_ID']
                ])->first() : null;
            $categoryCollection = new CategoryCollection();
            $categoryCollection->id = $category['ext_category_id'];
            $categoryCollection->name = $category['ext_category_name'];
            $categoryCollection->parent_name = $parent ? $parent->ext_category_name : null;
            $categoryCollection->save();
        }
    }

    private function buildCatTree(?array $pCategory): array
    {
        $categoryOut = [];
        $lastCategoryParentId = $pCategory['ext_category_parent_id'] ?? null;
        if ($lastCategoryParentId) {
            foreach ($this->categories as $category) {
                if ($category['ext_category_id'] === $lastCategoryParentId && $category['Subdivision_ID'] === $pCategory['Subdivision_ID']) {
                    $categoryOut = array_merge($categoryOut, $this->buildCatTree($category));
                    break;
                }
            }
        }
        $categoryOut[] = $pCategory;

        return $categoryOut;
    }

    private function getParentCategory(array $categoryNames): ?string
    {
        return !empty($categoryNames) ? last($categoryNames) : null;
    }
}
