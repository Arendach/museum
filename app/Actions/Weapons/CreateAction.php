<?php

namespace App\Actions\Weapons;

use App\Http\Requests\Admin\Weapons\CreateRequest;
use App\Models\Weapon;

class CreateAction
{
    public function run(CreateRequest $request): Weapon
    {
        $weapon = Weapon::create($request->getData());

        $weapon->countries()->sync($request->getCountries());

        return $weapon;
    }
}
