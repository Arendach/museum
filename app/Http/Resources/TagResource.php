<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Tag */
class TagResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->t('title'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'url'        => $this->getUrl(),
        ];
    }
}
