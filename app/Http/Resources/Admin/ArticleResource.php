<?php

namespace App\Http\Resources\Admin;

use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Article */
class ArticleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                   => $this->id,
            'slug'                 => $this->slug,
            'is_active'            => $this->is_active,
            'is_popular'           => $this->is_popular,
            'title'                => $this->title,
            'title_ru'             => $this->title_ru,
            'title_en'             => $this->title_en,
            'short_description'    => $this->short_description,
            'short_description_ru' => $this->short_description_ru,
            'short_description_en' => $this->short_description_en,
            'description'          => $this->description,
            'description_ru'       => $this->description_ru,
            'description_en'       => $this->description_en,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
            'url'                  => $this->getUrl(),
            'tags'                 => $this->whenLoaded('tags', TagResource::collection($this->tags)),
            'user'                 => $this->whenLoaded('user', new UserResource($this->user)),
            'picture'              => $this->whenLoaded('picture', new PictureResource($this->picture)),
        ];
    }
}
