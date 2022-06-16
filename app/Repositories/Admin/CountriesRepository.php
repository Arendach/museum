<?php

namespace App\Repositories\Admin;

use App\Models\Country;

class CountriesRepository extends AdminRepository
{
    protected string $model = Country::class;
}
