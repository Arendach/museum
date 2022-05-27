<?php

namespace App\Actions\Peoples;

use App\Models\People;

class DeleteAction
{
    public function run(People $people): bool
    {
        return $people->delete();
    }
}
