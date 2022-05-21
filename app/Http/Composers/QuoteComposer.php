<?php

namespace App\Http\Composers;

use App\Models\Quote;
use Illuminate\View\View;

class QuoteComposer
{
    public function compose(View $view): void
    {
        $quote = Quote::inRandomOrder()->first();

        $view->with(compact('quote'));
    }
}
