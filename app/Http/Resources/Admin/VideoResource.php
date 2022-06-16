<?php

namespace App\Http\Resources\Admin;

use App\Models\Video;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Video */
class VideoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'              => $this->id,
            'title'           => $this->title,
            'title_ru'        => $this->title_ru,
            'title_en'        => $this->title_en,
            'description'     => $this->description,
            'description_ru'  => $this->description_ru,
            'description_en'  => $this->description_en,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
            'url'             => $this->getUrl(),
            'type'            => $this->type,
            'path'            => $this->path,
            'source'          => $this->source,
            'source_title'    => $this->source_title,
            'source_title_ru' => $this->source_title_ru,
            'source_title_en' => $this->source_title_en,
        ];
    }
}
