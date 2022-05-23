<?php

namespace App\Actions\Quotes;

use App\Http\Requests\Admin\Quotes\UpdateRequest;
use App\Models\Quote;

class UpdateAction
{
    public function run(Quote $quote, UpdateRequest $request): bool
    {
        return $quote->update($request->validated());
    }
}
