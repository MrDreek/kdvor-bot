<?php

namespace App;

use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerProductCollection;
use App\Http\Resources\SellerResource;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Product.
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
 *
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereFullText($search, $sorted, $page = 1, $limit = 4)
 * @mixin Eloquent
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
        if ($sorted) {
            $query->orderBy('price', 'asc');
        } elseif ($sorted === false) {
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
     * @return SellerCollection|SellerResource|array
     */
    public static function findCost($name, $page = 1, $perPage = 4, $sorted = null)
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
            'keyword',
        ])
            ->whereFullText($name, $sorted, $page, $perPage)
            ->get()
            ->groupBy('seller.seller_name');

        $count = self::raw(static function ($collection) use ($name) {
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
                        '_id'   => [
                            'referenceField' => '$referenceField',
                            'seller_name'    => '$seller.seller_name',
                        ],
                        'count' => [
                            '$sum' => 1,
                        ],
                        'min'   => [
                            '$min' => '$price',
                        ],
                        'max'   => [
                            '$max' => '$price',
                        ],
                    ],
                ],
            ]);
        });

        $info = $count;

        if ($info === null || $info->count() === 0) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'error' => true, 'code' => 404];
        }

        if ($sorted) {
            $sellers = $sellers->sortBy('price');
        }

        $sellers->map(static function ($value, $key) use ($info) {
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

        if ($products === null) {
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

        if ($products === null) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'code' => 404];
        }

        return new ProductResource($products);
    }

    /**
     * @param string $name
     * @param string $seller_name
     * @param int    $page
     * @param int    $perPage
     * @param null   $sorted
     *
     * @return SellerProductCollection|ProductResource|array
     */
    public static function findSellerCost(string $name, string $seller_name, $page = 1, $perPage = 4, $sorted = null)
    {
        $seller = self::select([
            'seller.seller_name',
        ])
            ->whereFullText($seller_name, true)
            ->first();

        if (!$seller) {
            return ['data' => 'Провавец не найден, попробуйте другой запрос', 'error' => true, 'code' => 404];
        }

        $seller_name = $seller['seller']['seller_name'];

        $products = self::select([
            'name',
            'desc',
            'detail',
            'price',
            'main_category',
            'ext_category',
            'seller',
            'ext_offer_url',
            'message_id',
            'keyword',
        ])
            ->where('seller.seller_name', '=', $seller_name)
            ->whereFullText($name, $sorted, $page ?? 1, $perPage ?? 4)
            ->get();

        $count = self::raw(static function ($collection) use ($name, $seller_name) {
            return $collection->aggregate([
                [
                    '$match' => [
                        '$text'              => [
                            '$search' => $name,
                        ],
                        'seller.seller_name' => $seller_name,
                    ],
                ],
                [
                    '$group' => [
                        '_id'   => '$referenceField',
                        'count' => [
                            '$sum' => 1,
                        ],
                        'min'   => [
                            '$min' => '$price',
                        ],
                        'max'   => [
                            '$max' => '$price',
                        ],

                    ],
                ],
            ]);
        });

        $info = $count->first();

        if ($info === null || $info->count === 0) {
            return ['data' => 'Товар не найден, попробуйте другой запрос', 'error' => true, 'code' => 404];
        }

        if ($info->count === 1) {
            return new ProductResource($products);
        }

        $products['info'] = $info;

        if ($sorted) {
            $products = $products->sortBy('price');
        }

        return new SellerProductCollection($products);
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        if (!empty($this->keyword)) {
            return self::BASE_URL.$this->seller['url'].$this->keyword.'/';
        }

        return self::BASE_URL.$this->seller['url'].$this->message_id.'/';
    }
}
