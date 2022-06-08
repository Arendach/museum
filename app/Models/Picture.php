<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Picture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUrl(): string
    {
        return asset($this->path);
    }
}
