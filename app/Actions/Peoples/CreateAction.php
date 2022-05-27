<?php

namespace App\Actions\Peoples;

use App\Http\Requests\Admin\Peoples\CreateRequest;
use App\Models\People;

class CreateAction
{
    public function run(CreateRequest $request): People
    {
        return People::create($request->validated());
    }
}
