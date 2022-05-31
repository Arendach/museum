<?php

namespace App\Actions\Countries;

use App\Http\Requests\Admin\Countries\UpdateRequest;
use App\Models\Country;

class UpdateAction
{
    public function run(Country $quote, UpdateRequest $request): bool
    {
        return $quote->update($request->validated());
    }
}
