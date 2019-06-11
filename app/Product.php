<?php

namespace App;

use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerResource;

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
 * @property string short_link
 * @property string keyword
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFullText($search, $sorted, $page = 1, $limit = 4)
 * @mixin \Eloquent
 */
class Product extends BaseModel
{
    protected $collection = 'products_collection';

    private const BASE_URL = 'http://kdvor3mkad.ru';

    /**
     * @param     $query
     * @param     $search
     * @param     $sorted
     * @param int $page
     * @param int $limit
     *
     * @return mixed
     */
    public function scopeWhereFullText($query, $search, $sorted, $page = 1, $limit = 4)
    {
        $query->getQuery()->projections = ['score' => ['$meta' => 'textScore']];
        if($sorted) {
            $query->orderBy('price', 'asc');
        } elseif($sorted === false) {
            $query->orderBy('price', 'desc');
        }
        $query->orderBy('score', ['$meta' => 'textScore']);
        $query->skip(($page - 1) * $limit);
        $query->take($limit);
        return $query->whereRaw(['$text' => ['$search' => $search]]);
    }

    /**
     * @param $query
     * @param $search
     *
     * @return mixed
     */
    public function scopeWhereFullTextSorted($query, $search)
    {
        return $query->whereRaw(['$text' => ['$search' => $search]]);
    }

    /**
     * @param $name
     * @param $page
     * @param $perPage
     * @param $sorted
     *
     */
    public static function findCost($name, $page, $perPage, $sorted)
    {
        $sellers = self::select([
            'name',
            'desc',
            'detail',
            'price',
            'main_category',
            'ext_category',
            'seller',
            'ext_offer_url',
            'message_id',
            'keyword'
        ])
            ->whereFullText($name, $sorted, $page ?? 1, $perPage ?? 4)
            ->get()
            ->groupBy('seller.seller_name');

        $count = self::raw(static function($collection) use ($name) {
            return $collection->aggregate([
                [
                    '$match' => [
                        '$text' => [
                            '$search' => $name,
                        ],
                    ],
                ],
                [
                    '$group' => [
                        '_id' => [
                            'referenceField' => '$referenceField',
                            'seller_name' => '$seller.seller_name'
                        ],
                        'count' => [
                            '$sum' => 1,
                        ],
                        'min' => [
                            '$min' => '$price',
                        ],
                        'max' => [
                            '$max' => '$price',
                        ]
                    ],
                ],
            ]);
        });

        $info = $count;

        if($info === null || $info->count() === 0) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'error' => true, 'code' => 404];
        }

        if($info->count() === 1) {
            return new SellerResource($sellers[0]);
        }

        if($sorted) {
            $sellers = $sellers->sortBy('price');
        }

        $sellers->map(static function($value, $key) use ($info) {
            $value['info'] = $info->firstWhere('_id.seller_name', $key)->toArray();
            return $value;
        });

        return new SellerCollection($sellers);
    }

    /**
     * @param $name
     *
     * @return ProductResource|array
     */
    public static function findLowCost($name)
    {
        $products = self::whereFullTextSorted($name)
            ->orderBy('price', 'asc')
            ->first();

        if($products === null) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'code' => 404];
        }

        return new ProductResource($products);
    }

    /**
     * @param $name
     *
     * @return ProductResource|array
     */
    public static function findHighCost($name)
    {
        $products = self::whereFullTextSorted($name)
            ->orderBy('price', 'desc')
            ->first();

        if($products === null) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'code' => 404];
        }

        return new ProductResource($products);
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        if(!empty($this->keyword)) {
            return self::BASE_URL . $this->seller['url'] . $this->keyword . '/';
        }

        return self::BASE_URL . $this->seller['url'] . $this->message_id . '/';
    }
}
