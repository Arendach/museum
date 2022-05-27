<?php

namespace App\Http\Resources\Admin;

use App\Models\Quote;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Quote */
class QuoteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'title_ru'   => $this->title_ru,
            'title_en'   => $this->title_en,
            'created_at' => $this->created_at,
            'people'     => new PeopleResource($this->whenLoaded('people')),
        ];
    }
}
