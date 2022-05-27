<?php

namespace App\Actions\Peoples;

use App\Http\Requests\Admin\Peoples\UpdateRequest;
use App\Models\People;

class UpdateAction
{
    public function run(People $people, UpdateRequest $request): bool
    {
        return $people->update($request->validated());
    }
}
