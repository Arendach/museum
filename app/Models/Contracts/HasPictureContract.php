<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasPictureContract
{
    public function picture(): MorphOne;

    public function pictures(): MorphMany;

    public function getPicture(): ?string;
}
