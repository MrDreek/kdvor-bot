<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\SimpleProduct as ProductResource;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $count = $this['info']->count;
        $min = $this['info']->min;
        $max = $this['info']->max;
        unset($this['info']);

        $products = $this->collection->map(static function ($item) {
            return new ProductResource($item);
        })->toArray();

        return [
            'data'  => [
                'count'          => $count,
                'min'            => $min,
                'max'            => $max,
                'products'       => $products,
                'lowCostProduct' => new ProductResource($this->collection->first(static function ($item) use ($min) {
                    return $item->price === $min;
                })),
            ],
            'error' => false,
            'code'  => 200
        ];
    }
}
