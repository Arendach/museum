<?php

namespace App\Http\Resources;

use App\Models\Quote;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Quote */
class QuoteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'    => $this->id,
            'title' => $this->t('title'),
        ];
    }
}
