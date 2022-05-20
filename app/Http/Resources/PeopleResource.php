<?php

namespace App\Http\Resources;

use App\Models\People;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin People */
class PeopleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
