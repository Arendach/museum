<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Article */
class SearchResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title'    => $this->t('title'),
            'instance' => get_class($this->resource),
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
