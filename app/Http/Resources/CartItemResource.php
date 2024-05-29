<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'quantity'   =>$this->quantity,
            'product_id' => $this->product_id,
            'product'    => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
