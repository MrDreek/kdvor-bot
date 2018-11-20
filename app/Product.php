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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereFullText($search)
 * @mixin \Eloquent
 */
class Product extends BaseModel
{
    protected $collection = 'products_collection';

    public function scopeWhereFullText($query, $search)
    {
        $query->getQuery()->projections = ['score' => ['$meta' => 'textScore']];

        return $query->whereRaw(['$text' => ['$search' => $search]]);

    }


    public static function findCost($name)
    {
        $products = self::whereFullText($name)
            ->orderBy('score', ['$meta' => 'textScore'])
            ->get();

        if ($products->count() === 0) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'code' => 404];
        }

        if ($products->count() === 1) {
            return new ProductResource($products[0]);
        }

        return ProductCollection::collection($products);

    }
}
