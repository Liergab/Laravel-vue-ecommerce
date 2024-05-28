<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
           'id'       => $this->id,
           'line_one' => $this->line_one,
           'city'     => $this->city,
           'country'  => $this->country,
           'pincode'  => $this->pincode,
           'user_id'  => $this->user_id,
           'address'  => $this->line_one. ' ' .$this->city. ' '.$this->country. ' '. $this->pincode
        ];
    }
}
