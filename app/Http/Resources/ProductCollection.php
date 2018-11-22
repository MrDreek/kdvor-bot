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
        $min = $this->collection->min('price');
        return [
            'data' => [
                'count' => $this->collection->count(),
                'min' => $min,
                'max' => $this->collection->max('price'),
                'products' => $this->collection->map(function ($item) {
                    return new ProductResource($item);
                }),
                'lowCostProduct' => new ProductResource($this->collection->first(function ($item) use ($min) {
                    return $item->price === $min;
                })),
            ],
            'code' => 200
        ];
    }
}
