<?php

namespace App\Actions\Basic;

use App\Http\Requests\ApiRequest;
use App\Models\Model;

class StoreAction
{
    public function run(string $model, ApiRequest $request): Model
    {
        $item = $model::create($request->getData());

        if (method_exists($item, 'updateSeo')) {
            $item->updateSeo($request->getSeo());
        }

        return $item;
    }
}
