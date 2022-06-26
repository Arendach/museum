<?php

namespace App\Actions\Basic;

use App\Models\Model;

class DestroyAction
{
    public function run(Model $item): bool|null
    {
        return $item->delete();
    }
}
