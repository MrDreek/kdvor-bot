<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed name
 * @property mixed desc
 * @property mixed detail
 * @property mixed price
 * @property mixed ext_offer_url
 * @property mixed main_category
 * @property mixed ext_category
 * @property mixed seller
 * @property mixed weight
 * @property mixed score
 */
class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => [
                'name' => $this->name,
                'desc' => $this->desc,
                'detail' => $this->detail,
                'price' => $this->price,
                'main_category' => $this->main_category,
                'ext_category' => $this->ext_category,
                'seller' => $this->seller,
                'weight' => $this->score,
                'link' => $this->getLink()
            ],
            'error' => false,
            'code' => 200
        ];
    }
}
