<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quote extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function people(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }
}
