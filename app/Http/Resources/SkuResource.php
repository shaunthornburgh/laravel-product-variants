<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\AttributeSku;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'unit_amount' => $this->unit_amount,
            'product_id' => $this->product_id,
            'attributes' => $this->attributes
        ];
    }
}
