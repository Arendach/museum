<?php

namespace App\Http\Resources\Admin;

use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Country */
class CountryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'title'          => $this->title,
            'title_ru'       => $this->title_ru,
            'title_en'       => $this->title_en,
            'description'    => $this->description,
            'description_ru' => $this->description_ru,
            'description_en' => $this->description_en,
            'code'           => $this->code,
            'slug'           => $this->slug,
            'status'         => $this->status,
            'url'            => $this->getUrl(),
        ];
    }
}
