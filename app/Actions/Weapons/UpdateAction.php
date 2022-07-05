<?php

namespace App\Actions\Weapons;

use App\Http\Requests\Admin\Weapons\UpdateRequest;
use App\Models\Weapon;

class UpdateAction
{
    public function run(Weapon $weapon, UpdateRequest $request): bool
    {
        $weapon->countries()->sync($request->getCountries());

        $weapon->updateSeo($request->getSeo());

        return $weapon->update($request->getData());
    }
}
