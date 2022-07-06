<?php

namespace App\Actions\Weapons;

use App\Http\Requests\Admin\Weapons\StoreRequest;
use App\Models\Weapon;

class StoreAction
{
    public function run(StoreRequest $request): Weapon
    {
        $weapon = Weapon::create($request->getData());

        $weapon->countries()->sync($request->getCountries());

        $weapon->seo()->create([]);

        return $weapon;
    }
}
