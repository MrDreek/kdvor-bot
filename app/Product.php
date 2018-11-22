<?php

namespace App;

use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;

/**
 * App\Product
 *
 * @property string name
 * @property string desc
 * @property string detail
 * @property string price
 * @property string ext_offer_url
 * @property string|null main_category
 * @property string|null ext_category
 * @property array seller
 * @property-read mixed $id
 * @property mixed message_id
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFullText($search)
 * @mixin \Eloquent
 */
class Product extends BaseModel
{
    protected $collection = 'products_collection';

    private const BASE_URL = 'http://kdvor3mkad.ru';
    private const PRODUCT_URL = 'tovar_${product}.html';

    public function scopeWhereFullText($query, $search)
    {
        $query->getQuery()->projections = ['score' => ['$meta' => 'textScore']];
        return $query->whereRaw(['$text' => ['$search' => $search]]);
    }

    public static function findCost($name)
    {
        $products = self::select(['name', 'desc', 'detail', 'price', 'main_category', 'ext_category', 'seller'])->whereFullText($name)
            ->orderBy('score', ['$meta' => 'textScore'])
            ->limit(10)
            ->get();

        $count = $products->count();

        if ($count === 0) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'code' => 404];
        }

        if ($count === 1) {
            return new ProductResource($products[0]);
        }

        return new ProductCollection($products);
    }

    public static function findLowCost($name)
    {
        $products = self::whereFullText($name)
            ->orderBy('price', 'asc')
            ->first();

        if ($products === null) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'code' => 404];
        }

        return new ProductResource($products);
    }

    public static function findHighCost($name)
    {
        $products = self::whereFullText($name)
            ->orderBy('price', 'desc')
            ->first();

        if ($products === null) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'code' => 404];
        }

        return new ProductResource($products);
    }

    public function getLink()
    {
        return self::BASE_URL . $this->seller['url'] . str_replace('${product}', $this->message_id, self::PRODUCT_URL);
    }
}
