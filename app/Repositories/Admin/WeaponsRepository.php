<?php

namespace App\Repositories\Admin;

use App\Models\Weapon;
use Illuminate\Support\Collection;
use Request;

class WeaponsRepository
{
    public function getWeapons(): Collection
    {
        return Weapon::with('countries', 'picture')
            ->orderBy(
                Request::getOrderField(),
                Request::getOrderDirection(),
            )->get();
    }
}
