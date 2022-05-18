<?php

namespace App\Repositories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CountriesRepository
{
    public function getCountries(): Collection
    {
        return Country::all();
    }

    public function findCountry(string $slug): Builder|Model|Country|null
    {
        return Country::where('slug', $slug)->first();
    }
}
