<?php

namespace App\Http\Resources\Admin;

use App\Models\People;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin People */
class PeopleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'name_ru'    => $this->name_ru,
            'name_en'    => $this->name_en,
            'country_id' => $this->country_id,
            'country'    => new CountryResource($this->whenLoaded('country')),
            'quotes'     => QuoteResource::collection($this->whenLoaded('quotes')),
        ];
    }
}
