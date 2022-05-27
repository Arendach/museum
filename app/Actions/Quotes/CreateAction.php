<?php

namespace App\Actions\Quotes;

use App\Http\Requests\Admin\Quotes\CreateRequest;
use App\Models\Quote;

class CreateAction
{
    public function run(CreateRequest $request): Quote
    {
        return Quote::create($request->validated());
    }
}
