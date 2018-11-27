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

    public function scopeWhereFullText($query, $search, $page = 1, $limit = 5)
    {
        $query->getQuery()->projections = ['score' => ['$meta' => 'textScore']];
        $query->orderBy('score', ['$meta' => 'textScore'])->orderBy('price', 'asc');
        $query->skip(($page - 1) * $limit);
        $query->take($limit);
        return $query->whereRaw(['$text' => ['$search' => $search]]);
    }

    public static function findCost($name, $page, $perPage, $sorted)
    {
        $products = self::select(['name', 'desc', 'detail', 'price', 'main_category', 'ext_category', 'seller'])
            ->whereFullText($name, $page ?? 1, $perPage ?? 5)
            ->get();

        $count = self::raw(function ($collection) use ($name) {
            return $collection->aggregate([
                [
                    '$match' => [
                        '$text' => [
                            '$search' => $name
                        ]
                    ],
                ],
                [
                    '$group' => [
                        '_id' => '$referenceField',
                        'count' => [
                            '$sum' => 1
                        ],
                        'min' => [
                            '$min' => '$price'
                        ],
                        'max' => [
                            '$max' => '$price'
                        ]

                    ]
                ]
            ]);
        });

        $info = $count->first();

        if ($info->count === 0) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'error' => true, 'code' => 404];
        }

        if ($info->count === 1) {
            return new ProductResource($products[0]);
        }

        $products['info'] = $info;

        if($sorted){
            $products = $products->sortBy('price');
//            $products = new LengthAwarePaginator($paginate, $info->count, $perPage ?? 5);
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
