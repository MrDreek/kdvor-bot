<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
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
 * @property mixed score
 */
class SimpleProduct extends JsonResource
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
        return [
            'name'          => $this->name,
            'desc'          => $this->desc,
            'detail'        => $this->detail,
            'price'         => $this->price,
            'main_category' => $this->main_category,
            'ext_category'  => $this->ext_category,
            'ext_offer_url' => $this->ext_offer_url,
            'seller'        => $this->seller,
            'product_link'  => $this->getLink(),
            'weight'        => $this->score,
        ];
    }
}
