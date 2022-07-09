<?php

namespace App\Http\Resources\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'created_at' => $this->created_at instanceof Carbon ? $this->created_at->diffForHumans() : $this->created_at,
            'updated_at' => $this->updated_at instanceof Carbon ? $this->updated_at->diffForHumans() : $this->updated_at,
            'url'        => $this->getUrl(),
        ];
    }
}
