<?php

namespace App\Infrastructure\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'reference' => $this->reference,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'stock' => $this->stock,
        ];
    }
}