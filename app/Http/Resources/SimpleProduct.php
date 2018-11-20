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
 */
class SimpleProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name ?? null,
            'desc' => $this->desc ?? null,
            'detail' => $this->detail ?? null,
            'price' => $this->price ?? null,
            'main_category' => $this->main_category ?? null,
            'ext_category' => $this->ext_category ?? null,
            'seller' => $this->seller ?? null
        ];
    }
}
