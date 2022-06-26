<?php

namespace App\Http\Resources\Admin;

use App\Models\Weapon;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Weapon */
class WeaponResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'slug'           => $this->slug,
            'title'          => $this->title,
            'title_ru'       => $this->title_ru,
            'title_en'       => $this->title_en,
            'description'    => $this->description,
            'description_ru' => $this->description_ru,
            'description_en' => $this->description_en,
            'date'           => $this->date,
            'url'            => $this->getUrl(),
            'picture'        => new PictureResource($this->whenLoaded('picture')),
            'countries'      => CountryResource::collection($this->whenLoaded('countries')),
            'videos'         => VideoResource::collection($this->whenLoaded('videos')),
            'seo'            => new SeoResource($this->whenLoaded('seo')),
        ];
    }
}
