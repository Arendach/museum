<?php

namespace App\Actions\Basic;

use App\Http\Requests\ApiRequest;
use App\Models\Model;

class StoreAction
{
    public function run(string $model, ApiRequest $request): Model
    {
        return $model::create($request->getData());
    }
}
