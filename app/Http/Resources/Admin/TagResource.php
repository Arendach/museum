<?php

namespace App\Http\Resources\Admin;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Tag */
class TagResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'slug'       => $this->slug,
            'title'      => $this->title,
            'title_ru'   => $this->title_ru,
            'title_en'   => $this->title_en,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'url'        => $this->getUrl(),
            'seo'        => new SeoResource($this->whenLoaded('seo')),
        ];
    }
}
