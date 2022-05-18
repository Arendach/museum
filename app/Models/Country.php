<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function getUrl(): string
    {
        return route('country', [$this->slug]);
    }
}
