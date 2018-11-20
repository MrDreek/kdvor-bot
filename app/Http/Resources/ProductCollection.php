<?php

namespace App\Http\Resources;

use App\Http\Resources\Product as ProductResource;
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
        $test = '';
        return [
            'data' => [
                'count' => $this->collection->count(),
                'min' => $this->collection->min('price'),
                'max' => $this->collection->max('price'),
                'products' => $this->collection->map(function ($item, $key) {
                    return new ProductResource($item);
                }),
                'lowCostProduct' => [
                    // здесь инфа по самому дешёвому товару
                ]
            ],
            'code' => 200
        ];
    }
}
