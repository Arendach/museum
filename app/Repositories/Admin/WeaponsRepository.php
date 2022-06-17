<?php

namespace App\Repositories\Admin;

use App\Models\Weapon;

class WeaponsRepository extends AdminRepository
{
    protected string $model = Weapon::class;
}
