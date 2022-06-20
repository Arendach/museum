<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasVideoContract
{
    public function videos(): MorphToMany;
}
