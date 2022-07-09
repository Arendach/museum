<?php

namespace App\Http\Resources\Admin;

use App\Models\Page;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Page */
class PageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                   => $this->id,
            'slug'                 => $this->slug,
            'is_active'            => $this->is_active,
            'title'                => $this->title,
            'title_ru'             => $this->title_ru,
            'title_en'             => $this->title_en,
            'description'          => $this->description,
            'description_ru'       => $this->description_ru,
            'description_en'       => $this->description_en,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
            'url'                  => $this->getUrl(),
            'picture'              => new PictureResource($this->whenLoaded('picture')),
            'videos'               => VideoResource::collection($this->whenLoaded('videos')),
            'seo'                  => new SeoResource($this->whenLoaded('seo')),
        ];
    }
}
