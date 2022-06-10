<?php

namespace App\Actions\Weapons;

use App\Models\Weapon;

class DeleteAction
{
    public function run(Weapon $weapon): bool
    {
        return $weapon->delete();
    }
}
