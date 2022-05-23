<?php

namespace App\Actions\Quotes;

use App\Models\Quote;

class DeleteAction
{
    public function run(Quote $quote): bool
    {
        return $quote->delete();
    }
}
