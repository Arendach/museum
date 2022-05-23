<?php

namespace App\Repositories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class QuotesRepository
{
    public function getQuotes(): LengthAwarePaginator
    {
        return Quote::with('people')
            ->orderBy('id', 'desc')
            ->paginate(request('limit', 10));
    }

    public function getQuote(int $id): Quote|Model|null
    {
        return Quote::with('people')->where('id', $id)->first();
    }
}
