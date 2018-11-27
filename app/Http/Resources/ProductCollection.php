<?php

namespace App\Http\Resources;

use App\Http\Resources\SimpleProduct as ProductResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $count = $this['info']->count;
        $min = $this['info']->min;
        $max = $this['info']->max;
        unset($this['info']);

        $products = $this->collection->map(function ($item) {
            return new ProductResource($item);
        })->toArray();

        return [
            'data' => [
                'count' => $count,
                'min' => $min,
                'max' => $max,
                'products' => $products,
                'lowCostProduct' => new ProductResource($this->collection->first(function ($item) use ($min) {
                    return $item->price === $min;
                })),
            ],
            'error' => false,
            'code' => 200
        ];
    }
}
