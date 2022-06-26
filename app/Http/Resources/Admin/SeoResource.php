<?php

namespace App\Http\Resources\Admin;

use App\Models\Seo;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Seo */
class SeoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'model_id'       => $this->model_id,
            'model_type'     => $this->model_type,
            'title'          => $this->title,
            'title_ru'       => $this->title_ru,
            'title_en'       => $this->title_en,
            'description'    => $this->description,
            'description_ru' => $this->description_ru,
            'description_en' => $this->description_en,
            'keywords'       => $this->keywords,
            'keywords_ru'    => $this->keywords_ru,
            'keywords_en'    => $this->keywords_en,
            'h1'             => $this->h1,
            'h1_ru'          => $this->h1_ru,
            'h1_en'          => $this->h1_en,
            'is_index'       => $this->is_index,
            'is_follow'      => $this->is_follow,
        ];
    }
}
