<?php

namespace App\Actions\Countries;

use App\Models\Country;

class DeleteAction
{
    public function run(Country $country): bool
    {
        return $country->delete();
    }
}
