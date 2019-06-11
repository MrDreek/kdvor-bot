<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SellerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $sellers = $this->collection->map(static function($item) {
            return new SellerResource($item);
        })->toArray();

        return [
            'sellers' => $sellers,
            'error' => false,
            'code' => 200
        ];
    }
}
