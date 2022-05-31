<?php

namespace App\Actions\Countries;

use App\Http\Requests\Admin\Countries\CreateRequest;
use App\Models\Country;

class CreateAction
{
    public function run(CreateRequest $request): Country
    {
        return Country::create($request->validated());
    }
}
