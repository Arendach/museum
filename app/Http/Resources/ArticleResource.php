<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Article */
class ArticleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'title'             => $this->t('title'),
            'short_description' => $this->t('short_description'),
            'description'       => $this->t('description'),
            'created_at'        => $this->created_at->format('d.m.Y'),
            'updated_at'        => $this->updated_at,
            'url'               => $this->getUrl(),
            'tags'              => $this->whenLoaded('tags', TagResource::collection($this->tags)),
            'user'              => $this->whenLoaded('user', new UserResource($this->user)),
        ];
    }
}
