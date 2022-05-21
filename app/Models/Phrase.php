<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Phrase extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
    }
}
