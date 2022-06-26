<?php

namespace App\Actions\Basic;

use App\Http\Requests\ApiRequest;
use App\Models\Model;

class UpdateAction
{
    public function run(Model $item, ApiRequest $request): bool
    {
        return $item->update($request->getData());
    }
}
