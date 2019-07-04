<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $count = $this['info']['count'];
        $min = $this['info']['min'];
        $max = $this['info']['max'];
        unset($this['info']);

        return [
            'count'    => $count,
            'min'      => $min,
            'max'      => $max,
            'products' => new ProductCollection($this->resource),
        ];
    }
}
