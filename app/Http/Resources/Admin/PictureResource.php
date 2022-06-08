<?php

namespace App\Http\Resources\Admin;

use App\Models\Picture;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Picture
 */
class PictureResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'path' => $this->getUrl(),
            'alt'  => $this->alt,
        ];
    }
}
