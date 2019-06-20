<?php

namespace App\Http\Resources;

use App\Http\Resources\SimpleProduct as ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
        $products = $this->collection->map(static function ($item) {
            return new ProductResource($item);
        })->toArray();

        return $products;
    }
}
